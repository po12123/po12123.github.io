<?php
//este php registar los datos del formulario del cliente a la base de datos
error_reporting(0);
session_start();
include 'includes/conecta.php';
$nombre= $conecta -> real_escape_string($_POST['nom']);
$apellido= $conecta -> real_escape_string($_POST['ape']);
$telefono= $conecta -> real_escape_string($_POST['tel']);
$correo= $conecta -> real_escape_string($_POST['cor']);
$contraseña= $conecta -> real_escape_string(md5($_POST['con']));

$insertar = "INSERT INTO clientes (Nombres_Cliente, Apellidos_Cliente, NumeroCelular_Cliente, Email_Cliente, Password_Cliente) 
VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$contraseña')";
$conecta -> query($insertar);
?>