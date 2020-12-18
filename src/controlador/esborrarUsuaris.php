<?php
/**
 * ctrlEsborrarUsuaris function
 *  Controlador d'esborrar els usuaris
 * @param [type] $peticio
 * @param [type] $resposta
 * @param [type] $config
 * @return void
 */
function ctrlEsborrarUsuaris($peticio, $resposta, $config)
{
    $delete = $peticio->get(INPUT_GET, "delete");
    
    $usuaris = new usuariomodel($config["db"]);
    $usuaris->esborrar($delete);
    
    $resposta->redirect("location: index.php?r=usuaris");
    
    return $resposta;
}