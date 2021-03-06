<?php
 
//level 4
 
function findDiagonal($words, $wz_array)
{   
    $matched_words = array();
    foreach ($words as $word)
    {
        $letters = str_split($word);
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
                //eerst letter van het woord vinden
                    $total_word .= $letter;
                    $found_letter = new Letter($row_pos, $column_pos, $letter);   
                    $matched_letters[] = $found_letter;
                //zet de gevonden letters bij elkaar als een match
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
              //stappen naar recht en naar onder en boven, je staat op 0 dus
              //een stap omhoog is -1 en omlaag is 1
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
                           
                        if ($total_word == $word)
                        {
                            $matched_word = new FoundWord($word, $matched_letters);
                            $matched_words[] = $matched_word;
                        }
                    //letters in woorden en de woorden zijn "gevonden woorden"
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
