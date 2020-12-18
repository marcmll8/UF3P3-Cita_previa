<?php



error_reporting(E_ERROR | E_WARNING | E_PARSE);


$usuaris=new usuariomodel($config["db"]);


// Buidem la taula
$usuaris = array();
echo "Buidant la taula - ";

$usuaris->esborrartodos();
echo "[ok]\n";



$usuaris = array(
    array("nom" => "admin","telefon"=>"645315364","correu"=>"mperalta@cendrassos.net","contrasenya" =>"1234","rol"=>"admin"),
    array("nom" => "generic","telefon"=>"645179021","correu"=>"marcmll@gmail.com","contrasenya" =>"1234","rol"=>"client"),
    array("nom" => "usuari1","telefon"=>"645782198","correu"=>"kris@gmail.com","contrasenya" =>"1234","rol"=>"client"),
);


foreach ($usuaris as $actual){
    echo "Inserint l'usuari: \"{$actual['nom']}\" ";
    $hash = password_hash($actual["contrasenya"], PASSWORD_DEFAULT, ["cost" => 12]);
    $usuaris->afegir($actual["nom"], $actual["correu"],$hash,$actual["telefon"]);
    echo "[ok]\n";
}

