<?php

session_start();

require_once('config.php');
require_once('db.php');

$user = isset($_POST['user']) ? $conn->real_escape_string($_POST['user']) : null;
$password = isset($_POST['passwd']) ? $conn->real_escape_string($_POST['passwd']) : null;

$db = new db($user);

// $Q_user =  mysqli_fetch_array(mysqli_query($conn, "select Nombre,Contraseña from users where Nombre = '$user' and Contraseña = '$password';"));

// if ($Q_user["Nombre"] == $user && $Q_user["Contraseña"] == $password) {

  if ($db->select_user('Nombre') == $user && $db->select_user('Contraseña') == $password) {

  

  // echo '<script language="javascript">alert("Se ha iniciado sesion");</script>';

    $_SESSION['user'] = $user;
    $_SESSION['color'] = $db->select_user('color');
    header('location: Animacion\Animacion.php');
  exit();
}
else{
  header('location: index.php?fallo=true');
  exit();
  };  
?>