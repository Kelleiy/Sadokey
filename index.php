<html>
    <head>
        <title>Woordzoeker</title>
            <link rel="stylesheet" href="csspuzzel.css">
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
    </head>
    <body>
        <?php
            //Het puzzel level
            $puzzle_level = 1;
            if (isset($_REQUEST['PuzzleLevel'])) ( $puzzle_level = $_REQUEST['PuzzleLevel']); 

        ?>
        <p><h1>Woordzoeker van Sadokey</h1></p>
        <form method="post" action="resultaat.php" enctype="multipart/form-data">  
                <table>
                    <tr>
                        <td>File upload
                            <input id="fileupload" type="file" name="puzzel" />
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td>Niveau
                            <select name="PuzzleLevel" onchange="this.form.sumbit();">
                                <option value="1"<?php if ($puzzle_level == 1) { echo ' selected'; } ?>>1</option> <!-- Alleen horizontaal -->
                                <option value="2"<?php if ($puzzle_level == 2) { echo ' selected'; } ?>>2</option> <!-- Horizontaal reversed -->
                                <option value="3"<?php if ($puzzle_level == 3) { echo ' selected'; } ?>>3</option> <!-- Verticaal -->
                                <option value="4"<?php if ($puzzle_level == 4) { echo ' selected'; } ?>>4</option> <!-- Diagonaal -->                                                                                                                                                                                           
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit"  value="uploaden"/>
                        </td>
                    </tr>
                    
                </table>
            </form>
        
    </body>
</html>
