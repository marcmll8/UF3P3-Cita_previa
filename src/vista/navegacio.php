<nav class="navbar navbar-light bg-light sticky-top">
      <a class="navbar-brand" href="index.php?r=pendents">Perruqueria</a>
     
      <ul class="nav"><li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hola <?=$usuariLogat?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php if ($usuariActual["rol"] == "admin") { ?>
            <a class="dropdown-item" href="index.php?r=usuaris">Editar usuaris</a>
          <?php } ?>  
          <a class="dropdown-item" href="index.php?r=login">Tancar la sessió</a>
        </div>
      </li>
    </ul></ul>
    </nav>
