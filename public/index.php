<?php

/**
 * index.php envia les dades al router
 */
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../src/config.php";

include "../src/funcions.php";



include "../src/controlador/afegirfestiu.php";
include "../src/controlador/pendents.php";
include "../src/controlador/registrarse.php";
include "../src/controlador/validar-cita.php";
include "../src/controlador/eliminarcita.php";
include "../src/controlador/validar-login.php";
include "../src/controlador/login.php";
include "../src/controlador/cita.php";
include "../src/controlador/citahora.php";
include "../src/middleware/auth.php";
include "../src/controlador/error.php";
/*include "../src/controladors/llistatUsuaris.php";
include "../src/controladors/esborrarUsuari.php";
include "../src/controladors/editarUsuari.php";
include "../src/controladors/actualitzarUsuari.php";
include "../src/middleware/auth.php";
include "../src/middleware/authAdmin.php";*/
$r = $_REQUEST["r"];

$resposta = new Emeset\HTTP\Resposta();
$peticio = new Emeset\HTTP\Peticio();
$ruter = new Emeset\Ruters\RuterParam($config);


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

/*$ruter->ruta("usuaris", "ctrlLlistatUsuaris", "authAdmin");
$ruter->ruta("esborrar_usuari", "ctrlEsborrarUsuari", "authAdmin");
$ruter->ruta("editar_usuari", "ctrlEditarUsuari", "authAdmin");
$ruter->ruta("actualitzar_usuari", "ctrlActualitzarUsuari", "authAdmin");*/
$resposta = $ruter->executa($peticio, $resposta);
$resposta->resposta();
