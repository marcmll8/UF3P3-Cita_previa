<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/estilo.css">

    <title>Registrarse</title>
  </head>
  <body>
  <div class="container">
            <?php if (isset($error) && $error != "") {?>
          <div class="alert alert-danger" role="alert">
                <?=$error;?>
          </div>
            <?php }?>

    <div class="row justify-content-md-center">
        <div class="col-4  p-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">REGISTRARSE</h5>
              <p class="card-text">
                <form action="index.php?r=validar-login" method="post">

                  <div class="form-group">
                    <label for="inputUsuari">Usuari</label>
                    <input name="usuari" type="text" class="form-control" id="inputUsuari" value="<?=$usuariRegistre;?>" placeholder="nombre de usuario">
                  </div>
                  
                  <div class="form-group">
                    <label for="inputuUsuari">Usuari</label>
                    <input name="usuari" type="text" class="form-control" id="inputUsuario" value="<?=$usuario;?>" placeholder="nombre de usuario">
                  </div>

                  <div class="form-group">
                    <label for="inputCorreu">Correu</label>
                    <input name="correu" type="text" class="form-control" id="inputCorreu" value="<?=$correuRegistre;?>" placeholder="nombre de usuario">
                  </div>
                  <div class="form-group">
                    <label for="inputContrasenya">Contrasenya</label>
                    <input name="contrasenya" type="password" class="form-control" id="inputContrasenya" placeholder="contrase">
                  </div>

                  <button type="submit" class="btn btn-primary">Registrar</button>
                
                  </form>
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