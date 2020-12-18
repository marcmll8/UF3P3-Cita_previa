<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita Previa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/index.css">
    <body class="bodyInici">
        <div class="contene">
             <div class="titulito"><h1>Cites Pendents</h1></div>
                <table class="pendiento">
                    <?php 
                    for($i=0;$i<count($llistapendents);$i++){
                        ?>
                        <tr>
                            <td><?php echo($llistapendents[$i]["data"]) ?></td><td><?php echo($llistapendents[$i]["comentari"]) ?></td><td><?php echo($llistapendents[$i]["estat"]) ?></td><?php if($info_user["nom"]=="admin"){ ?><td><?php echo($llistapendents[$i]["nom"]); ?></td> <?php } ?>
                            <td><form action="../public/index.php?r=eliminarcita" method="post">
                                <input type="hidden" name="id" value="<?php echo $llistapendents[$i]["id"]?>">
                                <button type="submit" class="btn btn-primary butonsito" name="desconecta">Cancel·lar</button>
                                </form></td>
                        </tr>
                    <?php 
                    }
                    ?>
                </table>
                <?php 
                    if($info_user["rol"]!="client"){
                        ?>
                            <form action="index.php?r=festiu" method="post">
                            <input type="date" name="data" class="datasita">
                            <button type="submit" class="btn btn-primary butonsito">Afegir Festiu</button>
                            </form>
                            
                            <a href="index.php?r=usuaris" class="btn btn-primary butonsito2">Modificar usuaris</a><br>
                        <?php
                    }
                ?>
                <a href="index.php?r=cita" class="btn btn-primary butonsito">Solicitar cita</a>
                <br>
                <br>

                     <form action="../public/index.php?r=login" method="post">
                <button type="submit" class="btn btn-primary butonsito" name="desconecta">Desconectar</button>
                </form>

                
                
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>