<?php

class citamodel
{

    private $sql;

    /**
     * __construct:  Crear el model tasques
     *
     * Model adaptat per PDO
     *
     * @param array $config paràmetres de configurció del model
     *
    **/
    public function __construct($config)
    {
        $dsn = 'mysql:dbname=cita_previa;host=localhost';
        $usuari = 'cita_previa';
        $clau = '1234';
        try {
            $this->sql =new PDO($dsn, $usuari, $clau);
        } catch (PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }
    public function afegircita($dia,$comentari,$idusuari){
        $stm2 = $this->sql->prepare('insert into cita (data,comentari,estat,idusuari) values (:data,:comentari,"pendents",:idusuari);');
        $result2 = $stm2->execute([':data' =>$dia,':comentari' => $comentari, ':idusuari' => $idusuari]);
        echo($dia);
    }
    public function mostrarcita($idusuari){
        $stm2 = $this->sql->prepare('select id,data,comentari,estat from cita where idusuari = :idusuari;');
        $result2 = $stm2->execute([':idusuari' => $idusuari]);
        $dies = array();
        while($dia = $stm2->fetch(\PDO::FETCH_ASSOC)){
            $dies[] = $dia;
        } 
  
        
        return $dies;
    }
    public function mostrartotes($dia){
       
         
        $dia=$dia."%";
    
        $stm2 = $this->sql->prepare('select data from cita where data LIKE :dia;');
        $result2 = $stm2->execute([':dia' => $dia]);
        while($hora = $stm2->fetch(\PDO::FETCH_ASSOC)){
            $data=new DateTime($hora["data"]);
            $temps=$data->format("G:i");
            
            $hores[] = $temps;
        } 
        
        return $hores;
    }
    public function mostrarglobal(){
       
         
    
        $stm2 = $this->sql->prepare('select * from cita;');
        $result2 = $stm2->execute();
        while($hora = $stm2->fetch(\PDO::FETCH_ASSOC)){
            $temps=$hora;
            
            $hores[] = $temps;
        } 
        return $hores;
    }
    public function esborrarcita($idcita){
        $query =$this->sql->prepare("delete from cita where id = :idcita;");
        $result2 = $query->execute([':idcita' => $idcita]);
      
    }
}