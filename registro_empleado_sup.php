<?php
  require 'sesion.php';
  require 'database.php';

  $message ='';
  $nombre_usr ='';
  $apellido_usr ='';
  $email ='';
  $telefono ='';
  $dni_usr='';
  $id_suc='';
  $contrasena ='';
  $contrasena_conf ='';
  $tipo_usr= '2'; 

  if (!empty($_POST['email']) && !empty($_POST['contrasena']) && !empty($_POST['contrasena_conf']) && !empty($_POST['nombre_usr']) && !empty($_POST['apellido_usr']) && !empty($_POST['dni_usr'])) {
    
    $nombre_usr = $_POST['nombre_usr'];
    $apellido_usr = $_POST['apellido_usr'];
    $dni_usr = $_POST['dni_usr'];
    $email = $_POST['email'];    
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];
    $contrasena_conf = $_POST['contrasena'];
    $id_suc = $_POST['id_suc'];

    if ($contrasena != $contrasena_conf) {
      echo "<script>
      alert('Error! Las contraseñas no coinciden');
      </script>";
    } 
    else {
      $records = $conn->prepare('SELECT * FROM usuario WHERE dni_usr = :dni_usr');
      $records->bindParam(':dni_usr',$dni_usr);
      $records->execute();
      $results1 = $records->fetch(PDO::FETCH_ASSOC);

      if (!empty($results1)){
        echo "<script>
        alert('Error! Ya existe ese DNI');
        </script>";
      } 
      else {
        $records = $conn->prepare('SELECT * FROM usuario WHERE email = :email');
        $records->bindParam(':email',$email);
        $records->execute();
        $results1 = $records->fetch(PDO::FETCH_ASSOC);

        if (!empty ($results1)){
          echo "<script>
          alert('Error! Ya existe ese email');
          </script>";
        }
        else {
          $sql = "INSERT INTO usuario (nombre_usr, apellido_usr, email, contrasena, dni_usr, telefono, id_suc, tipo_usr) VALUES (:nombre_usr, :apellido_usr, :email, :contrasena, :dni_usr, :telefono, :id_suc, :tipo_usr)";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':email',$email);
          $password = $contrasena;
          $pass_cifrado = password_hash($password, PASSWORD_DEFAULT);
          $stmt->bindParam(':contrasena',$pass_cifrado);
          $stmt->bindParam(':nombre_usr',$nombre_usr);
          $stmt->bindParam(':apellido_usr',$apellido_usr);
          $stmt->bindParam(':telefono',$telefono);
          $stmt->bindParam(':dni_usr',$dni_usr);
          $stmt->bindParam(':id_suc', $id_suc);
          $stmt->bindParam(':tipo_usr',$tipo_usr);

          if ($stmt->execute()) {
            echo "<script>
            alert('Usuario registrado con éxito');
            </script>";
          }
          else {
            echo "<script>
            alert('ERROR! Ha ocurrido un problema creando su usuario');
            </script>";
          }

        }

      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cargar Empleado</title>
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
  <!-- page script -->
  <link rel="shortcut icon" href="images/empresa.ico">
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
        <a href="user_supervisor.php" class="nav-link">Inicio</a>
      </li>     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="images/empresa.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Nuevo Empleado</span>
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
        require 'partials/nav_supervisor.php';       
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
              <h1>Supervisor</h1>
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
        <div class="register-box">

          <div class="card">
            <br>
            <h3 class="login-box-msg">Agregar Nuevo Empleado</h3>
          <div class="card-body register-card-body">
          <form action="registro_empleado_sup.php" method="post">           
            <div class="input-group mb-3">
              <input type="text" name="nombre_usr" class="form-control" placeholder="Nombre" minlength="3" maxlength="30" required value=<?php echo $nombre_usr ?> >
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="apellido_usr" class="form-control" placeholder="Apellido" minlength="3" maxlength="30" required value=<?php echo $apellido_usr?>>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="dni_usr" class="form-control masked" placeholder="DNI" required value=<?php echo $dni_usr ?>>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="telefono" class="form-control" placeholder="Número de teléfono" value=<?php echo $telefono ?>>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" required value=<?php echo $email ?>>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="id_suc" class="form-control" placeholder="ID de la Sucursal" required value=<?php echo $id_suc ?>>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" minlength="5" required value=<?php echo $contrasena?>>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="contrasena_conf" class="form-control" placeholder="Repetir Contraseña" minlength="5" required alue=<?php echo $contrasena_conf?>>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <br>
              <!-- /.col -->
              <div class="">
                <button type="submit" class="btn btn-primary btn-block">Crear Empleado</button>
              </div>
              <!-- /.col -->
          </form>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>
