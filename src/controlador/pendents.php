<?php

/**
 * ctrlPendets function
 * Controlador de pendents
 * @param [type] $peticio
 * @param [type] $resposta
 * @param [type] $config
 * @return void
 */
function ctrlPendets($peticio, $resposta, $config)
{
    $usuario = $peticio->get("SESSION", "usuari");
    $festius = new festiusmodel($config["db"]);
    $usuaris = new usuariomodel($config["db"]);
    $cita = new citamodel($config["db"]);
    $info_user = $usuaris->consultar($usuario);
    $error = $peticio->get("SESSION", "error");
    $resposta->set("error", $error);
    $resposta->setSession("error", "");
    $resposta->SetTemplate("pendets.php");
    if ($usuario == "admin") {
        $llistapendents = $cita->mostrarglobal();
    } else {
        $llistapendents = $cita->mostrarcita($info_user["id"]);
    }

    $resposta->set("llistapendents", $llistapendents);
    $resposta->set("info_user", $info_user);
    $resposta->set("festius", $festius);
    return $resposta;
}
