<?php 
function eliminarcita($peticio, $resposta){
    $cita=new citamodel($config["db"]);
    $id = $peticio->get(INPUT_POST, "id");
    echo ($id);
    $cita->esborrarcita($id);
    $resposta->redirect("location: index.php?r=pendents");
    return $resposta;
}