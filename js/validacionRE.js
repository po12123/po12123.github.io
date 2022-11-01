
formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombre: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ]{2,100}[ ]{0,10}[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,12}$/, // Letras y espacios, pueden llevar acentos.
	apellido: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ]{2,100}[ ]{0,10}[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,12}$/,// Letras y espacios, pueden llevar acentos.
    telefono: /^\d{7,8}$/, // 7 a 8 digitos.
	correo: /^.+@(gmail|hotmail|outlook).(com|es)$/,//permite cualquier caracter y solo dominios como:gmail, hotmail y outlook 
	contraseña: /^(?=.*[a-zñÑ0-9])(?=.*[A-Z])(?=.*[!@#$&]).{8,12}$/, // 8 a 12 digitos.
	establecimiento: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]{1,100}[ ]{0,10}[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/, // permite alfanumericos y espacios.
	direccion: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]{1,100}[ ]{0,10}[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/ // permite alfanumerico y espacios.
}
//estado de cada campo false si es un campo no valido
const campos = {
	nombre: false,
	apellido: false,
	telefono: false,
	correo: false,
	contraseña: false,
	establecimiento: false,
	direccion: false,
	logo: false,
	documento: false
}
//valida cada campo del formulario
const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
        case "apellido":
            validarCampo(expresiones.apellido, e.target, 'apellido');
        break;
		case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
        break;
		case "correo":
            validarCampo(expresiones.correo, e.target, 'correo');
			if(campos["correo"]){
				verificarCorreo(e.target);
			}
        break;
		case "contraseña":
            validarCampo(expresiones.contraseña, e.target, 'contraseña');
			validarContraseña2();
        break;
		case "contraseña2":
			validarContraseña2();
		break;
		case "establecimiento":
			validarCampo(expresiones.establecimiento, e.target, 'establecimiento');
		break;
		case "direccion":
			validarCampo(expresiones.direccion, e.target, 'direccion');
		break;
		case "logo":
			if(e.target.value.length>0){
				campos['logo']=true;				
			}else{
				campos['logo']=false;
			}
		break;
		case "documento":
			if(e.target.value.length>0){
				campos['documento']=true;
			}else{
				campos['documento']=false;
			}
		break;
    }
}
//verifica si el correo no existe, solo se ejecuta cuando el correo es valido
const verificarCorreo =(input)=>{
	var correoInp=input.value;

	$.post('verificarCorreo.php',{cor:correoInp},function(res){
		
		if(res==1){
			document.getElementById(`grupo_correo`).classList.add('formulario_grupo-incorrecto');
			document.getElementById(`grupo_correo`).classList.remove('formulario_grupo-correcto');
			document.querySelector(`#grupo_correo i`).classList.add('fa-times-circle');
			document.querySelector(`#grupo_correo i`).classList.remove('fa-check-circle');
			document.querySelector(`#grupo_correo .formulario_input-error2`).classList.add('formulario_input-error-activo2');
			campos['correo'] = false;
		} else{

			document.getElementById(`grupo_correo`).classList.remove('formulario_grupo-incorrecto');
			document.getElementById(`grupo_correo`).classList.add('formulario_grupo-correcto');
			document.querySelector(`#grupo_correo i`).classList.remove('fa-times-circle');
			document.querySelector(`#grupo_correo i`).classList.add('fa-check-circle');
			document.querySelector(`#grupo_correo .formulario_input-error2`).classList.remove('formulario_input-error-activo2');
			campos['correo'] = true;
		}
	});
}
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
//verifica si las 2 contraseñas son iguales
const validarContraseña2 = () => {
	const inputContraseña1 = document.getElementById('contraseña');
	const inputcontraseña2 = document.getElementById('contraseña2');
	if(inputContraseña1.value !== inputcontraseña2.value || (inputContraseña1.value=="" || inputcontraseña2.value=="") ){
		document.getElementById(`grupo_contraseña2`).classList.add('formulario_grupo-incorrecto');
		document.getElementById(`grupo_contraseña2`).classList.remove('formulario_grupo-correcto');
		document.querySelector(`#grupo_contraseña2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo_contraseña2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo_contraseña2 .formulario_input-error`).classList.add('formulario_input-error-activo');
		campos['contraseña'] = false;
		
	} else {
		document.getElementById(`grupo_contraseña2`).classList.remove('formulario_grupo-incorrecto');
		document.getElementById(`grupo_contraseña2`).classList.add('formulario_grupo-correcto');
		document.querySelector(`#grupo_contraseña2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo_contraseña2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo_contraseña2 .formulario_input-error`).classList.remove('formulario_input-error-activo');
		campos['contraseña'] = true;
	}
	
}
const subirBD_E2=()=>{
	var nombre = $('#nombre').val();
	var apellido = $('#apellido').val();
	var telefono = $('#telefono').val();
	var correo = $('#correo').val();
	var contraseña = $('#contraseña').val();
	var establecimiento = $('#establecimiento').val();
	var direccion = $('#direccion').val();
	var logoinp =document.querySelector("#logo");
	let formData = new FormData();
	formData.append("nom", nombre);
	formData.append("ape", apellido);
	formData.append("tel", telefono);
	formData.append("cor", correo);
	formData.append("con", contraseña);
	formData.append("est", establecimiento);
	formData.append("dir", direccion);
	formData.append("log", logoinp.files[0]); // En la posición 0; es decir, el primer elemento
	fetch("subirBD_E2.php", {
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
		window.location = "loginInterface.php";
	});
}
//cada vez que se haga click dentro o fuera de un campo del formulario se hara la validacion de los campos
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
	//input.addEventListener('submit', validarFormulario);
});
//se ejecuta cuando ocurre un evento, ene este caso pulsar el boton registrar

formulario.addEventListener('submit', (e) => {
	
	e.preventDefault();
	if(campos.nombre && campos.apellido && campos.telefono && campos.correo && campos.contraseña && campos.establecimiento && campos.direccion && campos.logo && campos.documento){
		subirBD_E2();
		confirmar();
	}else{
		alert("Completa los campos y no olvides subir un logo y un documento");
	}
	//si no esta llenado correctamente el formulario no pasara nada 
});