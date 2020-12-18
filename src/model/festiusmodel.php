<?php

class festiusmodel
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
        $dsn = 'mysql:dbname=' . $config["dbname"] . ';host=' . $config["host"];
        $usuario = $config["user"];
        $contrasenya = $config["pass"];
        try {
            $this ->sql = new PDO($dsn, $usuario, $contrasenya);
        } catch (PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }
    public function afegirfestiu($dia)
    {
        $stm2 = $this->sql->prepare('insert into dies_festius (data) values (:data);');
        $result2 = $stm2->execute([':data' => $dia]);
        echo($dia);
    }
    public function mostrartots()
    {
        $stm2 = $this->sql->prepare('select data from dies_festius;');
        $result2 = $stm2->execute();

        $dies = array();
        while ($dia = $stm2->fetch(\PDO::FETCH_ASSOC)) {
                $dies[] = $dia["data"];
        }

        return $dies;
    }
    public function esborrartots()
    {
        $query = $this->sql->prepare("truncate table dies_festius;");
        $query->execute();
    }
}
