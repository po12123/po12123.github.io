<?php 
$servidor = "us-cdbr-east-06.cleardb.net:3306";
$usuario = "b37e4c4c79ae20";
$password = "fe44c49f";
$bd = "heroku_d49cd007ce5f8e7";

// crear conexión 
$conn  = new  mysqli ( $servidor ,  $usuario ,  $password ,  $bd ); 
echo  "antes de verificar" ; 
// comprueba la conexión 
if ( $conn -> connect_error ) { 
	echo  "no se conecto" ; 
    die( "Error en la conexión: "  .  $conn -> connect_error );
} 
echo  "Conectado con éxito" ; 
?>
