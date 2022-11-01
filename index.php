
<?php 
$dbServerName  =  "ejemplo.com" ; 
$dbUsername  =  "exdbuser" ; 
$dbPassword  =  "exdbpass" ; 
$dbName  =  "codexworld" ; 

// crear conexión 
$conn  = new  mysqli ( $dbServerName ,  $dbUsername ,  $dbPassword ,  $dbName ); 

// comprueba la conexión 
si ( $conn -> connect_error ) { 
	echo  "no se conecto" ; 
    die( "Error en la conexión: "  .  $conn -> connect_error );
} 
echo  "Conectado con éxito" ; 
?>
