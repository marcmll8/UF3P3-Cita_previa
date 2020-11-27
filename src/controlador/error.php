<?php

function ctrlError($peticio, $resposta, $config)
{

    $error = $nom = $peticio->get("SESSION", "error");
    $resposta->set("error", $error);
    $resposta->SetTemplate("error.php");

    return $resposta;
}