<?php
function ctrlActualitzarUsuaris($peticio, $resposta, $config)
{
    $id = $peticio->get(INPUT_POST, "id");
    $correu = $peticio->get(INPUT_POST, "correu");
    $telefon = $peticio->get(INPUT_POST, "telefon");

    $rol = $peticio->get(INPUT_POST, "rol");

    $usuaris = new usuariomodel($config["db"]);
    $usuaris->actualitzar($id, $correu, $telefon,$rol);
    
    $resposta->redirect("location: index.php?r=usuaris");
    
    return $resposta;
}