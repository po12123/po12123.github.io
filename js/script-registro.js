import {app,db,ref,set,get,child,onChildAdded} from "../js/connection-firebase.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https:www.gstatic.com/firebasejs/9.1.2/firebase-auth.js"


const auth = getAuth(app);
   
var inputs = document.querySelectorAll('.seccion-input input');

const expresiones = {
    nombre: /^\s*[a-zA-Z\s]{3,40}\s*$/,
    apellido: /^\s*[a-zA-Z\s]{3,40}\s*$/,
    correo: /^\s*[^\(\)\<\>\@\,\;\:\"\[\]\ç\%\&\s]+@[a-zA-Z0-9\-\_]+\.[a-zA-Z0-9\-\_\.]+\s*$/,
    correo1:/^.*[^\.]\s*$/, /* verifica que no exita un punto al final*/
    correo2:/.*@+.*\.\./,/*verifica que no exista dos puntos juntos despues del @ */
    contrasena: /^.{8,25}$/,
    confirmarcontraseña: /^.{8,25}$/
}


agregarEventoBotonRegistrar();
agregarEventsInputs();
inciarBotonOjo();

function insertarDatos(usuario, id) {
    
    set(ref(db, "Usuarios/" + id), usuario)
        .then(() => {
            //alert("Datos registrados correctamente");
            window.location.href = "../../pages/nivel.html";
        })
        .catch((error) => {
            alert("unsucessfull, error" + error);
        });
}

async function crearCuentaFirebase(usuario, contrasena,confirmarcontraseña) {
    await createUserWithEmailAndPassword(auth, usuario.correo, contrasena,confirmarcontraseña).then((userCredential) => {
        insertarDatos(usuario, userCredential._tokenResponse.localId);
        console.log("cuenta creada correctamente");
      })
      .catch((error) => {
        console.log("no se pudo crear la cuenta");
        motrarMensajeErrorInput('m-correo','Este correo ya esta registrado');
        
      });
}

async function agregarEventoBotonRegistrar(){
      var boton = document.querySelector('#formulario');
   
      boton.addEventListener('submit',(e) =>{
        var hayError = 0;
          e.preventDefault();
          inputs.forEach(element =>{
            hayError += comprobarCampos(element);
          });

          if(hayError == 0){
            var nombreR = document.querySelector(".input-nombre");
            var nombreR = document.querySelector(".input-apellido");
            var correoR = document.querySelector(".input-correo");
            var contrasenaR = document.querySelector(".input-contrasena");
            var confirmarcontraseñaR = document.querySelector(".input-confirmarcontraseña");
            var usuario= {
                nombre: nombreR.value,
                correo: correoR.value,
                nivelActual: 1
            };
            crearCuentaFirebase(usuario,contrasenaR.value,confirmarcontraseñaR.value);
          }
          console.log('registro enviado')
          console.log(hayError);

      });
}

 
function inciarBotonOjo(){
    var boton = document.querySelector(".boton-ojo");
    boton.addEventListener("click", ()=>{
     
        var inputContrasena = document.querySelector(".input-contrasena");
        if(inputContrasena.type == "password"){
            inputContrasena.type = "text";
            boton.classList.add("mostrar-contrasena");
            boton.classList.remove("ocultar-contrasena");
            


          }else{
            inputContrasena.type = "password";
            boton.classList.remove("mostrar-contrasena");
            boton.classList.add("ocultar-contrasena");

         }
    
     
        var inputconfirmarcontraseña = document.querySelector(".input-confirmarcontraseña");
        if(inputconfirmarcontraseña.type == "password"){
            inputconfirmarcontraseña.type = "text";
            boton.classList.add("mostrar-confirmarcontraseña");
            boton.classList.remove("ocultar-confirmarcontraseña");
            


          }else{
            inputconfirmarcontraseña.type = "password";
            boton.classList.remove("mostrar-confirmarcontraseña");
            boton.classList.add("ocultar-confirmarcontraseña");

         }
    
        

    });
}

function agregarEventsInputs(){
    inputs.forEach(element => {

        element.addEventListener('keyup',(e)=>{
            comprobarCampos(e.target);
        } );
        
        element.addEventListener('blur',(e)=>{
            comprobarCampos(e.target);
        } );
    });

}

function motrarMensajeErrorInput(nombreInput,mensaje){
    var aux= document.querySelector('.'+nombreInput);
    aux.textContent = mensaje;

}

function borrarMensajeErrorInput(nombreInput){
    var aux= document.querySelector('.'+nombreInput);
    aux.textContent = '';

}


function comprobarCampos(e){
    switch(e.classList[0]){
        case "input-nombre":
          if(expresiones.nombre.test(e.value.trim())){
              borrarMensajeErrorInput('m-nombre');
              return 0;
          }else{
               motrarMensajeErrorInput('m-nombre','El nombre debe tener de 3 a 40 caracteres sin contener números o símbolos.');
               return 1;
          }
        break;
        case "input-correo":
            var errores = 0;
            if(!expresiones.correo.test(e.value.trim())){
                errores += 1;
            }
            if(!expresiones.correo1.test(e.value.trim())){
                errores += 1;
            }
            if(expresiones.correo2.test(e.value.trim())){
                errores += 1;
            }
            if(errores == 0){
                borrarMensajeErrorInput('m-correo');
                return 0;
            }else{
                motrarMensajeErrorInput('m-correo','El correo debe seguir el formato user@dominio');
                return 1;
            }
        break;
        case "input-contrasena":
            if(expresiones.contrasena.test(e.value)){
                borrarMensajeErrorInput('m-contrasena');
                return 0;
            }else{
                motrarMensajeErrorInput('m-contrasena','La contraseña tiene que estar entre 8 y 25 caracteres');
                return 1;
            }
        break;
        case "input-confirmar contraseña":
            if(expresiones.confirmarcontraseña.test(e.value)){
                borrarMensajeErrorInput('m-confirmar contraseña');
                return 0;
            }else{
                motrarMensajeErrorInput('m-confirmar contraseña','La contraseña tiene que estar entre 8 y 25 caracteres');
                return 1;
            }
        break;
      
    } 
    } 

