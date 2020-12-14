<?php
define("RUTA_PER_DEFECTE", 0);



/* configuració de connexió a la base dades */
$config["db"] = array();
$config["db"]["user"] = 'cita_previa';
$config["db"]["pass"] = '1234';
$config["db"]["dbname"] = 'cita_previa';
$config["db"]["host"] = 'localhost';
$config["hash"] = ["cost" => 12];
$config["hores"]=["8:00","8:30","9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30"];
/* Nom de la cookie */
$config["cookie"]["name"] = 'tasques';
 
require_once "../src/model/citamodel.php";
require_once "../src/model/festiusmodel.php";
require_once "../src/model/usuariomodel.php";
require_once "../src/emeset/http/peticio.php";
require_once "../src/emeset/http/resposta.php";
require_once "../src/emeset/ruter/ruter.php";

$festiusito=new festiusmodel($config["db"]);

$festius =$festiusito -> mostrartots();
