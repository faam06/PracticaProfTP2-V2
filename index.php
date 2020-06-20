<?php
  session_start();
  require 'database.php';

  if (isset($_SESSION['id_usr'])) {
    $records = $conn->prepare('SELECT id_usr, tipo_usr, email, contrasena FROM usuario WHERE `id_usr` = :id_usr');
    $records->bindParam(':id_usr', $_SESSION['id_usr']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0)  {
      $user = $results;
    }
    $tipo = $user['tipo_usr'];
    switch ($tipo){
      case 88:
        header('Location: user_admin.php');
      break;
      case 1:
        header('Location: user_supervisor.php');
      break;
      case 2:
        header('Location: user_empleado.php');
      break;
      case 3:
        header('Location: user_auditor.php');
      break;
    }
  }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bienvenido al Portal</title>
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
  <link rel="shortcut icon" href="images/empresa.ico">
</head>



<body class="hold-transition login-page">


<div class="login-box">

  <?php
    require 'partials/header.php';
  ?>


      <?php if (!empty($user)) : ?>
        <?php if ($user['tipo_usr'] == 88) : ?>
          <div class="card">
            <div class="card-body login-card-body">
              <p class="text-center">SESIÓN ADMINISTRADOR</p>
              <p class="text-center"><?= $user['email'] ?></p>
              <p></p>
              <a href="user_admin.php" class="btn btn-primary btn-block">Perfil Admin</a>
              <p></p>
              <a href="logout.php" class="btn btn-primary btn-block">Cerrar sesión</a>
            </div>
          </div>
        <?php else: ?>
          <div class="card">
            <div class="card-body login-card-body">
              <p class="text-center">SESIÓN INICIADA</p>
              <p class="text-center"><?= $user['email'] ?></p>
              <p></p>
              <a href="user_auditor.php" class="btn btn-primary btn-block">Ir al perfil</a>
              <p></p>
              <a href="logout.php" class="btn btn-primary btn-block">Cerrar sesión</a>
            </div>
          </div>
        <?php endif; ?>
      <?php else: ?>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Por favor </br>Inicie sesión para comenzar</p>
        <!-- /.please -->
        <div class="">
          <a href="login.php" type="submit" class="btn btn-primary btn-block">Iniciar Sesión</a>
        </div>
        <!-- /.please -->
      </div>
    </div>
  <?php endif; ?>
  </div>



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>


</html>
