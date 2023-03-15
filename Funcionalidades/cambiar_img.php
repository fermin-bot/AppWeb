<?php

session_start();

require_once('../config.php');
require_once('../db.php');

$db = new db($_SESSION['user']);

$imagen = $db->update_user('img', addslashes(file_get_contents($_FILES['imagen']['tmp_name'])));

header('location: ../inicio.php');

?>