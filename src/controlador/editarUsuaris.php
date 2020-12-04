<?php
function ctrleditarUsuaris($peticio, $resposta,$config){
    $usuaris = new usuariomodel($config["db"]); 

    $id = $peticio->get(INPUT_POST, "id");
    $usuario = $peticio->get("SESSION", "usuari");
    $usuario = $usuaris->consultar($usuario);

    $resposta->set("usuari", $usuario);
    $resposta->SetTemplate("editarUsuaris.php");
    return $resposta;

}