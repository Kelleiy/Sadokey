<html> 
    <head>
        <title>Woordzoeker</title>
            <link rel="stylesheet" href="csspuzzel.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>   
            
            <script>
                function highlightWoord(woord) {
                    $( "label" ).each(function() {
                        if($( this ).attr("title") == woord){
                          $( this ).addClass( "active" );
                        }
                    });
                }
                
                
            </script>
    </head>
    <body>
<?php
$ruweregels = FILE($_FILES['puzzel']['tmp_name']);
createPuzzel($ruweregels);

function createPuzzel($ruweregels){
    $a_z = "abcdefghijklmnopqrstuvwxyz";
    echo "<table class='puzzle'>";
    $endOfPuzzle = false;
    foreach($ruweregels as $regel) {
        $regel = trim($regel);
        if($regel == "" && $endOfPuzzle == false){
            $endOfPuzzle = true;
            echo "</table>";
        }
        if($endOfPuzzle == false){
            $hetWoord = str_replace("-","", $regel);
            $regelArray = str_split($regel);
            echo "<tr>";
            foreach ($regelArray as $char){
                if($char == "-"){
                    $char=$a_z[rand(0,25)];
                    echo "<td>".$char."</td>";
                }else{
                    echo "<td ><label title='".$hetWoord."'>".$char."<label></td>";
                }
                
            }
            echo "</tr>";
        }else{
            echo "<span onclick='highlightWoord(\"".$regel."\");' title='".$regel."'>".$regel."</span><br>";
            
        }
    }
}
//$fileName = 'tests/data/t1.txt';
//  $fileName = $_FILES['veld in form']['tmp_name']);
//$ruweregels = FILE($fileName);
//
//foreach($ruweregels as $regel) {
//    $regel = trim($regel);
//    wz[] = str_split(....)
//    woorden[] = $regel;
//}

?>
</body>
</html>