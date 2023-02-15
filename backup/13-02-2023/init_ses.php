<?php

$user = $_POST['user'];
$password = $_POST['passwd'];

include 'config.php';

// $GuardarDatos = "INSERT INTO users (Nombre,Contraseña,Correo_electronico) VALUES ('$user','$password','$email');";

// $datos = mysqli_query($conexion,$GuardarDatos);

// if ('SELECT Nombre FROM users WHERE Nombre = "$user"' || 'SELECT Contraseña FROM users WHERE Contraseña = "$password"'){
    // echo "Hola ", ucfirst($user);
// }

// print_r( mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM users")));

$Q_user =  mysqli_fetch_array(mysqli_query($conexion, "select Nombre,Contraseña from users where Nombre = '$user' and Contraseña = '$password';"));

// print_r($Q_user);

// echo $conexion -> fetch_row($Q_user);

if ($Q_user["Nombre"] == $user && $Q_user["Contraseña"] == $password) {
  echo '<script language="javascript">alert("Se ha iniciado sesion");</script>';
//   header('location: pagina1.html');
//   exit();
}
else{
  echo '<script language="javascript">alert("Usuario o contraseña incorrectos");</script>';
  header('location: pagina1.html');
    exit();
    };  

?>