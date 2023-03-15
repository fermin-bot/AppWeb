
<?php

require_once('config.php');

$user = isset($_POST['user']) ? $conn->real_escape_string($_POST['user']) : null;
$password = isset($_POST['passwd']) ? $conn->real_escape_string($_POST['passwd']) : null;
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : null;


include 'config.php';

$Q_user_nombre = "select * from users where Nombre = '$user';";

$Q_user_CE = "select * from users where Correo_electronico = '$email';";

$nombre = mysqli_fetch_array(mysqli_query($conn, $Q_user_nombre))["Nombre"];

$correo = mysqli_fetch_array(mysqli_query($conn, $Q_user_CE))["Correo_electronico"];

if ($user == $nombre || $email == $correo) {
  echo '<script language="javascript">alert("Ese nombre de usuario o correo electronico ya existe");</script>';
  header('location: registro.html');
  exit();
}
else{
  require_once('imagen.php');
  mysqli_query($conn,"INSERT INTO users (Nombre,Contraseña,Correo_electronico,Color,img) VALUES ('$user','$password','$email','#b1cff2',$imagen);");
  echo '<script language="javascript">alert("Usuario registrado");</script>';
  header('location: index.php');
  exit();
}

?>