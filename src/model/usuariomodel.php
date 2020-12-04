<?php
class usuariomodel
{

    private $sql;

    public function __construct($config)
    {    
        $dsn = 'mysql:dbname=cita_previa;host=localhost';
        $usuario = 'cita_previa';
        $contrasenya = '1234';
        try {
            $this ->sql = new PDO($dsn, $usuario, $contrasenya);
        } catch (PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }

  
    public function afegir($usuario,$correu,$contrasenya,$telefon)
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
        $query = $this->sql->prepare('update usuari set borrat=1 where id=:id;');
        $result = $query->execute([":id" => $id]);
    }


  

    public function consultar($usuario)
    {
        $tasques = array();
        $query =$this->sql->prepare("select * from usuari where nom = :nom and borrat=0;");
        $result= $query->execute([":nom"=> $usuario]);
        $tasques=$query->fetch(\PDO::FETCH_ASSOC);
        return $tasques;
    }

    public function actualitzar($id, $correu, $rol)
    {
        $query = $this->sql->prepare('update usuari set correu = :correu, rol = :rol  where id = :id;');
        $result = $query->execute([':id' => $id, ":correu" => $correu, ":rol" => $rol]);
        if ($query->errorCode() !== '00000') {
            $err = $query->errorInfo();
            $code = $query->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} ");
        }
    }


    //
    public function existeix($usuario)
    {
        
        $stm=$this->sql->prepare('select count(*) from usuari where nom=:nom;');
        $result = $stm->execute([":nom" =>$usuario]);
     
        return ((int)$stm->fetch()[0])!==0;
    }

    //    
    public function llistatUsuarios()
    {
        $tasques = array();
        $query = "select * from usuari where borrat=0;";
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $tasques) {
            $tasques[]=$usuario["nom"];
        }
        $result=$query->fetch();
        return $tasques;
    }
}