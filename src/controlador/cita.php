<?php
function ctrlCita($peticio, $resposta, $config)
{ 
  

    $error = $peticio->get("SESSION", "error");
    

    $resposta->set("error", $error);
    $resposta->setSession("error", "");

    $resposta->SetTemplate("cita.php");

    return $resposta;

}