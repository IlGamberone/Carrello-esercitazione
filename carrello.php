<?php

if ($_SERVER["REQUEST_MODE"] == "POST") {

    $quaderno = floatval($_POST["quaderno"]);
    $penna = floatval($_POST["penna"]);
    $zaino = floatval($_POST["zaino"]);
    $prezzoTotale = 0.0;
    $prezzoExtra = 0.0;

    $extra = $_POST["extra"];
    if ($extra[1] == "regalo") {
        $prezzoExtra = $prezzoExtra + 3.0;
    }
    if ($extra[2] == "express") {
        $prezzoExtra = $prezzoExtra + 7.0;
    }


    $codiceSconto = $_POST["codice"];

    $costoQuad = ($quaderno * 2.5);
    $costoPenna = ($penna * 1.2);
    $costoZaino = ($zaino * 35.0);

    if ($codiceSconto == "KTM50") {
        $prezzoTotale = (($costoQuad + $costoPenna + $costoZaino) / 100) * 50;
        $prezzoTotale = $prezzoTotale + $prezzoExtra;
    } elseif ($codiceSconto == "KTM80") {
        $prezzoTotale = (($costoQuad + $costoPenna + $costoZaino) / 100) * 80;
        $prezzoTotale = $prezzoTotale + $prezzoExtra;
    }

} else {
    header("location:carrello.html");
}


?>