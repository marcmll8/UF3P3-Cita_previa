<?php 

function ctrlCita($peticio, $resposta, $config)
{ 
    $festiusito=new festiusmodel($config["db"]);
    $festius = $festiusito -> mostrartots();
    $data=new DateTime();
    $any = $data -> format("y");
    $mesActual = $data -> format("n");

    $calendarito = creaCalendari($mesActual,$any,$festius);

    $error = $peticio->get("SESSION", "error");


    $resposta->set("error", $error);
    $resposta->setSession("error", "");
    $resposta->set("calendari", $calendarito);

    $resposta->SetTemplate("cita.php");

    return $resposta;
}
