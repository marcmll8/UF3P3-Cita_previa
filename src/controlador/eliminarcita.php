<?php 
/**
 * eliminarcita function
 *  controlador per eliminar la cita
 * @param [type] $peticio
 * @param [type] $resposta
 * @return void
 */
function eliminarcita($peticio, $resposta){
    $cita=new citamodel($config["db"]);
    $id = $peticio->get(INPUT_POST, "id");
    echo ($id);
    $cita->esborrarcita($id);
    $resposta->redirect("location: index.php?r=pendents");
    return $resposta;
}