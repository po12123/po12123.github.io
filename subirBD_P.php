<?php
error_reporting(0);
session_start();
include 'includes/conecta.php';
$nombre= $conecta -> real_escape_string($_POST['nom']);
$descripcion= $conecta -> real_escape_string($_POST['des']);
$cantidad= $conecta -> real_escape_string($_POST['can']);
$precio= $conecta -> real_escape_string($_POST['pre']);
$tiempo= $conecta -> real_escape_string($_POST['tie']);
$imagen= $_FILES["ima"];

$tamanoArchivo = $imagen['size'];
$imagenSubida = fopen($imagen['tmp_name'], 'r');
$binariosImagen = fread($imagenSubida, $tamanoArchivo);
$binariosImagen = mysqli_escape_string($conecta, $binariosImagen);
$insertar = "INSERT INTO producto (Nombres_Producto, Descripcion_Producto, Tiempo_Disponible, Cantidad_Producto, 
Precio_Producto, Imagen_Producto, Disponible_Producto, Id_Establecimiento, FechaPublicacion_Producto) 
values ('$nombre','$descripcion', '$tiempo', '$cantidad', '$precio','$binariosImagen','1','12',now())";
$conecta -> query($insertar);
echo ($conecta);
?>