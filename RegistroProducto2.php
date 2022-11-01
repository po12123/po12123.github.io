
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Merienda+One" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="stylesheet" href="css/style-registrarProducto3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
  <title>Registro de producto</title>
</head>
<body>
  <section class="form-register">
    <div>
      <!-- class="form-control" -->
      <form  class="formulario" id="formulario" enctype="multipart/form-data" name="f1">
          <div class="form-group">
              <center><h4>REGISTRO DE PRODUCTO</h4></center>
          </div>
          <!-- Grupo: nombre del producto-->
          <div class="formulario_grupo" id="grupo_nombre">
            <label for="nombre" class="formulario_label">Nombre del producto:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="nombre" id="nombre" placeholder="Ingrese el nombre del producto">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">El nombre debe tener al menos 3 caracteres.</p>
          </div> 
          <!-- Grupo: descripcion del producto -->
          <div class="formulario_grupo" id="grupo_descripcion">
            <label for="descripcion" class="formulario_label">Descripcion del producto:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion del producto">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">La descripcion del producto debe tener al menos 3 caracteres.</p>
          </div> 
          <!-- Grupo: tiempo disponible -->
          <div class="formulario_grupo" id="grupo_tiempo">
            <label for="tiempo" class="formulario_label">Disponible hasta:</label>
            <div class="formulario_grupo-input">
              <input type="time" class="formulario_input" name="tiempo" id="tiempo" placeholder="Ingrese una hora">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">Se debe saber hasta que hora estara disponible el producto y debe ser mayor a la hora actual.</p>
          </div> 
          <!-- Grupo: cantidad -->
          <div class="formulario_grupo" id="grupo_cantidad">
            <label for="cantidad" class="formulario_label">Cantidad disponible:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad del producto">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">La cantidad solo puede contener numero y debe ser mayor a 0.</p>
          </div> 
          <!-- Grupo: precio -->
          <div class="formulario_grupo" id="grupo_precio">
            <label for="precio" class="formulario_label">Precio del producto:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="precio" id="precio" placeholder="Ingrese el precio del producto">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">El precio solo puede contener numeros y debe ser mayor a 0.</p>
          </div> 
            <div>
          <!-- Grupo: imagen -->
          <div class="formulario_grupo" id="grupo_imagen">
            <label for="imagen" class="formulario_label">Imagen del producto:</label>
            <div class="formulario_grupo-input">
            <input accept="image/png, image/jpeg" type="file" class="formulario_input_file" name="imagen" id="imagen">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">Es obligatorio subir una imagen del producto.</p>
          </div> 
          <!-- Grupo: boton-->  
          <div class="formulario_grupo formulario_grupo-btn-enviar">
            <button type="submit" class="formulario_btn">Registrar</button>
          </div>
          <!-- Grupo: mensaje error-->  
          <div class="formulario_mensaje" id="formulario_mensaje">
				    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			    </div>
      </form>
      
      <div id="imagenes">
      <img src="images/reloj.png" id="reloj" >
      <img src="images/lechuga.png" id="lechuga" >
      <img src="images/zanahoria.png" id="zanahoria" >
      <img src="images/hamburguesa.png" id="hamburguesa">
      </div>
    </div>
    
  </section> 
  <script src="js/validacionRP2.js"></script>
</body>
</html>