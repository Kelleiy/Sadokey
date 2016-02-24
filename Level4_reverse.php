<?php
 
//level 4 Reverse
 
function findReverseDiagonal($words, $wz_array)
{   
    $matched_words = array();
    foreach ($words as $word)
    {
        $reversed_word = strrev($word);
        $letters = str_split($reversed_word);
        $matched_letters = array();
        $total_word = '';
        $first_letter = $letters[0];
        $letter_matched = false;
       
        $row_pos = 1;
        $column_pos = 1;
       
        foreach ($wz_array as $row)
        {
            $column_pos = 1;
            foreach ($row as $letter)
            {
                if ($letter == $first_letter)
                {
                    $total_word .= $letter;
                    $found_letter = new Letter($row_pos, $column_pos, $letter);   
                    $matched_letters[] = $found_letter;
                    $letter_matched = true;
                    break;
                }
               
                $column_pos++;
            }
           
            if ($letter_matched)
            {
            break;
            }
            $row_pos++;
        }
       
        if (!$letter_matched) { continue; }
       
        $keep_searching = true;
        $match_direction = 0;
        $letter_counter = 1;
        $column_pos++;
       
        while ($keep_searching)
        {
            $keep_searching = false;
           
            if ($match_direction == 0)
            {
                $pos_up = $row_pos - 1;
                $pos_down = $row_pos + 1;
               
                if ($pos_up > 1 && $wz_array[$pos_up][$column_pos] == $letters[$letter_counter])
                {
                    $match_direction = -1;
                    $row_pos = $pos_up;
                    $keep_searching = true;
                }
                else if ($pos_down <= count($wz_array) && $wz_array[$pos_down][$column_pos] == $letters[$letter_counter])
                {
                    $match_direction = 1;
                    $row_pos = $pos_down;
                    $keep_searching = true;
                }
               
                $letter = $wz_array[$row_pos][$column_pos];
               
                $total_word .= $letter;
                $found_letter = new Letter($row_pos, $column_pos, $letter);   
                $matched_letters[] = $found_letter;
            }
            else
            {
                if ($row_pos > 0 && $row_pos <= count($wz_array))
                {
                    $letter = $wz_array[$row_pos][$column_pos];
                   
                    if ($letter == $letters[$letter_counter])
                    {
                        $total_word .= $letter;
                        $found_letter = new Letter($row_pos, $column_pos, $letter);   
                        $matched_letters[] = $found_letter;
                       
                        if ($total_word == $reversed_word)
                        {
                            $matched_word = new FoundWord($word, $matched_letters);
                            $matched_words[] = $matched_word;
                        }
                        else
                        {
                            $keep_searching = true;  
                        }
                    }
                }
            }
           
            $row_pos = $row_pos + $match_direction;
            $column_pos++;
            $letter_counter++;
        }
    }
   
    return $matched_words;
}

//level 4 reverse

/*function findReverseDiagonal($words, $wz_array)
{
    $matched_words = array();
    foreach ($words as $word) 
    {
        $letters = str_split($word);
        $letters = array_reverse($letters);
        $matched_letters = array();
        $total_word = array();
        $first_letter = $letters[0];
        $letter_matched = false;
        
        $row_pos = 0;
        $column_pos = 0;
        
        foreach ($wz_array as $row)
        {
            foreach ($row as $letter)
            {
                if ($letter == $first_letter)
                {
                    $found_letter = new Letter();
                    $found_letter->row = $row_pos;
                    $found_letter->column = $column_pos;
                    $found_letter->letter = $letter;
                    $total_word[] = $letter;
                    
                    $matched_letters[] = $found_letter;
                    $letter_matched = true;
                    break;
                }
                
                $column_pos++;
            }
            
            if ($letter_matched)
            {
                break;
            }
            $row_pos++;
        }
        
        if (!$letter_matched) { continue; }
        
        $keep_searching = true;
        $match_direction = 0;
        $letter_counter = 1;
        $column_pos++;
        while ($keep_searching)
        {
           $keep_searching = false;
           
           if ($match_direction == 0)
           {
               $pos_up = $row_pos - 1;
               $pos_down = $row_pos + 1;
               
               if ($wz_array[$pos_up][$column_pos] == $letters[$letter_counter])
               {
                 $match_direction = -1;
                 $row_pos = $pos_up;
                 $keep_searching = true;
               }
               else if ($wz_array[$pos_down][$column_pos] == $letters[$letter_counter])
               {
                   $match_direction = 1;
                   $row_pos = $pos_down;
                   $keep_searching = true;
               }
               
               $letter = $wz_array[$row_pos][$column_pos];
               
               $found_letter = new Letter();
                $found_letter->row = $row_pos;
                $found_letter->column = $column_pos;
                $found_letter->letter = $letter;
                $total_word[] = $letter;

                $matched_letters[] = $found_letter;
           }
           else
           {
               if ($row_pos >= 0 && $row_pos < count($wz_array))
               {
                   if ($wz_array[$row_pos][$column_pos] == $letters[$letter_counter])
                   {
                        if ($total_word == $letters)
                        {
                            $matched_letters = array_reverse($matched_letters);
                            $matched_word = new FoundWord($word, $matched_letters);
                            $matched_words[] = $matched_word;
                        }
                        else
                        {
                            $keep_searching = true;   
                        }
                   }
               }
           }
           
           $row_pos = $row_pos + $match_direction;
           $column_pos++;
           $letter_counter++;
        }
    }
    
    return $matched_words;
}
 */
?>