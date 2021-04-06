<?php

/**
 * index.php envia les dades al router
 */

session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once "../src/config.php";

require_once "../src/funcions.php";



require_once "../src/controlador/afegirfestiu.php";
require_once "../src/controlador/pendents.php";
require_once "../src/controlador/registrarse.php";
require_once "../src/controlador/validar-cita.php";
require_once "../src/controlador/eliminarcita.php";
require_once "../src/controlador/validar-login.php";
require_once "../src/controlador/login.php";
require_once "../src/controlador/cita.php";
require_once "../src/controlador/citahora.php";
require_once "../src/middleware/auth.php";
require_once "../src/controlador/error.php";
require_once "../src/controlador/llistatUsuaris.php";
require_once "../src/controlador/esborrarUsuaris.php";
require_once "../src/controlador/editarUsuaris.php";
require_once "../src/controlador/actualitzarUsuaris.php";
require_once "../src/middleware/auth.php";
require_once "../src/middleware/authAdmin.php";
$r = $_REQUEST["r"];

$resposta = new Emeset\HTTP\Resposta();
$peticio = new Emeset\HTTP\Peticio();
$ruter = new Emeset\Ruters\RuterParam($config);

$ruter->ruta("", "ctrlogin");
$ruter->ruta("cita", "ctrlCita");
$ruter->ruta("citahora", "ctrlCitaHora");
$ruter->ruta("pendents", "ctrlPendets");
$ruter->ruta("festiu", "ctrlFestius");
$ruter->ruta("eliminarcita", "eliminarcita", "auth");
$ruter->ruta("validar-cita", "ctrlvalidarcita", "auth");
$ruter->ruta("registrarse", "ctrlRegistrar");
$ruter->ruta("login", "ctrlogin");
$ruter->ruta("validar-login", "ctrlvalidarlogin");
$ruter->ruta("privat", "ctrlPrivat", "auth");
$ruter->ruta("tancar-sessio", "ctrlTancarSessio", "auth");
$ruter->ruta(RUTA_PER_DEFECTE, "ctrlError");

$ruter->ruta("usuaris", "ctrlLlistatUsuaris", "authAdmin");
$ruter->ruta("esborrarUsuaris", "ctrlEsborrarUsuaris", "authAdmin");
$ruter->ruta("editarUsuaris", "ctrleditarUsuaris", "authAdmin");
$ruter->ruta("actualitzarUsuari", "ctrlActualitzarUsuaris", "authAdmin");
$resposta = $ruter->executa($peticio, $resposta);
$resposta->resposta();
