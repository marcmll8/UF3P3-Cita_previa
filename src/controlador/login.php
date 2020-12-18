<?php

/**
 * ctrlogin function
 *  controlador de login
 * @param [type] $peticio
 * @param [type] $resposta
 * @param [type] $config
 * @return void
 */
function ctrlogin($peticio, $resposta, $config)
{


    $error = $peticio->get("SESSION", "error");
    $resposta->set("error", $error);
    $resposta->setSession("error", "");
    $resposta->SetTemplate("login.php");
    $desc = $peticio->get(INPUT_POST, "desconecta");
    if (isset($desc)) {
        $resposta->setSession("logat", false);
        $resposta->setSession("usuari", "");
    }

    return $resposta;
}
