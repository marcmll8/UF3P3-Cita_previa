<?php

$config = array();

/* configuració de connexió a la base dades */
$config["db"] = array();
$config["db"]["user"] = 'citaprevia';
$config["db"]["pass"] = '1234';
$config["db"]["dbname"] = 'cita_previa';
$config["db"]["host"] = 'localhost';


/* Nom de la cookie */
$config["cookie"]["name"] = 'tasques';

require_once "../src/model/cita-model.php";
require_once "../src/model/festius-model.php";
require_once "../src/model/usuario-model.php";