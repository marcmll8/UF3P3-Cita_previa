<?php
function auth($peticio, $resposta, $config, $next) {
    
    $usuari = $peticio->get("SESSION", "usuari");
    $logat = $peticio->get("SESSION", "logat");

    if(!isset($logat)){
        $usuari = "";
        $logat = false;
    } 

    $resposta->set("usuari", $usuari);
    $resposta->set("logat", $logat);

    // si l'usuari està logat permetem carregar el recurs
    if($logat) {
        $resposta = $next($peticio, $resposta, $config);
    } else {
        $resposta->redirect("location: index.php?r=login");
    }
    return $resposta;
}
