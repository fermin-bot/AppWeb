<?php

    session_start();

    require_once('config.php');
    require_once('db.php');

    $db = new db($_SESSION['user']);

    $id_prop = $db->select_file('propiedad');

$sql = "SELECT Id_nodo,Name,Size,Date FROM files WHERE propiedad = $id_prop;";

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
    $html .=  '<td colspan="4">0 results</td>';
    $html .=  "</tr>";
}

echo '<link rel="stylesheet" href="styles.css">';

echo '<table>'.$html.'</table>';

?>