<?php
  require 'sesion.php';
  require 'database.php';

  $id = $_GET['i'];
  $message = '';

  $sql = "SELECT * FROM usuario WHERE id_usr =  $id ";
  $stmt = $conn -> prepare($sql);
  $result = $stmt->execute();
  $results = $stmt->fetch(PDO::FETCH_ASSOC);

  $user = null;
  if (count($results) > 0)  {
    $user = $results;
    $n = $user['contrasena'];
  }
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Modificar usuarios</title>
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
  <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/portalrecibos" class="nav-link">Inicio</a>
      </li>
      <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    -->
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/portalrecibos" class="brand-link">
      <img src="images/logo-lite2.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Portal Recibos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="images/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
              if(isset($_SESSION["email"])){
                echo   '<h6>'.$_SESSION["email"].'</h6>';
              }
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php
        require 'partials/nav_admin.php';
      ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ADMIN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Cambiar Contraseña</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">


          <div class="register-box">
          <div class="card-body register-card-body">
            <?php if (!empty($message)) : ?>
              <p><?= $message ?></p>
            <?php endif; ?>

            <form action="" method="post">

              <!--<p><b>ID</b></p>
              <div class="input-group mb-3">-->
                <input disabled type="hidden" name="idx" class="form-control" value="<?php echo $user['id_user'] ?>">
                <!--<div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>-->
              <p><b>NOMBRE</b></p>
              <div class="input-group mb-3">
                <input disabled type="text" name="surname" class="form-control" value="<?php echo $user['name'] ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <p><b>APELLIDO</b></p>
              <div class="input-group mb-3">
                <input disabled type="text" name="name" class="form-control" value="<?php echo $user['surname'] ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <p><b>CONTRASEÑA NUEVA</b></p>
              <div class="input-group mb-3">
                <input type="password" id="myInput" name="newpass" class="form-control" required >

                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <p><b>REPETIR CONTRASEÑA NUEVA</b></p>
              <div class="input-group mb-3">
                <input type="password" id="myInput" name="newpassconfirm" class="form-control" required >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <input type="checkbox" onclick="myFunction()"> Mostrar Contraseña
              <br>

                <br>
                <!-- /.col -->
                <div class="d-flex justify-content-between">
                  <div class="col-5">
                    <a href="user_list.php" class="btn btn-primary btn-block"><i class="fas fa-ban"></i> Cancelar</a>
                  </div>
                  <div class="col-5">
                    <button type="submit" name="modify" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Confirmar</button>
                  </div>
                </div>
                <!-- /.col -->

                <?php
                if (isset($_POST['modify'])) {

                  if (!empty($_POST['newpass']) && !empty($_POST['newpassconfirm'])) {
                    $ps = $_POST['newpass'];
                    $ps2 = $_POST['newpassconfirm'];

                    if ($ps == $ps2) {
                      $ps = $_POST['newpass'];
                      $sql = "UPDATE `users` SET `password` = :password WHERE `id_user` =  $id";
                      $stmt = $conn -> prepare($sql);
                      $pass_cifrado = password_hash($ps, PASSWORD_DEFAULT);
                      $stmt->bindParam(':password',$pass_cifrado);

                      if($stmt->execute()){
                      echo "<script>
                      alert('Contraseña modificada');
                      </script>";
                    }
                  } else {
                    $message = 'Las contraseñas no coinciden';
                  }


                } else {
                  $message = 'Complete los 2 campos';
                }


                }
                ?>



            </form>

          </div>
          </div>
  </div>



          </tbody>

          <!-- PIE DE TABLA
          <tfoot>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
          </tr>
          </tfoot>
        -->

        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

  <!-- PIE DE PAGINA
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.1
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>
-->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jsGrid -->
<script src="plugins/jsgrid/demos/db.js"></script>
<script src="plugins/jsgrid/jsgrid.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>



</body>
</html>
