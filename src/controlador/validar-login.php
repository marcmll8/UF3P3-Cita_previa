
<?php
function ctrlvalidarlogin($peticio, $resposta,$config)
{   //KRISTHEL

    $usuaris=new usuariomodel($config["db"]);
    $usuario = $peticio->get(INPUT_POST, "nom");
    $contrasenya = $peticio->get(INPUT_POST, "contrasenya");

    
    $usuario->conecta(); 
    $info_user=$usuaris->consultar($usuario);

    if ($usuari === $config["login"]["nom"] && $contrasenya == $config["login"]["contrasenya"] && $usuari!="" &&$contraseña!="") {
        $resposta->setSession("usuari", $config["login"]["nom"]);
        $resposta->setSession("logat", true);
        $resposta->redirect("location: index.php");
    } else {
        $resposta->setSession("error", "Usuari o clau incorrectes!");
        $resposta->setSession("logat", false);
        $resposta->redirect("location: index.php?r=login");
    }
  
    return $resposta;

}