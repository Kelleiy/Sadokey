<?php
define('alphabet', "abcdefghijklmnopqrstuvwxyz");
define('puzzle_breedte', 20);
define('puzzle_hoogte', 20);
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
if (isset($_REQUEST['PuzzleLevel'])) ( $puzzle_level = $_REQUEST['PuzzleLevel']); 
?>

<html>
    <head>
        <title>Woordzoeker</title>
            <style>
                table, body
                {
                    font-family: Arial;
                }

                table.puzzle
                {
                    border: solid 1px black;
                }

                table.puzzle td
                {}

            </style>
            <script>
            </script>
    </head>
    <body>
        <form method="get">
            <table>
                <tr>
                    <td>Niveau;
                        <select name="PuzzleLevel" onchange="this.form.sumbit();">
                            <option value="1"<?php if ($puzzle_level == 1) ( echo ' selected'; ) ?>>1</option> <t-- Alleen horizontaal -->
                            <option value="2"<?php if ($puzzle_level == 2) ( echo ' selected'; ) ?>>1</option> <t-- Horizontaal reversed -->
                            <option value="3"<?php if ($puzzle_level == 3) ( echo ' selected'; ) ?>>1</option> <t-- Verticaal -->
                            <option value="4"<?php if ($puzzle_level == 4) ( echo ' selected'; ) ?>>1</option> <t-- something... -->                                                                                                                                                                                           
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
                                    foreach ($word_list as $word)
                                    {
                                            $label_tag = '<label title="' . $word . '" onclick="highlightWordt(\'' . $word . '\', true);" onmousover="highlightWord(\'' . $word . '\', false);" onmouseout="highlightWord(\'\', false);">';
                                            echo $label_tag . $word . '</label>';
                                    }
                                ?>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </form>
    
</html>

<?php
// Functions

function createPuzzle($puzzle level, $word list)
        
//dus nog de b