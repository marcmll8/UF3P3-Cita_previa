
<?php
function ctrlvalidarlogin($peticio, $resposta,$config)
{   //KRISTHEL
    $usuari=$_POST["usuari"];
    $contrasenya=$_POST["contrasenya"];
    $usuaris=new usuariomodel($config["db"]);
    $usuario = $peticio->get(INPUT_POST, "usuari");
    $contrasenya = $peticio->get(INPUT_POST, "contrasenya");

    
    $info_user=$usuaris->consultar($usuario);

    if (($usuari == $info_user["nom"] && $contrasenya == $info_user["contrasenya"]) && ($usuari!=""||$contrasenya!="")) {
        $resposta->setSession("usuari", $config["nom"]);
        $resposta->setSession("logat", true);
        $resposta->redirect("location: index.php?r=pendents");
    } else {
        $resposta->setSession("error", "Usuari o clau incorrectes!");
        $resposta->setSession("logat", false);
        $resposta->redirect("location: index.php?r=login");
    }

    return $resposta;

}