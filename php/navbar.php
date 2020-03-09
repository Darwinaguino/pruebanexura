<?php
    error_reporting(E_PARSE);
    session_start();

    if(!isset($_SESSION['contador'])){
        $_SESSION['contador'] = 0;
    }
?>
  
  <nav id="navbar-auto-hidden">
    <div class="row hidden-xs">
      <!-- Menu computadoras y tablets -->
      <div class="col-xs-4">
        <figure class="logo-navbar"></figure>
        <p class="text-navbar tittles-pages-logo">NOTES APP</p>
      </div>
      <div class="col-xs-8">
        <div class="contenedor-tabla pull-right">
          <div class="contenedor-tr">
            <a href="index.php" class="table-cell-td">Inicio</a>
            <a href="pacientes.php" class="table-cell-td">Pacientes</a>
            <?php
                            if(!$_SESSION['nombreAdmin']==""){
                                echo '
                                    <a href="configAdmin.php" class="table-cell-td">Administración</a>
                                    <a href="#" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver Historial">
                                       Historial
                                    </a>
                                    <a href="#" class="table-cell-td" data-toggle="modal" data-target=".modal-logout">
                                        <i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['nombreAdmin'].'
                                    </a>
                                 ';
                            }else if(!$_SESSION['nombreUser']==""){
                                echo '
                                    <a href="misregistros.php" class="table-cell-td">Mis registros</a>
                                    <a href="#" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver Historial">
                                        Historial
                                    </a>
                                    <a href="#" class="table-cell-td" data-toggle="modal" data-target=".modal-logout">
                                        <i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['nombreUser'].'
                                    </a>
                                 ';
                            }else{
                                echo '
                                    <a href="registration.php" class="table-cell-td">Registro</a>
                                    <a href="#" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver Historial">
                                        Historial
                                    </a>
                                    <a href="#" class="table-cell-td" data-toggle="modal" data-target=".modal-login">
                                        <i class="fa fa-user"></i>&nbsp;&nbsp;Login
                                    </a>
                                 ';
                            }
                        ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row visible-xs">
      <!-- Mobile menu navbar -->
      <div class="col-xs-12">
        <button class="btn btn-default pull-left button-mobile-menu" id="btn-mobile-menu" onclick="eventosCarrito();">
                    <i class="fa fa-th-list"></i>&nbsp;&nbsp;Menú
        </button>
        <a href="#" id="button-shopping-cart-xs" class="elements-nav-xs all-elements-tooltip carrito-button-nav" data-toggle="tooltip" data-placement="bottom" title="Ver Historial">
                    <i class="fa fa-file"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                </a>
        <?php
                if(!$_SESSION['nombreAdmin']==""){echo '
                    <a href="#"  id="button-login-xs" class="elements-nav-xs" data-toggle="modal" data-target=".modal-logout">
                        <i class="fa fa-user"></i>&nbsp; '.$_SESSION['nombreAdmin'].'
                    </a>';
                }else if(!$_SESSION['nombreUser']==""){
                    echo '
                    <a href="#"  id="button-login-xs" class="elements-nav-xs" data-toggle="modal" data-target=".modal-logout">
                        <i class="fa fa-user"></i>&nbsp; '.$_SESSION['nombreUser'].'
                    </a>';
                }else{
                    echo '
                       <a href="#" data-toggle="modal" data-target=".modal-login" id="button-login-xs" class="elements-nav-xs">
                        <i class="fa fa-user"></i>&nbsp; Iniciar Sesión
                        </a>
                   ';
                }
                ?>
      </div>
    </div>
  </nav>


  <!-- Modal login -->
  <div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" id="modal-form-login">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title text-center text-primary" id="myModalLabel">Iniciar Sesión</h4>
        </div>
        <form action="process/login.php" method="post" role="form" style="margin: 20px;" class="FormCatElec" data-form="login">
          <div class="form-group">
            <label><span class="glyphicon glyphicon-user"></span>&nbsp;Nombre</label>
            <input type="text" class="form-control" name="nombre-login" placeholder="Escribe tu nombre" required="" />
          </div>
          <div class="form-group">
            <label><span class="glyphicon glyphicon-lock"></span>&nbsp;Contraseña</label>
            <input type="password" class="form-control" name="clave-login" placeholder="Escribe tu contraseña" required="" />
          </div>

          <p>¿Cómo iniciaras sesión?</p>
          <div class="radio">
            <label>
                        <input type="radio" name="optionsRadios" value="option1" checked>
                        Enfermera
                    </label>
          </div>
          <div class="radio">
            <label>
                        <input type="radio" name="optionsRadios" value="option2">
                         Administrador
                    </label>
          </div>
          <b><li><a href="registration.php">Registro</a></li></b>
          <b><li><a href="recordarContrasena.php">Recuperación de contraseña</a></li></b>
          <br />
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm">Iniciar sesión</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
          </div>
          <div class="ResFormL" style="width: 100%; text-align: center; margin: 0;"></div>
        </form>
      </div>
    </div>
  </div>
  <!-- Fin Modal login -->




  <div class="modal fade myModalMapa" id="myModalMapa" tabindex="-1" role="dialog" aria-labelledby="myModalMapa" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
          <h4 class="modal-title"><div class="tittles-pages-logo">Mapa de Ubicación</div></h4>

        </div>
        <div class="modal-body">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.4606614625734!2d-77.27864064961315!3d1.2149678991300201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2ed4867f88f56f%3A0x6efbcfc988f23c55!2sGuadalquivir!5e0!3m2!1ses-419!2sco!4v1494902344142"
            style="zoom:0.60" frameborder="0" height="250" width="99.6%" allowfullscreen></iframe>
          <p>
            Direccion: Calle 19 No. 24-84
          </p>
          <p>
            Telefono: +57 7239504
          </p>
          <div class="modal-footer ">
            <button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div id="mobile-menu-list" class="hidden-sm hidden-md hidden-lg">
    <br>
    <h5 class="text-center tittles-pages-logo">NOTES</h5>
    <h6 class="text-center tittles-pages-logo ">APP</h6>
    <button class="btn btn-default button-mobile-menu" id="button-close-mobile-menu">
        <i class="fa fa-times"></i>
        </button>
    <br><br>
    <ul class="list-unstyled text-center">
      <li><a href="index.php ">Inicio</a></li>
      <li><a href="pacientes.php ">Pacientes</a></li>
      <li><a href="#myModalMapa " class="table-cell-td " data-toggle="modal" data-target="#myModalMapa ">Mapa</a></li>
      <?php
                if(!$_SESSION['nombreAdmin']==""){
                    echo '<li><a href="configAdmin.php">Administración</a></li>';

                }elseif(!$_SESSION['nombreUser']==""){
                    
                    echo '<li><a href="historial.php ">Historial</a></li>';
                    echo '<li><a href="misregistros.php ">Mis registros</a></li>';
                    echo '<li><a href="cambioclave.php ">Cambiar contraseña</a></li>';

                }else{
                  echo '<li><a href="registration.php ">Usuarios</a></li>';

                }
            ?>
    </ul>

  </div>


  <!-- Modal carrito -->
  <div class="modal fade modal-carrito" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <br>
        <p class="text-center"><i class="fa fa-file fa-5x"></i></p>
        <p class="text-center">Revise su carrito de compras</p>
        <p class="text-center"><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Aceptar</button></p>
      </div>
    </div>
  </div>
  <!-- Fin Modal carrito -->

  <!-- Modal carrito -->
  <div class="modal fade modal-carrito2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <br>
        <p class="text-center"><i class="fa fa-spinner fa-spin 5x"></i></p>
        <p class="text-center">Despues de redireccionar por favor revice su carrito de compras.</p>

      </div>
    </div>
  </div>
  <!-- Fin Modal carrito -->

  <!-- Modal logout -->
  <div class="modal fade modal-logout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <br>
        <p class="text-center">¿Quieres cerrar la sesión?</p>
        <p class="text-center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
        <p class="text-center">
          <a href="process/logout.php" class="btn btn-primary btn-sm">Cerrar la sesión</a>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
        </p>
      </div>
    </div>
  </div>
  <!-- Fin Modal logout -->
