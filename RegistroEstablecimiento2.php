
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
  <link rel="stylesheet" href="css/style-registroEstablecimiento3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
  <title>Registro de establecimiento</title>
</head>
<body>
  <section class="form-register">
    <div>
      <!-- class="form-control" -->
      <form  class="formulario" id="formulario" enctype="multipart/form-data" name="f1">
          <div class="form-group">
              <center><h4>REGISTRO DE ESTABLECIMIENTO</h4></center>
          </div>
          <!-- Grupo: nombre del establecimiento-->
          <div class="formulario_grupo" id="grupo_establecimiento">
            <label for="establecimiento" class="formulario_label">Nombre del establecimiento:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="establecimiento" id="establecimiento" placeholder="Ingrese el nombre del establecimiento">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">El nombre del establecimeinto debe tener al menos 3 caracteres y solo puede contener letras y espacio.</p>
          </div> 
          <!-- Grupo: direccion del establecimiento -->
          <div class="formulario_grupo" id="grupo_direccion">
            <label for="direccion" class="formulario_label">Direccion del establecimiento:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="direccion" id="direccion" placeholder="Ingrese la direccion del establecimiento">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">La direccion del establecimeinto debe tener al menos 3 caracteres y solo puede contener letras y espacio.</p>
          </div> 
          <!-- Grupo: nombre -->
          <div class="formulario_grupo" id="grupo_nombre">
            <label for="nombre" class="formulario_label">Nombre del encargado:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="nombre" id="nombre" placeholder="Ingrese el nombre">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">El nombre debe tener al menos 3 caracteres y solo puede contener letras y espacio.</p>
          </div> 
          <!-- Grupo: apellido -->
          <div class="formulario_grupo" id="grupo_apellido">
            <label for="apellido" class="formulario_label">Apellidos del encargado:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="apellido" id="apellido" placeholder="Ingrese los apellidos">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">El apellido debe tener al menos 3 caracteres y solo puede contener letras y espacio.</p>
          </div> 
          <!-- Grupo: telefono -->
          <div class="formulario_grupo" id="grupo_telefono">
            <label for="telefono" class="formulario_label">Telefono o celular:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="telefono" id="telefono" placeholder="Ingrese el numero de telefono o celular">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">El telefono o celular solo puede contener numeros y el maximo son 8 dígitos.</p>
          </div> 
            <div>
          <!-- Grupo: correo electroinico -->
          <div class="formulario_grupo" id="grupo_correo">
            <label for="correo" class="formulario_label">Correo electronico:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="correo" id="correo" placeholder="Ingrese su correo electronico">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error" id="p1">El correo solo puede contener letras, numeros, puntos, guiones, guion bajo y solo se permite los dominios (gmail, hotmail y outlook).</p>
            <p class="formulario_input-error2" id="p2">El correo ingresado ya esta registrado, ingrese un correo diferente.</p>
          
          </div> 
          <!-- Grupo: contraseña -->
          <div class="formulario_grupo" id="grupo_contraseña">
            <label for="contraseña" class="formulario_label">Contraseña:</label>
            <div class="formulario_grupo-input">
              <input type="password" class="formulario_input" name="contraseña" id="contraseña" placeholder="Ingrese una contraseña">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">La contraseña debe tener al menos una mayuscula, caracter especial (!@#$&_) y minimo 8 letras/numeros.</p>
          </div> 
          <!-- Grupo: confirmar contraseña -->
          <div class="formulario_grupo" id="grupo_contraseña2">
            <label for="contraseña2" class="formulario_label">Confirmar contraseña:</label>
            <div class="formulario_grupo-input">
              <input type="password" class="formulario_input" name="contraseña2" id="contraseña2" placeholder="Repite la contraseña">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">Ambas contraseñas deben ser iguales.</p>
          </div> 
          <!-- Grupo: logo -->
          <div class="formulario_grupo" id="grupo_logo">
            <label for="logo" class="formulario_label">Logo del establecimeinto:</label>
            <div class="formulario_grupo-input">
            <input accept="image/png, image/jpeg" type="file" class="formulario_input_file" name="logo" id="logo">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">Es obligatorio subir un logo del establecimeinto.</p>
          </div> 
          <!-- Grupo: documento -->
          <div class="formulario_grupo" id="grupo_documento">
            <label for="documento" class="formulario_label">Documento:</label>
            <div class="formulario_grupo-input">
            <input accept="application/pdf" type="file" class="formulario_input_file" name="documento" id="documento">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">Es obligatorio subir un documento del establecimeinto.</p>
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
  <script src="js/validacionRE.js"></script>
</body>
</html>