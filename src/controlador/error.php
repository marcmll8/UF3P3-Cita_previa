<?php
/**
 * ctrlError function
 * Controlador del error
 * @param [type] $peticio
 * @param [type] $resposta
 * @param [type] $config
 * @return void
 */
function ctrlError($peticio, $resposta, $config)
{

    $error = $nom = $peticio->get("SESSION", "error");
    $resposta->set("error", $error);
    $resposta->SetTemplate("error.php");

    return $resposta;
}