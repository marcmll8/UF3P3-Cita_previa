<?php
function ctrlActualitzarUsuaris($peticio, $resposta, $config)
{
    $id = $peticio->get(INPUT_POST, "id");
    $correu = $peticio->get(INPUT_POST, "correu");
    $rol = $peticio->get(INPUT_POST, "rol");

    $usuaris = new usuariomodel($config["db"]);
    $usuaris->actualitzar($id, $correu, $rol);
    
    $resposta->redirect("location: index.php?r=llistatUsuaris");
    
    return $resposta;
}