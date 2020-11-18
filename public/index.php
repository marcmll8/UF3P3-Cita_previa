<?php

/**
    * Exemple de MVC.
    * Exemple per a M07 - UF3 - UF4.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Exemple amb una mini galeria d'imatges.
    * Per provar com funcionar podeu executar php -S localhost:8000 a la carpeta public.
    * I amb el navegador visitar la url http://localhost:8000/
    *
    *
**/
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../src/config.php";
include "../src/funcions.php";
include "../src/model/cita-model.php";
include "../src/model/usuaro-model.php";
include "../src/model/festius-model.php";

include "../src/controladors/validar-cita.php";
include "../src/controladors/validar-login.php";
include "../src/controladors/login.php";
include "../src/controladors/cita.php";

$r = $_REQUEST["r"];

/* Creem els diferents models */
$sessio = new modelusu();
$imatges = new modelen();

if ($r === "login") {
    ctrlogin($_GET, $sessio);
} 
elseif ($r === "validarlogin") {
    ctrlvalidarlogin($_POST, $sessio);
}
/*elseif ($r === "cita") {
    cntrlsetup($_POST, $sessio);
}elseif ($r === "validarcita") {
    ctrlsetup2($_POST, $sessio);
}

elseif ($r === "index") {
    ctrlIndex($_GET, $sessio, $imatges);
} 
else{
    ctrlogin($_GET, $sessio);
}*/