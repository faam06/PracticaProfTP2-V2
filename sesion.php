<?php
session_start();
require 'database.php';

if (isset($_SESSION['id_usr'])) {
  $records = $conn->prepare('SELECT id_usr, nombre_usr, tipo_usr, email, contrasena FROM usuario WHERE id_usr = :id_usr');
  $records->bindParam(':id_usr', $_SESSION['id_usr']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $user = null;
  if (count($results) > 0)  {
    $user = $results;
  }
  

  }
  else {
      header('Location: login.php');
}

?>
