<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="inicio-registro.css"/>
</head>
<body>

    <div class="container glassmorf">
        <div class="reg">    
            <h1>Registro</h1>
            
            <form action="regis_usr.php" method="post">
                <input class="req" type="text" name="user" placeholder="Usuario" minlength="4" maxlength="15">
                <input class="req" type="text" name="email" placeholder="Correo electronico (example@exam.ple)" minlength="4" maxlength="40">
                <input class="req" type="password" name="passwd" placeholder="Contraseña" minlength="4" maxlength="15">
                <input class="req" type="submit" value="Registrarse" class="boton">
            </form>
        </div>
        <a class="registro" href="index.php">¿Ya tienes cuenta? Inicia sesion.</a>
    </div>
    
</body>
</html>