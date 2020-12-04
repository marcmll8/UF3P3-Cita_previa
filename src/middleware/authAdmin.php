<?php 

function authAdmin($peticio, $resposta, $config, $next) {
    
    
    $usuaris=new usuariomodel($config["db"]);

    $usuario = $peticio->get("SESSION", "usuari");
    $logat = $peticio->get("SESSION", "logat");

    if(!isset($logat)){
        $usuario = "";
        $logat = false;
    } 

    $usuariActual = $usuaris->getUsuari($usuario);

    $resposta->set("usuariLogat", $usuario);
    $resposta->set("logat", $logat);
    $resposta->set("usuariActual", $usuariActual);

    // si l'usuari està logat permetem carregar el recurs
    if($logat) {
        if($usuariActual["rol"] === "admin") {
            $resposta = $next($peticio, $resposta, $config);
        } else {
            $resposta->redirect("location: index.php");    
        }    
    } else {
        $resposta->redirect("location: index.php?r=login");
    }
    return $resposta;
}