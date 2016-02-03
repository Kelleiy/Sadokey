<!DOCTYPE html> 
<html>
    <head> 
        <title>Jasmine tests</title> 
        <?php
        include_once 'loadJasmine.php';

        $D = "../";
        $testing = true;
        include_once './setup.php';
        ?>

        <script type="text/javascript">
            $(document).ready(function () {
               
            })
        </script>

        <?php
        foreach (array("file1", "file2") as $f) {
            //print "<script type='text/javascript' src='test$f.js'></script>";
        }
        // <span id="test" style="background-color: yellow ">fasdfads</span>
        ?> 
        <script type="text/javascript" src="../../js/highlightWord.js"></script>
        <script type="text/javascript" src="specs.js"></script>

    
</head> 
<body> 

</body> 
</html> 