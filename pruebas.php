<?php

// echo base64_encode('perfil.jpg'),"<br>";

// echo base64_decode('cGVyZmVsLmpwZw==',"true");

// filter_input()

// session_start();

require_once('config.php');
require_once('db.php');

$user = 'olek';

$db = new db($user);
$hash = $db->select_user('Contraseña');
// $pass = password_hash('olek', PASSWORD_DEFAULT);
// echo $hash.'<br><br>';

// if (password_verify($pass  , $hash) == true) {
//     echo 'true';
// }
// else{
//     echo 'false';
// }

// Cifrar la contraseña utilizando password_hash
$password = "olek";
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Imprimir la contraseña cifrada
echo "Contraseña cifrada: " . $hash . "<br>";

// Verificar la contraseña utilizando password_verify
if (password_verify($password, $hash)) {
  echo "La contraseña coincide";
} else {
  echo "La contraseña no coincide";
}


// General
// - He creado un archivo de configuracion que es el conf.php que lo que hace es almacena la conexion a la base de datos- Y luego cree otro archivo en el que esta el objeto db que tiene todas las sentencias sql que voy a poder necesitar para la pagina web

// En el registro- He puesto en el registro que el correo electronico tenga una mascara para que tenga que ser un correo de verdad - En los campos de registro hay un minimo de 4 caracteres y un maximo de 15 excepto en el correo que es de 40.- Ademas uso la funcion 'real_escape_string' que lo que hace es quitar todos los caracteres que podrian ser susceptibles para hacer sql inyection. - Despues pues comprueba si hay usuarios o correo electronicio iguales y no te deja guardar los datos y si el correo no es valid te saleun alert en js qu ete dice que no es valido pero si ya existe t asle un alert que dice que el nombre o el usuario ya estan registrados- Las contraseñas se guadan hasheadas para mas seguridad

// En el index
// - En el inicio tengo otra forma de sacar un fallo ya que se puede hacer con el header refresh y cuando le das al alert y te da la informacion te redirige o pasando una variable. Cuando el usuario y la contraseña en el inicio son incorrectas hago un header location que me redirige y pasa la variable fallo en tru y activa que al volver a cargar la pagina salga un alert .- En todo lo de la pagina de registro esta tambien implementado aqui- Se verifican los hash de las contrseñas y no las contraseñas en texto plano- Una vez o¡pones bien el usuario y la contraseña la pagina inicia sesion automaticamente y va a hacer todas las busquedas en la base de datos en referencia el usuario

// En el inicio
// - Hay un requerimiento de que haya una sesion iniciada con un usuario de la base de datos - Hay muchas cosas esteticas que seria probarlas. luego hare un apartadao.-  Aqui esta la tabla que extrae informacion con ajax de la base de datos. Esto funciona de la siguiente manera: >Tengo un fetch con js que manda la informacion del input a un archivo php que hace una consulta a la base de datos que le devuelve un json con toda la informacion introducida en una tabla. Luego una de las promesas del fetch recoge ese json, lo interpreta y lo inserta en el contenedor content que es un tbody ya que en el thead estan los campos en orden de lo que se va a insertar. A su vez esto se actualiza en tiempo real ya que cada vez que estas en el input y pretas una tecla se manda la informacion (value) del input para que se actualize y no haya que recargar la página.
// Despues  hay otras 3 cosas la imagen arriba a la derecha que tiene una animacion de ampliarse y ademas lleva al perfil. Tambien hay dos botones en la tabla que llevan a dos paginas una para eliminar registros y otra para añadirlos. Y por ultimo un menu lateral echo con js para añadir acesos rapidos a otras paginas y otras funcionalidades.

// En el perfil


?>  