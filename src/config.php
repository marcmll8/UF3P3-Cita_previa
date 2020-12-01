<?php
define("RUTA_PER_DEFECTE", 0);

$config = array();

/* configuració de connexió a la base dades */
$config["db"] = array();
$config["db"]["user"] = 'citaprevia';
$config["db"]["pass"] = '1234';
$config["db"]["dbname"] = 'cita_previa';
$config["db"]["host"] = 'localhost';


/* Nom de la cookie */
$config["cookie"]["name"] = 'tasques';

require_once "../src/model/citamodel.php";
require_once "../src/model/festiusmodel.php";
require_once "../src/model/usuariomodel.php";
require_once "../src/emeset/http/peticio.php";
require_once "../src/emeset/http/resposta.php";
require_once "../src/emeset/ruter/ruter.php";