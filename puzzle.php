<?php

define('alphabet', "abcdefghijklmnopqrstuvwxyz");
define('puzzle_breedte', 20);
define('puzzle_hoogte', 20);
define('puzzle_height', puzzle_hoogte);
$word_list = array(
        'bergkat',
        'steenbok',
        'stekelvarken', 
        'everzwijn', 
        'giraf',
        'pauw',
        'neushoorn',
        'leeuw',
        'zebra',
        'antilope',
        'panter', 
        'tijger',
        'hyena',
        'olifant',
        'kameel',
        'papegaai',
        'slang',
        'salamander',
);

//Het puzzel level
$puzzle_level = 1;
if (isset($_POST['PuzzleLevel'])) ( $puzzle_level = $_POST['PuzzleLevel']); 

//#####################
//##### Functions #####
//#####################

function naarTabel($word_list) {
    foreach ($word_list as $word)
        {
            $label_tag = '<label title="' . $word . '" onclick="highlightWord(\'' . $word . '\', true);" onmouseover="highlightWord(\'' . $word . '\', false);" onmouseout="highlightWord(\'\', false);">';
            echo $label_tag . $word . '</label>';
        }
}

function createPuzzle($puzzle_level, $word_list)

{
    // data voor de puzzel
    $data = prepareData();
    fillRandomLetters($data);

    //Vervang nulletjes met letters van de woorden, hangt af van het level
    foreach ($word_list as $word)
    {
        $pos = getRandomStartPosition($word, $puzzle_level);
        $skip_entry = false;
        $retry = 0;
        $has_overlap = false;
        do
        {
            $has_overlap = hasOverlap($data, $word, $pos);
            if ($has_overlap)
            {
                $pos = getRandomStartPosition($word, $puzzle_level);
                if ($retry == (puzzle_height * puzzle_breedte))
                {
                    $has_overlap = false;
                    $skip_entry = true;
                }
                $retry++;
            }
        }
        while ($has_overlap);

        if ($skip_entry)
        {
            echo '<b class="error">Unable to place ' . $word . '. Increase the puzzle size!</b><br />';
        }
        else
        {
            $org_word = $word;
            if ($pos->direction > DIRECTION::HORIZONTAL)
            {
                $reversed = rand(0, 1);
                if ($reversed == 1) { $word = strrev($word); }
            }
            $label_tag = '<label title="' . $org_word . '" onclick="highlightWord(\'' . $org_word . '\', true);" onmouseover="highlightWord(\'' . $org_word . '\', false);" onmouseout="highlightWord(\'\', false);">';

            //Plaats de data in the puzzel grid
            switch ($pos->direction)
            {
                case DIRECTION::HORIZONTAL: //horizontal
                case DIRECTION::HORIZONTAL_REVERSED: // revesed horizontal
                {
                    $i = $pos->column;
                    $j = $pos->column + strlen($word);
                    while ($i < $j)
                    {
                        $data[$pos->row][$i] = $label_tag . substr($word, $i - $pos->column, 1) . '</label>';
                        $i++;
                    }
                    break;
                }
                case DIRECTION::VERTICAL: //vertical
                {
                    $i = $pos->row;
                    $j = $pos->row + strlen($word);
                    while ($i < $j)
                    {
                        $data[$i][$pos->column] = $label_tag . substr($word, $i - $pos->row, 1) . '</label>';
                        $i++;
                    }
                    break;
                }
                case DIRECTION::DIAGONAL_TOP:
                {
                    $i = $pos->column;
                    $j = $pos->column + strlen($word);
                    $row_count = 0;
                    while ($i < $j)
                    {
                        $data[$pos->row + $row_count][$i] = $label_tag . substr($word, $i - $pos->column, 1) . '</label>';
                        $row_count++;
                        $i++;
                    }
                    break;
                }
                case DIRECTION::DIAGONAL_BOTTOM:
                {
                    $i = $pos->column;
                    $j = $pos->column + strlen($word);
                    $row_count = 0;
                    while ($i < $j)
                    {
                        $data[($pos->row + strlen($word)) - $row_count][$i] = $label_tag . substr($word, $i - $pos->column, 1) . '</label>';
                        $row_count++;
                        $i++;
                    }
                    break;
                }
            }
        }
    }

    //Vervang overige nulletjes met willekeurige letters
    $data = fillRandomLetters($data);

    //Output data to screen
    return createPuzzleTable($data);

}

function createPuzzleTable(Array $data)
{
    $response = '<table class="puzzle">';
    $i = 0;
    $j = count($data);
    while ($i < $j)
    {
        $response .= '<tr><td>' . implode('</td><td>', $data[$i]) . '</td></tr>';
        $i++;
    }
    $response .= '</table>';
    return $response;
}

function fillRandomLetters($data)
{
    $row = 0;
    while ($row < puzzle_height)
    {
        $column = 0;
        while ($column < puzzle_breedte)
        {
            if ($data[$row][$column] == '0')
            {
                $data[$row][$column] = getRandomLetter();
            }
            $column++;
        }
        $row++;
    }
    return $data;
}

function prepareData()
{
    $data;
    //Creër the multi array gebaseerd op de puzzle_height and width met '0' as a placeholder
    $row = 0;
    while ($row < puzzle_height)
    {
        $column = 0;
        while ($column < puzzle_breedte)
        {
            $data[$row][$column] = '0';
            $column++;
        }
    $row++;
    }
    return $data;
}

function getRandomLetter()
{
    $random = rand(0, strlen(alphabet) - 1);
    $random_letter = substr(alphabet, $random, 1);
    return $random_letter;
}

function getRandomStartPosition($word, $level)
{
    //Voeg 'directions' toe gebaseerd op het level
    $direction[0] = DIRECTION::HORIZONTAL; //horizontal
    if ($level > 1)
        {
            $direction[count($direction)] = DIRECTION::HORIZONTAL_REVERSED; //reversed
        }
    if ($level > 2) 
        {
            $direction[count($direction)] = DIRECTION::VERTICAL; //vertical
        }
    if ($level > 3) 
        {
            $direction[count($direction)] = DIRECTION::DIAGONAL_TOP; //diagonal
            $direction[count($direction)] = DIRECTION::DIAGONAL_BOTTOM; //diagonal
        }
        $random_direction = rand($direction[0], $direction[count($direction) - 1]);
        $max_left = 0;
        $max_top = 0;
        $max_right = 0;
        $max_bottom = 0;
        
        switch ($random_direction)
        {
            case DIRECTION::HORIZONTAL:
            case DIRECTION::HORIZONTAL_REVERSED:
            {
                $max_right = (puzzle_breedte - strlen($word));
                $max_bottom = puzzle_height - 1;
                break;
            }
            case DIRECTION::VERTICAL:
            {
                $max_right = puzzle_breedte - 1;
                $max_bottom = (puzzle_height - strlen($word));
                break;
            }
            case DIRECTION::DIAGONAL_TOP:
            case DIRECTION::DIAGONAL_BOTTOM:
            {
                $max_right = (puzzle_breedte - strlen($word)) - 1;
                $max_bottom = (puzzle_height - strlen($word)) - 1;
                break;
            }
        }
        $random_row_index = rand($max_top, $max_bottom);
        $random_column_index = rand($max_left, $max_right);

        return new Position($random_row_index, $random_column_index, $random_direction, $max_left, $max_right, $max_top, $max_bottom);
}

function hasOverlap($data, $word, $position)
{
    $overlap_count = 0;
    switch ($position->direction)
    {
        case DIRECTION::HORIZONTAL:
        case DIRECTION::HORIZONTAL_REVERSED:
        {
            $i = $position->column;
            $j = $position->column + strlen($word);
            if ($j >= puzzle_breedte)
            {
                $overlap_count++;
            }
            else
            {
                while ($i < $j)
                {
                    if ($data[$position->row][$i] != '0')
                    {
                        $overlap_count++;
                    }
                    $i++;
                }
            }
            break;
        }
        case DIRECTION::VERTICAL:
        {
            $i = $position->row;
            $j = $position->row + strlen($word);
            if ($j >= puzzle_height)
            {
                $overlap_count++;
            }
            else
            {
                while ($i < $j)
                {
                    if ($data[$i][$position->column] != '0')
                    {
                        $overlap_count++;
                    }
                    $i++;
                }            
            }
            break;
        }
        case DIRECTION::DIAGONAL_TOP:
        {
            $i = $position->column;
            $j = $position->column + strlen($word);
            $row_count = 0;
            if ($j >= puzzle_breedte)
            {
                $overlap_count++;
            }
            else
            {
                while ($i < $j)
                {
                    if ($data[$position->row + $row_count][$i] != '0')
                    {
                        $overlap_count++;
                    }
                    $row_count++;
                    $i++;
                }
            }
            break;
        }
        case DIRECTION::DIAGONAL_BOTTOM:
        {
            $i = $position->column;
            $j = $position->column + strlen($word);
            $row_count = 0;
            if ($j >= puzzle_breedte)
            {
                $overlap_count++;
            }
            else
            {
                while ($i < $j)
                {
                    if ($data[($position->row + strlen($word)) - $row_count][$i] != '0')
                    {
                        $overlap_count++;
                    }
                $row_count++;
                $i++;
                }
            }
            break;
        }
    }
    return $overlap_count > 0;
}

class DIRECTION {
    const HORIZONTAL = 0;
    const HORIZONTAL_REVERSED = 1;
    const VERTICAL = 2;
    const DIAGONAL_TOP = 3;
    const DIAGONAL_BOTTOM = 4;
}

//#####################
//###### Classes ######
//#####################

class Position
{
    function Position($row, $column, $direction, $max_left, $max_right, $max_top, $max_bottom)
    {
        $this->row = $row;
        $this->column = $column;
        $this->direction = $direction;
        $this->max_left = $max_left;
        $this->max_right = $max_right;
        $this->max_top = $max_top;
        $this->max_bottom = $max_bottom;
    }
}

?>
