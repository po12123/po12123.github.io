<?php
error_reporting(0);
session_start();
include 'includes/conecta.php';
$id= $conecta -> real_escape_string($_POST['id']);
$precio= $conecta -> real_escape_string($_POST['pre']);
$cantidad= $conecta -> real_escape_string($_POST['can']);
//$montoTotal=$cantidad*$precio
$insertar = "INSERT INTO carrito (Id_Producto, Id_Clientes, Cantidad_X_Producto, MontoTotal_X_Producto) 
values ('$id','1', '1','$precio')";
$conecta -> query($insertar);
?>