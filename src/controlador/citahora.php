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
    $disponible=true;

    if($horesagafades==0){
        $horesagafades=array("");
    }
    $hores= $config["hores"];
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
    if(count($horesagafades)==12){
        $final=["no hi ha hores disponibles"];
        $disponible=false;
    }
    $resposta->set("disponible",$disponible);
    $resposta->set("mostrarDia",$dataF);
    $resposta->set("final",$final);
    $resposta->set("dia",$dataM);
    return $resposta;
}
