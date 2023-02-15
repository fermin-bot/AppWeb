<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            margin: 0 auto;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php

require 'config.php';

$columns = ['Id_nodo','Name','Size','Date'];

$table = 'files';

$file = isset($_POST['file']) ? $conn->real_escape_string($_POST['file']) : null;

$where = '';

// if ($file != null) {
//     $where = "WHERE ";

//     for ($i=0; $i < count($columns); $i++) { 
//         $where .= $columns[$i] . " LIKE '%$file%' OR ";
//     }
    
//     $where = substr_replace($where, "", -3);
//     $where .= ";"; 
// }

// $file = $conn->real_escape_string($_POST['file']) ?? null;

$sql = "SELECT ". implode(", ", $columns) ." FROM ". $table ." WHERE Name LIKE '%$file%';";

$result = $conn->query($sql);

$num_lineas = $result->num_rows;

// print_r($result->fetch_assoc());

echo $num_lineas;
$html = '';

if ($num_lineas > 0) {
    echo "<table border='1'>
    <tr>
    <th>Id_nodo</th>
    <th>Name</th>
    <th>Size</th>
    <th>Date</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        $html .= "<tr>";
        $html .=  "<td>" . $row['Id_nodo'] . "</td>";
        $html .=  "<td>" . $row['Name'] . "</td>";
        $html .=  "<td>" . $row['Size'] . "</td>";
        $html .=  "<td>" . $row['Date'] . "</td>";
        $html .=  "</tr>";
    }
    // echo "</table>";
    // $result->free();
    // $conn->close();
} else {
    $html .= "<tr>";
    $html .=  '<td colspan="6">0 results</td>';
    $html .=  "</tr>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>
</body>
</html>