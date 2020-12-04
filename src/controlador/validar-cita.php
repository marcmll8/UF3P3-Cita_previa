<?php
function ctrlvalidarcita($peticio, $resposta){
    $cita=new citamodel($config["db"]);
    $usuaris=new usuariomodel($config["db"]);
    $hora = $peticio->get(INPUT_POST, "hora");
    $comentari = $peticio->get(INPUT_POST, "comentari");
    $usuari=$peticio->get("SESSION", "usuari");

    $id=$usuaris->consultar($usuari);
    $cita->afegircita($hora,$comentari,$id["id"]);

    $resposta->redirect("location: index.php?r=pendents");
    
    return $resposta;
}
