<?php
include "config.php";
/**
 * Creacalendari function
 *
 * @param [date] $mes
 * @param [date] $any
 * @param array $festius
 * @return void
 */
function creaCalendari($mes,$any ,$festius = array()){
    $date=new DateTime();
    $diaini=new DateTime("$any-$mes-1");
    $diaf = $date->format("t");
    $avui=$date->format("j");
    $diai = $diaini->format("N");
    $calendari="";

         $calendari=$calendari . '<table class="calendari">
            <tr>
            <th>Dill</th>
            <th>Dima</th>
            <th>Dime</th>
            <th>Dijo</th>
            <th>Dive</th>
            <th>Disa</th>
            <th>Dium</th>
            </tr>';        
            $dia=1;
            $i=0; $calendari=$calendari ."<tr>";
      for($i=1;$i<8;$i++){
       
        if($i<$diai){
          
          $calendari=$calendari."<td></td>";
         }

        else{
          $diaActual = $diaini -> format("Y-m-d");
          
           $calendari=$calendari."<td "; if(!in_array($diaActual,$festius)){$calendari=$calendari."><a href='../public/index.php?r=citahora&m=$diaActual'"; if($dia==$avui){ $calendari=$calendari. 'class="avui" ';} }
          
          else{ $calendari=$calendari. 'class="festa" ';} $calendari=$calendari.">"; 

          if($dia<=$diaf){  $calendari=$calendari.$dia; $dia++;} 

          if(!in_array($dia,$festius)){$calendari=$calendari."</a>";   }

          $calendari=$calendari.'</td>';
                   $diaini -> modify("+1 day");

          }
        
      }
      $calendari=$calendari ."</tr>";
       
      while($dia<=$diaf){    

        $diaActual = $diaini -> format("Y-m-d");

        $calendari=$calendari."<td "; if(!in_array($diaActual,$festius)){$calendari=$calendari."><a href='../public/index.php?r=citahora&m=$diaActual'"; if($dia==$avui){ $calendari=$calendari. 'class="avui" ';} }
        
        else{ $calendari=$calendari. 'class="festa" ';} $calendari=$calendari.">"; 

        if($dia<=$diaf){  $calendari=$calendari.$dia; $dia++;} 

        
        if(!in_array($diaActual,$festius)){$calendari=$calendari."</a>";   }
        $calendari=$calendari.'</td>';

        $diaini -> modify("+1 day");
        
        if($i%7==0){
          $calendari=$calendari.'</tr>';
        }
          
        $i++;}
        $calendari=$calendari.'</table>';
        return $calendari;
      }

