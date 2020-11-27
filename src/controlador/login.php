<!--Kristhel-->

<?php

function ctrlogin($peticio, $resposta, $config)
{ 
  

    $error = $peticio->get("SESSION", "error");
    

    $resposta->set("error", $error);
    $resposta->setSession("error", "");

    $resposta->SetTemplate("login.php");

    return $resposta;

}