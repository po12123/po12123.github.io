
formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombre: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]{2,100}[ ]{0,10}[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]{1,12}$/, // Letras y espacios, pueden llevar acentos.
	descripcion: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]{2,100}[ ]{0,10}[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]{1,12}$/,// Letras y espacios, pueden llevar acentos.
    cantidad: /^[1-9][0-9]{0,8}$/, // 1 a 8 digitos.
	precio: /^[1-9][0-9]{0,8}$/ // 1 a 8 digitos.
}
//estado de cada campo false si es un campo no valido
const campos = {
	nombre: false,
	descripcion: false,
	cantidad: false,
	precio: false,
	tiempo: false,
	imagen: false,
}
//valida cada campo del formulario
const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
        case "descripcion":
            validarCampo(expresiones.descripcion, e.target, 'descripcion');
        break;
		case "cantidad":
            validarCampo(expresiones.cantidad, e.target, 'cantidad');
        break;
		case "precio":
            validarCampo(expresiones.precio, e.target, 'precio');
        break;
		case "tiempo":	
            validarTiempo(e.target);
        break;
		case "imagen":
			if(e.target.value.length>0){
				campos['imagen']=true;				
			}else{
				campos['imagen']=false;
			}
		break;
    }
}
//verifica si el correo no existe, solo se ejecuta cuando el correo es valido
const validarTiempo =(input)=>{
	var today = new Date();
	if(today.toLocaleTimeString()>input.value){
		document.getElementById(`grupo_tiempo`).classList.add('formulario_grupo-incorrecto');
		document.getElementById(`grupo_tiempo`).classList.remove('formulario_grupo-correcto');
		document.querySelector(`#grupo_tiempo i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo_tiempo i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo_tiempo .formulario_input-error`).classList.add('formulario_input-error-activo');
		campos['tiempo'] = false;
	} else{

		document.getElementById(`grupo_tiempo`).classList.remove('formulario_grupo-incorrecto');
		document.getElementById(`grupo_tiempo`).classList.add('formulario_grupo-correcto');
		document.querySelector(`#grupo_tiempo i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo_tiempo i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo_tiempo .formulario_input-error`).classList.remove('formulario_input-error-activo');
		campos['tiempo'] = true;
	}
};
//verifica si el campo es valido
const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo_${campo}`).classList.remove('formulario_grupo-incorrecto');
		document.getElementById(`grupo_${campo}`).classList.add('formulario_grupo-correcto');
		document.querySelector(`#grupo_${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo_${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo_${campo} .formulario_input-error`).classList.remove('formulario_input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo_${campo}`).classList.add('formulario_grupo-incorrecto');
		document.getElementById(`grupo_${campo}`).classList.remove('formulario_grupo-correcto');
		document.querySelector(`#grupo_${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo_${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo_${campo} .formulario_input-error`).classList.add('formulario_input-error-activo');
		campos[campo] = false;
	}
}
const subirBD_P=()=>{
	var nombre = $('#nombre').val();
	var descripcion = $('#descripcion').val();
	var cantidad = $('#cantidad').val();
	var precio = $('#precio').val();
	var tiempo = $('#tiempo').val();
	var imageninp =document.querySelector("#imagen");
	let formData = new FormData();
	formData.append("nom", nombre);
	formData.append("des", descripcion);
	formData.append("can", cantidad);
	formData.append("pre", precio);
	formData.append("tie", tiempo);
	formData.append("ima", imageninp.files[0]); // En la posición 0; es decir, el primer elemento
	fetch("subirBD_P.php", {
	method: 'POST',
	body: formData,
	});
	}
//ventana de exito cuando el formulario esta correctamente llenado y se pulsa el boton registrar
const confirmar = ()=>{
	Swal.fire({
	title: 'Felicitaciones',
	text: 'Se ha registrado exitosamente',
	icon: 'success',
	confirmButtonText: 'Continuar',
	backdrop: true,
	allowOutsideClick: false,
	allowEscapeKey: true,
	allowEnterKey: false,
	stopKetdownPropagation: false}).
	then(function(){
		//redirecciona a la pagina del login
		window.location = "catalogo.php";
	});
}
//cada vez que se haga click dentro o fuera de un campo del formulario se hara la validacion de los campos
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});
//se ejecuta cuando ocurre un evento, ene este caso pulsar el boton registrar

formulario.addEventListener('submit', (e) => {
	
	e.preventDefault();
	if(campos.nombre && campos.descripcion && campos.cantidad && campos.precio && campos.tiempo && campos.imagen){
		subirBD_P();
		confirmar();
	}else{
		alert("Completa los campos y no olvides subir una imagen");
	}
	//si no esta llenado correctamente el formulario no pasara nada 
});