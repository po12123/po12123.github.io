if(y == 1){
    Swal.fire({
    title: 'Hubo un error',
    text: 'Ya existe una cuenta con ese correo',
    icon: 'error',
    confirmButtonText: 'Continuar',
    backdrop: true,
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: false,
    stopKetdownPropagation: false
}).then(function(){
    window.history.back();
});
    event.preventDefault_();
}