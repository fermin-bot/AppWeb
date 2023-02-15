<?php

$user = $_POST['user'];
$password = $_POST['passwd'];

require 'config.php';

$Q_user =  mysqli_fetch_array(mysqli_query($conn, "select Nombre,Contraseña from users where Nombre = '$user' and Contraseña = '$password';"));

if ($Q_user["Nombre"] == $user && $Q_user["Contraseña"] == $password) {
  echo '<script language="javascript">alert("Se ha iniciado sesion");</script>';
  header('location: inicio.html');
  exit();
}
else{
  echo '<script language="javascript">alert("Usuario o contraseña incorrectos");</script>';
  header('location: index.html');
  exit();
  };  

?>