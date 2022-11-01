<?php
error_reporting(0);
session_start();
include 'includes/conecta.php';
$nombre= $conecta -> real_escape_string($_POST['nom']);
$apellido= $conecta -> real_escape_string($_POST['ape']);
$telefono= $conecta -> real_escape_string($_POST['tel']);
$correo= $conecta -> real_escape_string($_POST['cor']);
$contraseña= $conecta -> real_escape_string(md5($_POST['con']));
$establecimiento= $conecta -> real_escape_string($_POST['est']);
$direccion= $conecta -> real_escape_string($_POST['dir']);
$logo= $_FILES["log"];

$tamanoArchivo = $logo['size'];
$imagenSubida = fopen($logo['tmp_name'], 'r');
$binariosImagen = fread($imagenSubida, $tamanoArchivo);
$binariosImagen = mysqli_escape_string($conecta, $binariosImagen);
$insertar = "INSERT INTO establecimiento (Nombres_Establecimiento, Direccion_Establecimiento, Nombre_Encargado, 
Apellidos_Encargado, NumeroCelular_Encargado,Email_Encargado, Password_Encargado, Permiso, Calificacion, Logo) 
values ('$establecimiento','$direccion', '$nombre', '$apellido', '$telefono','$correo','$contraseña','1','1',
'$binariosImagen')";
$conecta -> query($insertar);
?>