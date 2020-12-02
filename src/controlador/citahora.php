<?php

function ctrlCitaHora($peticio,$resposta,$config){
    $dia = $_GET["m"];
    $error = $peticio->get("SESSION", "error");
    $resposta->set("error", $error);
    $resposta ->SetTemplate("citahora.php");
    echo($dia);
    return $resposta;
}
