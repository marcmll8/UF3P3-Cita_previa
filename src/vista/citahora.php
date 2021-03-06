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
             <div class="titulito"><h1>Cita Previa per el dia <?php echo($mostrarDia); ?></h1></div>
                <div class="horari">
                <?php if ($disponible == true) { ?>
                <form action ="../public/index.php?r=validar-cita" method="post" class="formulario">
                <?php } else {?>
                <form action ="../public/index.php?r=cita" method="post" class="formulario">
                <?php } ?>
                
                <img src="../src/img/barberia3.png" class="barberito">
                    <select name="hora" id="" class="selecto">
                    <?php
                    for ($i = 0; $i < count($final); $i++) {
                        ?>
                    <option value="<?php echo($dia . " " . $final[$i]) ?>"><?php echo($final[$i]) ?></option>
                    <?php } ?>
                    </select>
                      <?php
                        if ($disponible == true) { ?>
                    <textarea class="area" name="comentari" id="" placeholder="comentari" required></textarea>
                  
                    <button type="submit" class="btn btn-primary butonsito3">Enviar</button>
                        <?php } else {?>
                        <button type="submit" class="btn btn-primary butonsito3">Tornar al calendari</button>
                        <?php } ?>
                </form>
                </div>
                </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
