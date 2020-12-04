<?php
function ctrlLlistatUsuaris($peticio, $resposta,$config){
    $usuaris = new usuariomodel($config["db"]); 

    $usuario = $peticio->get("SESSION", "usuari");
    $usuariActual = $usuaris->consultar($usuari);
    
    $llistat = $usuaris->llistatUsuarios($usuariActual["id"]);

    $resposta->set("llistat", $llistat);
    $resposta->SetTemplate("llistatUsuaris.php");

    return $resposta;

}