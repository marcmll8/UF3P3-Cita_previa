<?php

class usuariomodel
{

    private $sql;
    public function __construct($config)
    {
        $dsn = 'mysql:dbname=' . $config["dbname"] . ';host=' . $config["host"];
        $usuario = $config["user"];
        $contrasenya = $config["pass"];
        try {
            $this ->sql = new PDO($dsn, $usuario, $contrasenya);
        } catch (PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }


    public function afegir($usuario, $correu, $contrasenya, $telefon)
    {
        $query = $this->sql->prepare('insert into usuari(nom,telefon,correu, contrasenya,rol) values(:nom,:telefon ,:correu, :contrasenya,"client");');
        $result = $query->execute([':nom' => $usuario,':telefon' => $telefon,':correu' => $correu,':contrasenya' => $contrasenya]);
        if ($query->errorCode() !== '00000') {
            $err = $query->errorInfo();
            $code = $query->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} ");
        }
    }


    public function esborrar($id)
    {
        $query = $this->sql->prepare('delete from usuari where id=:id;');
        $result = $query->execute([":id" => $id]);
    }




    public function consultar($usuario)
    {
        $tasques = array();
        $query = $this->sql->prepare("select * from usuari where nom = :nom;");
        $result = $query->execute([":nom" => $usuario]);
        $tasques = $query->fetch(\PDO::FETCH_ASSOC);
//print_r($tasques);
        return $tasques;
    }
    public function actualitzarClau($id, $clau)
    {
        $query = $this->sql->prepare('update usuari set contrasenya = :clau  where nom = :nom;');
        $result = $query->execute([':nom' => $id, ":clau" => $clau]);
        if ($query->errorCode() !== '00000') {
            $err = $query->errorInfo();
            $code = $query->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} ");
        }
    }
    //
    public function existeix($usuario)
    {

        $stm = $this->sql->prepare('select count(*) from usuari where nom=:nom;');
        $result = $stm->execute([":nom" => $usuario]);
        return ((int)$stm->fetch()[0]) !== 0;
    }

    //
    public function llistatUsuarios()
    {
        $tasques = array();
        $query = "select * from usuari;";
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $usuari) {
            $tasques[] = $usuari;
        }
        return $tasques;
    }
    public function actualitzar($id, $correu, $telefon, $rol)
    {
        $query = $this->sql->prepare('update usuari set correu = :correu,telefon = :telefon, rol = :rol  where id = :id;');
        $result = $query->execute([':id' => $id, ":correu" => $correu,":telefon" => $telefon, ":rol" => $rol]);
        if ($query->errorCode() !== '00000') {
            $err = $query->errorInfo();
            $code = $query->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} ");
        }
    }
}
