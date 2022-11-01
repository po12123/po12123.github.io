<?php
//este php verifica si un correo ya esta registrado
error_reporting(0);
session_start();
include 'includes/conecta.php';
$correo= $conecta -> real_escape_string($_POST['cor']);
$res=0;
$verificar_correoCliente = mysqli_query($conecta, "SELECT * FROM clientes WHERE Email_Cliente='$correo' ");
$verificar_correoEstablecimiento = mysqli_query($conecta, "SELECT * FROM establecimiento WHERE Email_Encargado='$correo' ");
if(mysqli_num_rows($verificar_correoCliente) > 0 || mysqli_num_rows($verificar_correoEstablecimiento) > 0){
    $res=1;
   } else{
    $res=2;
   }
//1 si el correo ya esta registrado y 2 si el correo no esta registrado
echo $res;
?>