<html>
    <head>
        <title>Woordzoeker</title>
            <link rel="stylesheet" href="csspuzzel.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

            <script>
                $( document ).ready(function() {
                    // als document volledig geladen is begint het volgende pas
                    $('.word').each(function() {
                        // elk woord heeft class word --> aan ieder word voeg je de volgende functies toe
                        $(this).click( function() {
                            $(this).wrap("<strike>");
                            var title = $(this).attr('id');
                            // id = woord zelf
                            // als je iets tegenkomt met titel 'id' doe dan het volgende
                            $("[title="+title+"]").addClass( "active" );
//                            $("[title="+title+"]").removeClass( "off" );
//                            $("[title="+title+"]").removeClass( "on" );
                        });

                        $(this).mouseenter(function() {
                            var title = $(this).attr('id');
                            $("[title="+title+"]").addClass( "on" );
                            $("[title="+title+"]").removeClass( "off" );
                        });

                        $(this).mouseleave(function() {
                            var title = $(this).attr('id');
                            $("[title="+title+"]").removeClass( "on" );
                            $("[title="+title+"]").addClass( "off" );
                        });
                    });
                });

            </script>
    </head>
    <body>

<?php
error_reporting(E_ERROR);

include 'functions.php';

switch ($level) {
    case 1:
        $foundHorizontalWords = findhorizontal($woorden,$letters, $wzArray);
        printPuzzle($wzArray,$foundHorizontalWords,$woorden);
        break;
    case 2:
        $foundHorizontalWords = findhorizontal($woorden,$letters, $wzArray);
        $foundHorizontalReversedWords = findReversehorizontal($woorden,$letters, $wzArray);
        // voegt gevonden woorden de twee bovenstaande samen
        $allFoundWords = array_merge($foundHorizontalWords,$foundHorizontalReversedWords) ;
        printPuzzle($wzArray,$allFoundWords,$woorden);
        break;
    case 3:
        $foundHorizontalWords = findhorizontal($woorden,$letters, $wzArray);
        $foundHorizontalReversedWords = findReversehorizontal($woorden,$letters, $wzArray);
        $foundVerticalWords = findVertical($woorden,$wzArray);
        $foundVerticalReversedWords = findReverseVertical($woorden,$wzArray);
        $allFoundWords = array_merge($foundHorizontalWords,$foundHorizontalReversedWords,$foundVerticalWords,$foundVerticalReversedWords) ;
        printPuzzle($wzArray,$allFoundWords,$woorden);
        break;
    case 4:
        $foundHorizontalWords = findhorizontal($woorden,$letters, $wzArray);
        $foundHorizontalReversedWords = findReversehorizontal($woorden,$letters, $wzArray);
        $foundVerticalWords = findVertical($woorden,$wzArray);
        $foundVerticalReversedWords = findReverseVertical($woorden,$wzArray);
        $foundDiagonalWords = findDiagonal($woorden, $wzArray);
        $foundDiagonalReversedWords = findReverseDiagonal($woorden, $wzArray);
        echo count($foundDiagonalWords);
        $allFoundWords = array_merge($foundHorizontalWords,$foundHorizontalReversedWords,$foundVerticalWords,$foundVerticalReversedWords, $foundDiagonalWords, $foundDiagonalReversedWords);
        printPuzzle($wzArray,$allFoundWords,$woorden);
        break;
}

?>

    </body>
</html>
