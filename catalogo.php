<?php include('includes/conecta.php');
session_start();
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
   <link rel="stylesheet" href="css/styleCatalogo1.css">
   <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
   <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Merienda+One" />

   <!-- custom js file link  -->
   <script src="js/agregarProducto2.js" defer ></script>
</head>
<body>


<div class="container">

   <h3 class="title"> PediEco </h3>
   
   <div class="products-container">
   <?php
   $sql= "SELECT * FROM producto";
   $resultado=mysqli_query($conecta,$sql);
   
    while($mostrar=mysqli_fetch_array($resultado))
    {
        $datosEstab = "SELECT * FROM establecimiento WHERE Id_Establecimiento = $mostrar[Id_Establecimiento]";
        if($result = $conecta->query($datosEstab)){
            while($row = $result->fetch_array()){
            $nombreEstab = $row['Nombres_Establecimiento'];
            } 
        $result->close();
   }
    ?>  
      <div class="product" data-name="p-1">
         <img src="data:image/png;base64,<?php echo  base64_encode($mostrar['Imagen_Producto']); ?>" alt="">
         <h3><?php echo $mostrar['Nombres_Producto'] ?></h3>
         <div class="price">Precio: <?php echo $mostrar['Precio_Producto'] ?> Bs.</div>
         <div class="price">Disponible hasta: <?php echo $mostrar['Tiempo_Disponible'] ?></div>
         <div class="price">Establecimiento: <?php echo $nombreEstab ?></div>
         <a href="detalles.php?id=<?php echo $mostrar['Id_Producto'] ?>" class="verDetalles">Detalles</a>
      </div>
      <?php
    }
    ?>
   </div>
</div>
<div class="contBoton">
   <a class="botons" href="logout.php">Cerrar sesion</a>
</div>
</body>
</html>