<?php
        
            session_start();
            
            

            if($_SESSION['user'] == true){
                
                require_once('config.php');
                require_once('db.php');

                echo '<body style="background-color:' .$_SESSION['color'].'">';

                $db = new db($_SESSION['user']);
                $img = $db->select_user('img');
                echo "<a href='perfil.php'><img class='rotated' src='data:image/png; base64," . base64_encode($img) . "' ' alt='Logo' width='80px' height='80px'></a>";
            }
            else{
                header('Location: index.php');
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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="general.css">
    <style>
        table, th, td {
            margin: auto;
            border: 1px solid black;
            border-collapse: collapse;
            margin-top: 130px;
        }
        th {
            padding: 10px;
            width: 100px;
        }
        tbody > td{
            padding: 10px;
            width: 100px;
        }
        
        #file{
            width: 102.5%;
            height: 70px;
            margin: -10px;  
            margin-left: -10px;          
            background-color: #b1cff2;
        }
        td{
            width: 25%;
        }
        .tabla{
            width: 90%;
            border: solid 4px gray;
        }
        
        /* Imagen de perfil */
        
        .rotated {
            transition : 1s;
        }
        .rotated:hover{
            transform: scale(1.5);
            margin : 30px;
        }
        img{
            border-radius: 1000px;
            position: absolute;
            top: 0;
            right: 0;
            margin: 20px;
            border: 4px solid #2e2e2e;
            cursor: pointer;
        }

        /* Tabla botones */

        .crud{
            text-align: center;
        }
        .crud > button{
           /* margin-left: 15%; */
           /* margin-right: 15%;  */
           margin-bottom : 6px;
           display: inline;
        }
        .crud > a{
           /* margin-left: 15%; */
           /* margin-right: 15%;  */
           margin-bottom : 6px;
           display: inline;
        }
        
        .btn{
            transition: 0.5s;
            display: block;
        }
        .btn:hover{
            transform: scale(1.2);
        }
        .menu{
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 50px;
            cursor: pointer;
        }
        #navegador {
            display: block;
            position: absolute;
            top: 0;
            left: -200px;
            /* left: 0; */
            width: 200px;
            height: 100%;
            background-color: #262626;
            transition: left 0.5s ease-in-out;
            /* text-align: center; */
        }
        
        #navegador > ul {
            list-style: none;
            margin: 10px;
            padding: 0;
            text-weight: bold;
        }

        #bac-icon{
            font-size: 50px;
            width: 30px;
            height: 30px;
            /* width: 50px;
            height: 50px; */
            /* background-color: white ; */
            position: relative; 
            margin: 10px;
            transition: 0.5s ;
            rotate: 180deg;
        }
    
        #bac-icon:hover{
            transform: rotate(180deg);
        }
        .nav-div{
            width: 100%;
            background-color: pink;
            text-align: right;
        }
        .espam{
            margin-left: 15%;
            margin-right: 15%;
        }
        body{
            <?='background-color:$_SESSION["color"]'?>
        }
        .nav-a{
            color: lightgray;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            text-decoration: none;
            font-size: 1.5em;
        }


        
    </style>
</head>

        <body>

            <i class="fi fi-br-menu-burger menu"></i>



            <nav id="navegador">

                <div class="nav-div">    

                    <!-- <div class="rot"><i class="fi fi-rr-angle-double-small-left" id="bac-icon" mouseover="rotate()"></i></div> -->
                    
                    <img src="img/dobleFlecha.png"  id="bac-icon">

                </div>
                
                <ul>
                    <li><a class='nav-a' href="#">Enlace 1</a></li>
                    <li><a class='nav-a' href="#">Enlace 2</a></li>
                    <li><a class='nav-a' href="#">Enlace 3</a></li>
                </ul>
            
            </nav>

    <div class="cont">
        <table class="tabla table table-dark table-striped">
        <thead>
            <tr>
                <td colspan='2'><input type="text" id="file" name="file"></td>
                <td colspan='2' class="crud">
                    <button type="button" class="btn btn-primary espam" onclick="">Añadir</button>
                    <button type="button" class="btn btn-primary espam" onclick="location.href='delete.php'">Eliminar</button>
                </td>
            </tr>    
                <th>Id_nodo</th>
                <th>Name</th>
                <th>Size</th>
                <th>Date</th>
        </thead>

        <tbody id="content">

        </tbody>
    </table>
    </div>

    <script type="text/javascript">

        const bacicon = document.querySelector('#bac-icon');
        const menu = document.querySelector('.menu');
        const navegador = document.querySelector('#navegador');

        menu.addEventListener('click', function(){
        navegador.style.left = '0';
        });
        bacicon.addEventListener('click', function(){
        navegador.style.left = '-200px';
        });

        function rotate(){
            let icono = document.querySelector("#bac-icon")
            icono.style.transform = "rotate(180deg)"
        }

        GetData()

        document.querySelector('input[name="file"]').addEventListener("keyup", GetData)

        function GetData(){
            let input = document.getElementById("file").value
            let content = document.getElementById("content")
            let url = "load.php"
            let formaData = new FormData()
            formaData.append('file', input)

            fetch(url, {
                method: "POST",
                body: formaData
        }).then(response => response.json())
              .then(data => {
                content.innerHTML = data
              }).catch(error => console.log(error))
        }
        
    </script>

</body>
</html>