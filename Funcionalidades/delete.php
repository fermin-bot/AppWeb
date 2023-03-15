<?php

    session_start();

    require_once('../config.php');
    require_once('../db.php');

    $db = new db($_SESSION['user']);

    // echo $db->select_user('propiedad');

$sql = "SELECT 'Id_nodo','Name','Size','Date' FROM files WHERE propiedad = $db->select_user('propiedad');";

$result = $conn->query($sql);

$num_lineas = $result->num_rows;

$html = ' ';

$fila = false;

$id = 0;

if ($num_lineas > 0) {

    while($row = $result->fetch_assoc()) {
        $html .=  "<tr id='".$id."'>";
        $html .=  "<td>" . $row['Id_nodo'] . "</td>";
        $html .=  "<td>" . $row['Name'] . "</td>";
        $html .=  "<td>" . $row['Size'] . "</td>";
        $html .=  "<td>" . $row['Date'] . "</td>";
        $html .=  "</tr>";
        $id++;
        if($fila = false){
            $html .=  "<td>" . $row['Id_nodo'] . "</td>";
            $html .=  "<td>" . $row['Name'] . "</td>";
            $html .=  "<td>" . $row['Size'] . "</td>";
            $html .=  "<td>" . $row['Date'] . "</td>";
            $html .=  "</tr>";
            $fila = true;
        } else {
            $fila = false;
        }
    }

} else {
    $html .= "<tr>";
    $html .=  '<td colspan="6">0 results</td>';
    $html .=  "</tr>";
}

?>