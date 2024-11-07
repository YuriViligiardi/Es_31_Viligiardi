<?php
    session_start();
    if (!isset($_SESSION["numTimePlay"]) || ($_SESSION["numTimePlay"] == 10)) {
        $_SESSION["numTimePlay"] = 0;
        $_SESSION["numTimeGuessed"] = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indovina.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    $input = intval($_GET["number"]);
    $randomNum = rand(1,20);
    
    echo "<div id='divPhp'>";
    check($input, $randomNum);
    showData($input, $randomNum);
    echo "</div>";
    
    function showData($i, $rn){
        echo "<h4><i>Hai giocato " . $_SESSION["numTimePlay"] . " volta/e</i></h4>";
        if ($_SESSION["numTimePlay"] == 10) {
            echo "<h5 id='mesTentativi'>Hai raggiunto il numero massimo di tentativi</h5>";
        }
        echo "<h4><i>Hai indovinato " . $_SESSION["numTimeGuessed"] . " volta/e</i></h4>"; 
        echo "<p>Il numero inserito è $i</p>";
        echo "<p>Il numero generato è $rn</p>";
        echo "<a id='returnHome' href='./scelta.html'>HOME</a>";
    }


    function check($i, $rn){
        if ($rn == $i) {
            echo "<h1 id='indovinato'><i>HAI INDOVINATO</i></h1>";
            $_SESSION["numTimePlay"]++;
            $_SESSION["numTimeGuessed"]++;
        } else {
            echo "<h1 id='sbagliato'><i>NON HAI INDOVINATO</i></h1>";
            $_SESSION["numTimePlay"]++;
        }
    }
    ?>
</body>
</html>