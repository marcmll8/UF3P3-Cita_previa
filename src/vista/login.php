<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/index.css">

    <title>Inicio de Sesión</title>
  </head>
  <body class="bodyInici">

    <div class="container">
            <?php if (isset($error) && $error != "") {?>
          <div class="alert alert-danger" role="alert">
                <?=$error;?>
          </div>
            <?php }?>

      <h1 class="titulito2" >PERRUQUERIA MARC'S&KRIS</h1>
      <div class="row justify-content-md-center">
        <div class="col-4  p-3">
          <div class="card pendiento">
            <div class="card-body ">
              <h5 class="card-title">INICIAR SESIÓN</h5>
              <p class="card-text">
                <form action="index.php?r=validar-login" class=""method="post">
          
                  <div class="form-group">
                    <label for="inputuUsuari">Usuario</label>
                    <input name="usuari" type="text" class="form-control" id="inputUsuario" value="<?=$usuario;?>" placeholder="nombre de usuario">

                  </div>
                  <div class="form-group">
                    <label for="inputContraseña">Contrasenya</label>
                    <input name="contrasenya" type="password" class="form-control" id="inputContraseña" value="<?=$contraseña;?>" placeholder="contraseña">
                  </div>
                  <button type="submit" class="btn btn-primary butonsito">Acceder</button>


                </form>
                </div>
                </div>
                </div>
                <div class="row justify-content-md-center">
                <div class="col-12  p-3">
                  <div class="card pendiento2">
                    <div class="card-body">
                      <h5 class="card-title">REGISTRARSE</h5>
                      <p class="card-text">
                        <form action="index.php?r=registrarse" method="post">
                  
                          <div class="form-group">
                            <label for="inputuUsuari">Usuari</label>
                            <input name="usuari" type="text" class="form-control" id="inputUsuario" value="" placeholder="nombre de usuario">
                          </div>
                          <div class="form-group">
                            <label for="inputCorreu">Correu</label>
                            <input name="correu" type="mail" class="form-control" id="inputCorreu" value="" placeholder="correu electronic">
                          </div>
                          <div class="form-group">
                            <label for="inputTelefon">telefon</label>
                            <input name="telefon" type="text" class="form-control" id="inputTelefon" value="" placeholder="Telefon">
                          </div>
                          <div class="form-group">
                            <label for="inputContraseña">Contrasenya</label>
                            <input name="contrasenya" type="password" class="form-control" id="inputContraseña" value="" placeholder="contrasenya">
                          </div>
                          <button type="submit" class="btn btn-primary butonsito">Registrarse</button>


                  </form>
              </p>
          </div>          
        </div>
              </p>
            </div>
          </div>          
        </div>
      </div>    
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>