<?php
/*
$servidor = "sql10.freesqldatabase.com:3306";
$usuario = "sql10529152";
$password = "L93ygJjdQY";
$bd = "sql10529152";
*/
/*
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "notime2waste";
*/
$servidor = "us-cdbr-east-06.cleardb.net";
$usuario = "b37e4c4c79ae20";
$password = "fe44c49f";
$bd = "heroku_d49cd007ce5f8e7";

  $conecta = mysqli_connect($servidor, $usuario,$password,$bd, 3306);
  if($conecta->connect_error){
    die("Error al conectar la base de datos de la pagina".$conecta->connect_error);
}
?>