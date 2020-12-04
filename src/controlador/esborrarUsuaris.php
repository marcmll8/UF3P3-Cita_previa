<?php

function ctrlEsborrarUsuaris($peticio, $resposta, $config)
{
    $delete = $peticio->get(INPUT_GET, "delete");
    
    $usuaris = new usuariomodel($config["db"]);
    $usuaris->esborrar($delete);
    
    $resposta->redirect("location: index.php?r=usuaris");
    
    return $resposta;
}