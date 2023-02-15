<?php

$conn = new mysqli("localhost", "root", "", "aplicacionweb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>