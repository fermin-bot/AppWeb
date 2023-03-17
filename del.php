<?php 

session_start();

require_once('config.php');
require_once('db.php');

$db = new db($_SESSION['user']);

$borrar = isset($_POST['borrar']) ? $conn->real_escape_string($_POST['borrar']) : null;

$sql = $db->select_user('id_user');

// if ($db->select_user('id_user') == $borrar) {
$sql = "DELETE FROM files WHERE id_nodo = '$borrar';";
mysqli_query($conn, $sql);
// }

header('Location: delete.php');

?>