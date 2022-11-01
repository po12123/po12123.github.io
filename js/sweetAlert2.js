if(x == 1){
    Swal.fire({
    title: 'Felicitaciones',
    text: 'Se ha logeado exitosamente como Cliente',
    icon: 'success',
    confirmButtonText: 'Continuar',
    backdrop: true,
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: false,
    stopKetdownPropagation: false
}).then(function(){
    window.location = "catalogo.php";
});
    event.preventDefault_();
}else{
    if(x == 2){
        Swal.fire({
        title: 'Felicitaciones',
        text: 'Se ha logeado exitosamente como Establecimiento',
        icon: 'success',
        confirmButtonText: 'Continuar',
        backdrop: true,
        allowOutsideClick: false,
        allowEscapeKey: true,
        allowEnterKey: false,
        stopKetdownPropagation: false
    }).then(function(){
        window.location = "catalogoAdmin.php";
    });
        event.preventDefault_();
    }else{
        Swal.fire({
            title: 'Ocurrio un error',
            text: 'Los datos no coinciden con ninguna cuenta creada',
            icon: 'error',
            confirmButtonText: 'Continuar',
            backdrop: true,
            allowOutsideClick: false,
            allowEscapeKey: true,
            allowEnterKey: false,
            stopKetdownPropagation: false
        });
    }
}
