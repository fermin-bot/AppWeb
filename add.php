<?php 

session_start();

require_once('config.php');
require_once('db.php');

$db = new db($_SESSION['user']);

$nombre = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : null;



// $sql = $db->select_user('id_user');

$db->insert_file('name', $nombre);

header('Location: añadir.php');

?>