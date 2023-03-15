
<?php

$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['passwd'];

include 'config.php';

$Q_user_nombre = "select * from users where Nombre = '$user';";

$Q_user_CE = "select * from users where Correo_electronico = '$email';";

$nombre = mysqli_fetch_array(mysqli_query($conexion, $Q_user_nombre))["Nombre"];

$correo = mysqli_fetch_array(mysqli_query($conexion, $Q_user_CE))["Correo_electronico"];

if ($user == $nombre || $email == $correo) {
  echo '<script language="javascript">alert("Ese nombre de usuario o correo electronico ya existe");</script>';
  header('location: registro.html');
  exit();
}
else{
  mysqli_query($conexion,"INSERT INTO users (Nombre,Contraseña,Correo_electronico) VALUES ('$user','$password','$email');");
  echo '<script language="javascript">alert("Usuario registrado");</script>';
  header('location: index.html');
  exit();
}




?>