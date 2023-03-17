 <?php

        if (isset($_GET['fallo'])){
            echo '<script>alert("Usuario o contraseña incorrectos");</script>';
        };

    ?>
    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="inicio-registro.css"/>
</head>

<body>
    <div class="container glassmorf">
        <div class="init">    
            <h1>Inicio de sesión</h1>
            
            <form action="init_ses.php" method="post">
                <input class="req" type="text" name="user"placeholder="Usuario" minlength="4" maxlength="15">
                <input class="req" type="password" name="passwd" placeholder="Contraseña" minlength="0" maxlength="15">
                <input class="req boton" type="submit" value="Iniciar sesión">
            </form>
        </div>
        <a class="registro"  href="registro.php">Registrarse</a>
    </div>
    
</body>
   
</html>