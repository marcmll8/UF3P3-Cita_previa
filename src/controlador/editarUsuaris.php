<?php

/**
 * ctrleditarUsuaris function
 *  Controlador per editar els usuaris
 * @param [type] $peticio
 * @param [type] $resposta
 * @param [type] $config
 * @return void
 */
function ctrleditarUsuaris($peticio, $resposta, $config)
{

    $usuaris = new usuariomodel($config["db"]);
    $id = $peticio->get(INPUT_GET, "id");
// $usuario = $peticio->get("SESSION", "usuari");
    $usuario = $usuaris->consultar($id);
    $resposta->set("usuari", $usuario);
    $resposta->SetTemplate("editarUsuaris.php");
    return $resposta;
}
