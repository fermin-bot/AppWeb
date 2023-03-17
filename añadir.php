<?php

    session_start();

    require_once('config.php');
    require_once('db.php');

    $db = new db($_SESSION['user']);

    $img = $db->select_user('img');

    echo "<a href='perfil.php'><img class='rotated imge' src='data:image/png; base64," . base64_encode($img) . "' ' alt='Logo' width='80px' height='80px'></a>";

    $id_prop = $db->select_user('id_user');

$sql = "SELECT Id_nodo,Name,Size,Date FROM files WHERE propiedad = '$id_prop';";

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
            $fila = true;
    }

} else {
    $html .= "<tr>";
    $html .=  '<td colspan="4">0 results</td>';
    $html .=  "</tr>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- <link rel="stylesheet" href="inicio.css" type="text/css"> -->
    <link rel="stylesheet" href="delete.css" type="text/css"/>
    <style>
        body{
            background-image: url("svg.svg");
            background-size: cover;
            background-repeat: no-repeat;
            padding-top: 10vh;
        }
    </style>
</head>
<?='<body style="background-color:' .$_SESSION['color'].'">'?>
<div class="contain">
<form action='add.php'class='div-in' method='post'>
    <div class='div-in'>
        <input type='text'name='nombre' placeholder='Nombre del archivo '>
        <input type='file'>
        <input class='btn btn-primary' id='borrar' type='submit' value='Añadir archivo' class='btn btn-primary'>
        <button type="button" class='btn btn-primary' onclick="location.href='inicio.php'">Inicio</button>
    </div>
</form>


<?='<table class="table table-striped-columns tabla">

<thead>
    </tr>    
        <th>Id</th>
        <th>Name</th>
        <th>Size</th>
        <th>Date</th>
    </tr>
</thead>


'.$html.'</table>'?>
</div>
<br><br>

</body>
</html>