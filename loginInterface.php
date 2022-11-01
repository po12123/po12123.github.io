<?php
session_start();
error_reporting(0);
// llamar ala conexión de base de datos
include 'includes/conecta.php';
if(isset($_POST['entrar'])){
$usuario = $conecta->real_escape_string($_POST['usuario']);
$ver = 0;
$usuario2 =  $conecta->real_escape_string($_POST['usuario']);
$password = $conecta->real_escape_string(($_POST['pass']));
$password2 = $conecta->real_escape_string(($_POST['pass']));
// generar una consulta que extraigo los datos de la bd
$consulta = "SELECT * FROM clientes WHERE Email_Cliente = '$usuario' and Password_Cliente = '$password'";
$consulta2 = "SELECT * FROM establecimiento WHERE Email_Encargado = '$usuario2' and Password_Encargado = '$password2'";
if($resultado = $conecta->query($consulta)){
   while($row = $resultado->fetch_array()){
     $userok = $row['Email_Cliente'];
     $passwordok = $row['Password_Cliente'];
     $idok = $row['Id_Clientes'];
   }
   $resultado->close();
}
if($resultado2 = $conecta->query($consulta2)){
   while($row2 = $resultado2->fetch_array()){
    $userok2 = $row2['Email_Encargado'];
    $passwordok2 = $row2['Password_Encargado'];
    $idok2 = $row2['Id_Establecimiento'];
  }
}
$conecta->close();

if((isset($usuario) && isset($password))||(isset($usuario2) && isset($password2))){
  if($usuario == $userok &&  $password == $passwordok ){
    $_SESSION['login'] = TRUE;
    $_SESSION['Usuario'] = $idok;
    $ver = 1;

  }else{
    if($usuario2 == $userok2 && $password2 == $passwordok2){
      $_SESSION['login'] = TRUE;
      $_SESSION['Usuario'] = $idok2;
      $ver = 2;

    }
    else {
      $ver = 0;
       }
  }
}
else{
  $ver = 0;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/login-prueba.css">
    <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
   </head>
   <body>
    <div id="contenedor-flex">
        <div id="contenedor-imagen">
          <a class="texto-encima" href=""><strong>PediEco</strong></a>
          
          <img src="images/ImgLogin.png"  alt="" width="100%" height="100%" >
         
         
        </div>
        
        <div id="contenedor-lateral">
            <div id="contenedor-form">
    
             <h1 id="titulo"><b>Iniciar Sesión<b></h1>
              <p>Bienvenido a tu aventura de compras!!</p><br>
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-register" id="form" onsubmit="return validarForm();">
             
              <div class="group">
                <!-- <label>Correo Electronico</label><br> -->
                <input type="text" id="correo" spellcheck="false" name="usuario" placeholder="Correo Electrónico"required 
                pattern =".+@(gmail|hotmail|outlook).(com|es)" title = "ingrese nombre">
                
              </div>
              <div class="group">
                <!-- <label>Contraseña</label><br> -->
                <input type="password" id="contrasenia" name="pass" spellcheck="false" placeholder="Contraseña" required title="ingrese contraseña">
                
              </div>
              
              <p>¿No tienes cuenta?</p>
              <p><a href="registroCliente.php"> Registrate como Cliente</a></p>
              <p><a href="RegistroEstablecimiento.php"> Registrate como Establecimiento</a></p>
              <button type="submit" class="button buttonBlue" name="entrar">Ingresar</button>
             </form>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    var x = <?php echo $ver;?>;
  </script>
  <script src="js/sweetAlert2.js"></script>
  <script src="js/validarFormu.js"></script>
  
</body>


<script type="module" src="js/login.js"></script>
<!-- <script  type="module" src="../assets/js/connection-firebase.js"></script> -->
</html>