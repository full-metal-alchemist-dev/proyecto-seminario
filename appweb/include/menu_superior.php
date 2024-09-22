  <?php //include 'session.php'; ?>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   </ul>


      <?php

      $CONSULTA = "SELECT estado as estado_boton FROM estado_sistema";
      $EJECUTAR = $conn->query($CONSULTA);
      $RESPUESTA = $EJECUTAR->fetch_assoc();
      $estado_boton =  $RESPUESTA['estado_boton'];

              //$estado_boton = 0;

      ?>

      <?php if ($estado_boton) { ?>
        <input type="checkbox" id="checkbox1" name="my-checkbox" value="0" checked data-bootstrap-switch data-off-color="danger" data-off-text="BLOQUEDO"  data-on-text="ENCENDIDO"  data-on-color="success">
      <?php }
      else { ?>
       <input type="checkbox" id="checkbox1" name="my-checkbox"  value="1" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="BLOQUEDO"  data-on-text="ENCENDIDO" >
     <?php } ?>




   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">

    </li>

    <?php //include 'notificaciones_y_mensajes.php'; ?>


    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="../dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline"><?php //echo $user['nombres'].' '.$user['apellidos']; ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

          <p>
            Usuario logeado - Web Developer
            <small>Member since Nov. 2012</small>
          </p>
        </li>
        <!-- Menu Body -->
         <!--  <li class="user-body">
            <div class="row">
              <div class="col-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Friends</a>
              </div>
            </div> -->
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="../include/logout.php" class="btn btn-default btn-flat float-right">Cerrar sesion</a>
          </li>
        </ul>
      </li>



    </ul>
  </nav>