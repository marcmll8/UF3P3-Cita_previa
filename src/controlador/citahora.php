<?php
/**
 * ctrlCitaHora function
 *  Controlador per demanar la hora
 * @param [type] $peticio
 * @param [type] $resposta
 * @param [type] $config
 * @return void
 */
function ctrlCitaHora($peticio,$resposta,$config){
   
    $dia = $peticio ->get(INPUT_GET,"m");
    $date=new DateTime();
    $dataS = new DateTime($dia);
    $dataF = $dataS->format('d-m-Y');
    $dataM = $dataS->format('Y-m-d');
    $mes = $date ->format("m");
    $festius=new festiusmodel($config["db"]);
    $usuaris=new usuariomodel($config["db"]);
    $cita=new citamodel($config["db"]);
    $error = $peticio->get("SESSION", "error");
    $resposta->set("error", $error);
    $resposta ->SetTemplate("citahora.php");
    $resposta->set("dia",$dataF);
    $horesagafades=$cita->mostrartotes($dataM);
    if($horesagafades==0){
        $horesagafades=array("");
    }
    $hores=["8:00","8:30","9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30"];
    $final=array();
    for($i=0;$i<count($hores);$i++){
        $agafat=false;
        for($x=0;$x<count($horesagafades);$x++){
           
            if($hores[$i]==$horesagafades[$x]){
               
                $agafat=true;
            }
        }
        if(!$agafat){
            array_push($final,$hores[$i]);
        }
    }
    $resposta->set("mostrarDia",$dataF);
    $resposta->set("final",$final);
    $resposta->set("dia",$dataM);
    return $resposta;
}
