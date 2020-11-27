<!--kristhel-->

<?php

class usuariomodel
{

    private $sql;

    public function conecta()
    {    
        $dsn = 'mysql:dbname={cita_previa;host=localhost';
        $usuario = 'cita_previa';
        $contrasenya = '1234';
        try {
            $this ->sql = new PDO($dsn, $usuario, $contrasenya);
        } catch (PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }

  
    public function afegir($usuario,$correu,$contrasenya)
    {
        $query = $this->sql->prepare('insert into usuari(nom,correu, contrasenya) values(:nom, :correu, :contrasenya);');
        $result = $query->execute([':nom' => $usuario,':contrasenya' => $contrasenya]);
        if ($query->errorCode() !== '00000') {
            $err = $query->errorInfo();
            $code = $query->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} ");
        }
    }

    
    public function esborrar($usuario)
    {
        $query = $this->sql->prepare('update usuario set borrat=1 where nom=:nom;');
        $result = $query->execute([":nom" => $usuario]);
    }


  

    public function consultar($usuario)
    {
        $tasques = array();
        $query =$this->sql->prepare("select * from usuari where nom = :nom;");
        $result= $query->execute([":nom"=> $usuario]);
        $tasques=$query->fetch(\PDO::FETCH_ASSOC);
        return $tasques;
    }

    //
    public function existe()
    {
        
        $query =('select count(*) from nom=:nom;');
        $stm=$this->sql->prepare($query);
        $result = $stm->execute([":nom" =>$usuario]);
        
        return ((int)$stm->fetch()[0])!==0;
    }

    //    
    public function llistatUsuarios()
    {
        $tasques = array();
        $query = "select id,nom from usuari;";
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $tasques) {
            $tasques[]=$usuario["nom"];
        }
        $result=$query->fetch();
        return $tasques;
    }
}