<?php 
include "../funcions.php";



function ctrlCita($peticio, $resposta, $config)
{ 
    $data=new DateTime();
    $mesActual = $data -> format("n");
    $calendarito = creaCalendari($mes,$any,$festius[$mesActual]);

    $error = $peticio->get("SESSION", "error");


    $resposta->set("error", $error);
    $resposta->setSession("error", "");
    $resposta->set("calendari", $calendarito);

    $resposta->SetTemplate("cita.php");

    return $resposta;
}
