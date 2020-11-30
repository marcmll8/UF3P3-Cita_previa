<<<<<<< HEAD
<!--Peralta-->
=======
<?php

/**************************
 *
 * M07 - UF1
 * Professor: Dani Prados
 *
 * Exemple de fitxer init per inicialitzar la base dades des de
 * la línia de comandes.
***************************/

error_reporting(E_ERROR | E_WARNING | E_PARSE);


$dsn = 'mysql:dbname=cita_previa;host=localhost';
$usuari = 'cita_previa';
$clau = '1234';
try {
    $sql = new PDO($dsn, $usuari, $clau);
} catch (PDOException $e) {
    die('Ha fallat la connexió: ' . $e->getMessage());
}

// Buidem la taula
$usuaris = array();
echo "Buidant la taula - ";

$query = "delete from usuari where nom=nom;";
$sql->exec($query);


echo "[ok]\n";

// Inserim valors


$usuaris = array(
    array("nom" => "admin","telefon"=>"645315364","correu"=>"mperalta@cendrassos.net","contrasenya" =>"1234","rol"=>"admin"),
    array("nom" => "generic","telefon"=>"645179021","correu"=>"marcmll@gmail.com","contrasenya" =>"1234","rol"=>"client"),
    array("nom" => "usuari1","telefon"=>"645782198","correu"=>"kris@gmail.com","contrasenya" =>"1234","rol"=>"client"),
);




foreach ($usuaris as $actual) {
    echo "Inserint l'usuari: \"{$actual['nom']}\" ";
    $stm = $sql->prepare('insert into usuari (nom,telefon,correu,contrasenya,rol) values (:nom,:telefon,:correu,:contrasenya,:rol);');
    $result = $stm->execute([':nom' => $actual["nom"],':telefon' => $actual["telefon"],':correu' =>$actual["correu"],':contrasenya'=>$actual["contrasenya"],':rol'=>$actual["rol"]]);
    echo "[ok]\n";

}

>>>>>>> b5a72020ab0272f67ec858698c33ea9dbc5e9b30
