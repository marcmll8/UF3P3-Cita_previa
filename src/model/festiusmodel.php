<?php

class modelfestius
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
    public function conecta()
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
    public function afegirfestiu($dia){
        $stm2 = $this->sql->prepare('insert into dies_festius values (:data);');
        $result2 = $stm2->execute([':data' =>$dia]);

    }
    public function mostrartots(){
        $stm2 = $this->sql->prepare('select data from dies_festius;');
        $result2 = $stm2->execute();
        $dies = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $dies;
    }
    public function esborrartots(){
        $query =$this->sql->prepare("truncate table dies_festius;");
        $query->execute();
    }
}