<?php

function ctrlRegistrar($peticio, $resposta, $config)
{
    $usuaris=new usuariomodel($config["db"]);

    $usuario = $peticio->get(INPUT_POST, "nom");
    $contrasenya = $peticio->get(INPUT_POST, "contrasenya");
    $correu = $peticio->get(INPUT_POST, "correu");

    if (!$usuaris->existeix($usuario)) {
        $hash = password_hash($contrasenya, PASSWORD_DEFAULT, ["cost" => 12]);
        $usuaris->afegir($usuario, $correu, $hash);
        $resposta->setSession("nom", $usuario);
        $resposta->setSession("logat", true);
        $resposta->redirect("location: index.php");
    } else {
        $resposta->setSession("logat", false);
        $resposta->redirect("location: index.php?r=login");
    }
    
    return $resposta;
}