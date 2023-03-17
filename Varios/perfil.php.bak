<?php
            session_start();
                
                require_once('config.php');
                require_once('db.php');
                $db = new db($_SESSION['user']);
                $img = $db->select_user('img');
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <style>
        /* *{
            padding: 0;
            margin : 0;
            box-sizing: border-box;

        } */
        :root {
  /* --black: #00000050; */
  /* --white: #ffffff; */
}
        div{
           
        }
        .container{
            /* background: #000000; */
            display: inline-block;
            /* border: #c4dbfa solid 3px; */
            padding: 30px;
        }

        .d{
            width: 70%;
            height: 80vh;
        }

        .i{
            width: 20%;
            height: 90vh;
            text-align: right ;
        }
        .a{
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            background-color: rgba(193, 252, 252, 0.629);
            width: 98vw;
            height: 97vh;
        }
        /* body{
            background-color: rgb(252, 243, 243);
        } */
        a{
            text-decoration: none;
            color: black; 
            font-size: 30px;
        }
        a:hover{
            color: gray;
        }
       
        *{
            font-family: Arial, Helvetica, sans-serif;
            font-style: normal;
        }
        .dividor{
            /* margin-top: 3vh; */
            /* margin-bottom: 3vh; */
            height:90vh; 
            width:0.1px; 
            /* border: solid 1px var(--black); */
            
            border: solid 1px black;
        }
            /* que invierta el color de fondo */
        
        
    </style>
    
</head>


<?='<body style="background-color: '.$_SESSION["color"].'">'; ?>

    

    <div class="a">
        
        <div class="container i">
            <a href="inicio.php">    
                <i class="fi fi-rr-document"> 
                    Inicio
                </i>
            </a><br>
            <a href="index.php">
                <i class="fi fi-rr-document"> 
                    Cerrar sesión
                </i>
            </a>
        </div>

        <div class="dividor"></div>

        <div class="container d">
            
            <!-- <a href=""><i class="fi fi-rr-document ind"> hola</i></a> https://www.flaticon.es/ -->

                <!--  Cambiar el color del ui  -->

                <?="<img class='rotated' src='data:image/png; base64," . base64_encode($img) . "' ' alt='Logo' width='200vw' height='200vh'>"?>

            <form action="Funcionalidades/cambiar_color.php" method="post">
                <input type="color" name="color">
                <input type="submit" value="Cambiar color">
            </form>

            <form action="Funcionalidades/cambiar_img.php" method="post" enctype="multipart/form-data">
                <input type="file" name="imagen">
                <input type="submit" value="Cambiar imagen">
            </form>
                
        
        </div>
    </div>

</body>
</html>