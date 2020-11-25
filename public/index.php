<?php

/**
 * index.php envia les dades al router
 */
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../src/config.php";
include "../src/funcions.php";
include "../src/model/cita-model.php";
include "../src/model/usuaro-model.php";
include "../src/model/festius-model.php";

include "../src/controlador/validar-cita.php";
include "../src/controlador/validar-login.php";
include "../src/controlador/login.php";
include "../src/controlador/cita.php";
include "../src/middleware/auth.php";
$r = $_REQUEST["r"];

$resposta = new Emeset\HTTP\Resposta();
$peticio = new Emeset\HTTP\Peticio();
$ruter = new Emeset\Ruters\RuterParam($config);


$ruter->ruta("cita", "ctrlCita");
$ruter->ruta("validarcita", "ctrlvalidarcita");
$ruter->ruta("login", "login");
$ruter->ruta("validar-login", "ctrlValidarLogin");
$ruter->ruta("privat", "ctrlPrivat", "auth");
$ruter->ruta("tancar-sessio", "ctrlTancarSessio", "auth");
$ruter->ruta(RUTA_PER_DEFECTE, "ctrlError");
$resposta = $ruter->executa($peticio, $resposta);

$resposta->resposta();