<?php
/**
 * ctrlRegistrar function
 *  controlador de Registrar
 * @param [type] $peticio
 * @param [type] $resposta
 * @param [type] $config
 * @return void
 */
function ctrlRegistrar($peticio, $resposta, $config)
{
    $usuaris=new usuariomodel($config["db"]);
    
    $usuario = $peticio->get(INPUT_POST, "usuari");
    $contrasenya = $peticio->get(INPUT_POST, "contrasenya");
    $telefon = $peticio->get(INPUT_POST, "telefon");
    $correu = $peticio->get(INPUT_POST, "correu");

    if (!$usuaris->existeix($usuario)&&($usuario!=""&&$contrasenya!=""&&$telefon!=""&&$correu!="")) {
        $hash = password_hash($contrasenya, PASSWORD_DEFAULT, ["cost" => 12]);
        $usuaris->afegir($usuario, $correu,$hash,$telefon);
        $resposta->setSession("nom", $usuario);
        $resposta->setSession("logat", true);
        $resposta->redirect("location: index.php?r=pendents");
        $resposta->setSession("usuari",$usuario);
        $resposta->setSession("logat", true);
    } else {
        $resposta->setSession("error", "Has d'inserir tots els camps per registrarte o l'usuari ja existeix!");
        $resposta->setSession("logat", false);
        $resposta->redirect("location: index.php?r=login");
    }
    
    return $resposta;
}