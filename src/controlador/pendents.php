<?php
function ctrlPendets($peticio, $resposta, $config)
{ 
    $usuario=$peticio->get("SESSION", "usuari");
    $festius=new festiusmodel($config["db"]);


    $usuaris=new usuariomodel($config["db"]);
    $info_user=$usuaris->consultar($usuario);
    $error = $peticio->get("SESSION", "error");
    $resposta->set("error", $error);
    $resposta->setSession("error", "");
    $resposta->SetTemplate("pendets.php");
    $llistapendents=array(array('data' =>"10-10-2021 12:00" ,'comentari'=>"Tallar cabells" ,'estat'=>"pendent"),
                        array('data' =>"10-9-2021 12:00" ,'comentari'=>"Tallar cabells" ,'estat'=>"pendent"),
                        array('data' =>"10-8-2021 12:00" ,'comentari'=>"Tallar cabells" ,'estat'=>"pendent"),
                        );

    $resposta->set("llistapendents", $llistapendents);
    $resposta->set("info_user",$info_user);
    $resposta->set("festius",$festius);
    return $resposta;

}