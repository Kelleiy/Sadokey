<html> 
    <head>
        <title>Woordzoeker</title>
            <link rel="stylesheet" href="csspuzzel.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>
    <body>

        <form method="get">  
            <table>  

        <?php
            //Het puzzel level
            $puzzle_level = 1;
            if (isset($_REQUEST['PuzzleLevel'])) ( $puzzle_level = $_REQUEST['PuzzleLevel']); 


        ?>               

        ?>
        
        <form method="post" action="inlezen.php" enctype="multipart/form-data">  
            <table>

                <tr>
                    <td>file upload
                        <input id="fileupload" type="file" name="puzzel" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit"  value="uploaden"/>
                    </td>
                </tr>
                <tr>
                    <td><a id="file1" href=""> Click here for default puzzle </a></td>
                </tr>                

                <tr>
                    <td>Niveau
                        <select name="PuzzleLevel" onchange="this.form.submit()">
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
                            include "puzzle.php";
                            
                            $s = createPuzzle($puzzle_level, $word_list);
                            echo $s;
                            createPuzzleTable($data);
                            //getRandomLetter();
                            //getRandomStartPosition($word, $level);
                            //hasOverlap($data, $word, $position);
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
                </tr>-->
            </table>
        </form>
    
</html>