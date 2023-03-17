<?php

require_once('config.php');

$columns = ['Id_nodo','Name','Size','Date'];

$table = 'files';

$file = isset($_POST['file']) ? $conn->real_escape_string($_POST['file']) : null;

$sql = "SELECT ". implode(", ", $columns) ." FROM ". $table ." WHERE Name LIKE '%{$file}%';";

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
    }

} else {
    $html .= "<tr>";
    $html .=  '<td colspan="6">0 results</td>';
    $html .=  "</tr>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

// echo json_encode($html);

// echo $html;

?>
