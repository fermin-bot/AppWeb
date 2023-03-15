 <?php

        if (isset($_GET['fallo'])){
            echo '<script>alert("Usuario o contraseña incorrectos");</script>';
            require_once('svg.php');
        };

    ?>
    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="general.css">
    <style>
        body{
            background-image: url("svg.svg");
            background-size: cover;
            background-repeat: no-repeat;
            background-color: lightblue;
        }
        .container{ /* glassmorfismo*/
            background: rgba( 255, 255, 255, 0.65 );
            background: rgba( 255, 255, 255, 0.55 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 10.5px );
            -webkit-backdrop-filter: blur( 10.5px );
            border-radius: 10px;<
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="init">    
            <h1>Inicio de sesión</h1>
            
            <form action="init_ses.php" method="post">
                <input class="req" type="text" name="user"placeholder="Usuario" minlength="4" maxlength="15">
                <input class="req" type="password" name="passwd" placeholder="Contraseña" minlength="0" maxlength="15">
                <input class="req" type="submit" value="Iniciar sesión" class="boton">
            </form>
        </div>
        <a class="registro"  href="registro.html">Registrarse</a>
    </div>
    
</body>
   
</html>