<?php

session_start();
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['contrasena'])) {
  $records = $conn->prepare('SELECT id_usr, email, contrasena FROM usuario WHERE email = :email');
  $records->bindParam(':email',$_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if ((count($results) > 0) && (password_verify($_POST['contrasena'],$results['contrasena']))) {
    $_SESSION['id_usr'] = $results['id_usr'];
    $_SESSION['email'] = $results['email'];
    $_SESSION['nombre_usr'] = $results['nombre_usr'];
    $_SESSION['apellido_usr'] = $results['apellido_usr'];
    $_SESSION['dni_usr'] = $results['dni_usr'];
    $_SESSION['telefono'] = $results['telefono'];
    $_SESSION['tipo_usr'] = $results['tipo_usr'];

    header('Location: index.php');

  } else {
    $message = 'El correo o la contraseña son incorrectos';
  }

}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Sesión</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>

  <body class="hold-transition login-page">


  <div class="login-box">

    <?php
      require 'partials/header.php';
    ?>

    <?php if (!empty($message)) : ?>
      <p><?= $message ?></p>
    <?php endif; ?>

    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar sesión</p>

        <form action="login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="Correo Electrónico" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="contrasena" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- RECORDARME ...................................................
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Recordarme
                </label>
              </div>
            </div>
            -->

            <!-- /.col -->
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->
<br>
        <p class="mb-1 invisible">
          <a href="forgot-password.html">No recuerdo mi contraseña</a>
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  </body>
  </html>
