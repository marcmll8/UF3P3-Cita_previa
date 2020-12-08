<?php
function ctrlvalidarlogin($peticio, $resposta,$config)
{   
    
    $usuaris=new usuariomodel($config["db"]);
   
    $usuari = $peticio->get(INPUT_POST, "usuari");
    $contrasenya = $peticio->get(INPUT_POST, "contrasenya");
    
    $info_user=$usuaris->consultar($usuari);

        if(password_verify($contrasenya, $info_user["contrasenya"]) === true){
            if(password_needs_rehash($info_user["contrasenya"], PASSWORD_DEFAULT, $config["hash"])){
                $hash = password_hash($contrasenya, PASSWORD_DEFAULT, $config["hash"]);
                $usuaris->actualitzarClau($info_user["nom"], $hash);
              }
            $resposta->setSession("usuari",$usuari);
            $resposta->setSession("logat", true);
            $resposta->redirect("location: index.php?r=pendents");
        }
        else if (($usuari == $info_user["nom"] && $contrasenya == $info_user["contrasenya"]) && ($usuari!=""||$contrasenya!="")){
            $hash = password_hash($contrasenya, PASSWORD_DEFAULT, $config["hash"]);
            $usuaris->actualitzarClau($info_user["nom"], $hash);
            
        $resposta->setSession("usuari",$usuari);
        $resposta->setSession("logat", true);
        $resposta->redirect("location: index.php?r=pendents");
    } else {
        $resposta->setSession("error", "Usuari o clau incorrectes!");
        $resposta->setSession("logat", false);
       $resposta->redirect("location: index.php?r=login");
    }
    return $resposta;

}