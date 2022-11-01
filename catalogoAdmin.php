<?php include('includes/conecta.php');
session_start();
$usuario = $_SESSION['Usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleCatalogoAdmin1.css">
   <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
   <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Merienda+One" />
</head>
<body>


<div class="container">

   <h3 class="title"> Productos Registrados </h3>
 
   <div class="products-container">
   <?php
   $sql= "SELECT * FROM producto WHERE Id_Establecimiento = $usuario";
   $resultado=mysqli_query($conecta,$sql);
   
    while($mostrar=mysqli_fetch_array($resultado))
    {
    ?>  
      <div class="product" data-name="p-1">
         <img src="data:image/png;base64,<?php echo  base64_encode($mostrar['Imagen_Producto']); ?>" alt="">
         <h3><?php echo $mostrar['Nombres_Producto'] ?></h3>
         <div class="price">Precio: <?php echo $mostrar['Precio_Producto'] ?> Bs.</div>
         <div class="price">Disponible hasta: <?php echo $mostrar['Tiempo_Disponible'] ?></div>
      </div>
      <?php
    }
    ?>
   </div>
   
</div>
<div class="contBoton">
   <a class="botons" href="logout.php">Cerrar sesion</a>
   <a class="botons" href="RegistroProducto.php">Registrar producto</a>
</div>
</body>
</html>