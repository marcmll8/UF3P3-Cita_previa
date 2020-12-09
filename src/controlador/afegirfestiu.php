<?php
/**
 * ctrlFestius function
 *  controlador dels festius
 * @param [type] $peticio
 * @param [type] $resposta
 * @param [type] $config
 * @return void
 */
function ctrlFestius($peticio, $resposta,$config)
{
    $festius=new festiusmodel($config["db"]);
    $data = $peticio->get(INPUT_POST, "data");
    $festius->afegirfestiu($data);
    $resposta->set("error", $error);
    $resposta->setSession("error", "");
    echo($data);
    $resposta->redirect("location: index.php?r=pendents");
    return $resposta;

}