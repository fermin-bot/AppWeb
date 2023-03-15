<?php

session_start();

require_once('../config.php');
require_once('../db.php');

$db = new db($_SESSION['user']);

$color = $_POST['color'];

$db->update_user('color',$color);

$_SESSION['color'] = $db->select_user('color');

// echo $_SESSION['color'];

header('location: ../perfil.php');

?>