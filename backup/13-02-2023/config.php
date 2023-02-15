<?php

$conn = new mysqli("localhost", "root", "", "almacen");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>