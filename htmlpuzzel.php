<!DOCTYPE html>

<html> 
    <head>
        <title>Woordzoeker</title>
            <link rel="stylesheet" href="csspuzzel.css">
            <script>
                var highlightWord = function(word, clicked)
                {
                    var _labels = document.getElementsByTagName('LABEL');
                    var i = 0;
                    var j = _labels.length;
                    while (i < j)
                    {
                        if (_labels[i].title === word)
                        {
                            if (clicked) {
                                _labels[i].className = 'active';
                            }
                            else if (_labels[i].className !== 'active')
                            {
                                _labels[i].className = 'on';
                            }
                        }
                        else if (_labels[i].className !== 'active')
                        {
                            _labels[i].className = 'off';
                        }
                        i++;
                    }
                }
            </script>
    </head>
    <body>
        <form method="get">  
            <table>
                <tr>
                    <td>Niveau;
                        <select name="PuzzleLevel" onchange="this.form.sumbit();">
                            <option value="1"<?php if ($puzzle_level == 1) { echo ' selected'; } ?>>1</option> <!-- Alleen horizontaal -->
                            <option value="2"<?php if ($puzzle_level == 2) { echo ' selected'; } ?>>2</option> <!-- Horizontaal reversed -->
                            <option value="3"<?php if ($puzzle_level == 3) { echo ' selected'; } ?>>3</option> <!-- Verticaal -->
                            <option value="4"<?php if ($puzzle_level == 4) { echo ' selected'; } ?>>4</option> <!-- Verticaal -->                                                                                                                                                                                           
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo createPuzzle($puzzle_level, $word_list);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <fieldset>
                            <legend>Woordenlijst</legend>
                                <?php
                                    echo naarTabel($word_list); 
                                ?>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </form>
    
</html> 