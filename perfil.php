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
    <title>Perfil</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="perfil.css">
</head>


<?='<body style="background-color: '.$_SESSION["color"].'">'; ?>

    

    <div class="d-all">
        
        <div class="container d-left">
            <a href="inicio.php">    
                <img src="img/home.png"  alt="Logo" width="30vw" height="30vh"> 
                    Inicio
                </i>
            </a><br>
            <a href="index.php">
                <img src="img/salida.png" alt="Logo" width="30vw" height="30vh">
                    Cerrar sesión
                
            </a>
        </div>

        <div class="dividor"></div>

        <div class="container d-right">
            
            <!-- <a href=""><i class="fi fi-rr-document ind"> hola</i></a> https://www.flaticon.es/ -->

                <!--  Cambiar el color del ui  -->

                <?="<img class='rotated perfil' src='data:image/png; base64," . base64_encode($img) . "' ' alt='Logo' width='200vw' height='200vh'>"?>

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