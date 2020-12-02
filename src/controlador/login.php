<?php

function ctrlogin($peticio, $resposta, $config)
{ 
  

    $error = $peticio->get("SESSION", "error");
    

    $resposta->set("error", $error);
    $resposta->setSession("error", "");

    $resposta->SetTemplate("login.php");
    $desc=$_POST["desconecta"];

    if(isset($desc)){
        $resposta->setSession("logat",false);
        $resposta->setSession("usuari","");

    }
    
    return $resposta;

}