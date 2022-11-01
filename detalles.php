<?php include('includes/conecta.php');
session_start();
$id=$_GET['id'];
if($id==""){
   echo "error";
}else{
   echo $id;
}
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
   <link rel="stylesheet" href="css/style-detalles.css">
    
   <!-- custom js file link  -->
   <script src="js/agregarProducto2.js" defer ></script>


</head>
<body>
   
<div class="container">

   <h3 class="title"> organic products </h3>

   <div class="products-container">
   <?php
      $sql= "SELECT * FROM producto WHERE Id_Producto=$id LIMIT 1";
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
      <div class="product" data-name=<?php echo $mostrar['Id_Producto'] ?>>
         <img src="data:image/png;base64,<?php echo  base64_encode($mostrar['Imagen_Producto']); ?>" alt="">
         <h3>id: <?php echo $mostrar['Id_Producto'] ?></h3>
         <div class="price">Precio: <?php echo $mostrar['Precio_Producto'] ?> Bs.</div>
         <div class="price">Establecimiento: <?php echo $nombreEstab ?></div>
         <div class="price">Disponible hasta: <?php echo $mostrar['Tiempo_Disponible'] ?></div>
         <div class="price">Cantidad disponible: <?php echo $mostrar['Cantidad_Producto'] ?></div>
         <a onclick="agregar(<?php echo $id?>,<?php echo $mostrar['Precio_Producto']?>)" class="verDetalles">Agregar al carrito</a>
      </div>
      <?php
      }
      ?>
   </div>
</div>

</body>
</html>