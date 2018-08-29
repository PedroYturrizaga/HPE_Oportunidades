function ingresar(){
	var usuario  = $('#usuario').val();
	var password = $('#password').val();
    if($('#remember').is(':checked') == true){
        sessionStorage.setItem('CHECK', '1');
        sessionStorage.setItem('USERNAME', usuario);
        sessionStorage.setItem('PASS', password);
    }else{
        sessionStorage.setItem('CHECK', '0');
    }
    if(usuario == null || usuario == ''){
        toastr.remove();
        msj('error', 'Ingrese su usuario');
        return;
    }
	if(password == null || password == ''){
        toastr.remove();
        msj('error', 'Ingrese su contraseña');
		return;
	}
    if (!validateEmail(usuario)){
        toastr.remove();
        msj('error', 'El formato de usuario ingresado es incorrecto');
        return;
    }
	$.ajax({
		data : {usuario  : usuario,
				password : password},
		url  : 'Login/ingresar',
		type : 'POST'
	}).done(function(data){
		try{
            data = JSON.parse(data);
            if(data.error == 0){
            	$('#usuario').val("");
            	$('#password').val("");
                if(data.rol == 1) {
                    location.href = 'Solicitud';
                } else if(data.rol == 0) {
                    location.href = 'Champion';
                }
            }else {
                if(data.pass == null || data.pass == '') {
                    toastr.remove();
                    msj('error', data.msj);
                }else {
                    toastr.clear();
                    msj('error', data.pass);
                }
            	return;
            }
        }catch(err){
            toastr.remove();
            msj('error',err.message);
        }
	});
}
$("#showpass").click(function(){
	$(this).find('i').toggleClass("mdi-remove_red_eye mdi-visibility_off");
    var input = $(this).parent().find('.mdl-textfield__input');
    if (input.attr("type") == "password"){
        input.attr("type", "text");
    }else{
        input.attr("type", "password");
    }
});
function soloLetras(e){
    key 	   = e.keyCode || e.which;
    tecla 	   = String.fromCharCode(key).toLowerCase();
    letras     = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
 }

 function validarCampos(){
    var $inputs = $('form :input');
    var formvalido = true;
    $inputs.each(function() {
        if(isEmpty($(this).val())){
            $(this).css('border-color','red');
            $('.btn-default').css('border-color','#C6C9CA');
            $('#fecha').css('border-color','#C6C9CA');
            formvalido = false;
        }else{
            $(this).css('border-color','#C6C9CA');
            $('#fecha').css('border-color','#C6C9CA');
        }
    });
    return formvalido;
}

 function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8){
        return true;
    }
    patron      =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function verificarDatos(e){
	if(e.keyCode === 13){
		e.preventDefault();
		ingresar();
    }
}
function cerrarCesion(){
    $.ajax({
        url  : 'login/cerrarCesion',
        type : 'POST'
    }).done(function(data){
        try{
            data = JSON.parse(data);
            if(data.error == 0){
                location.href = 'Login';
            }else {
                return;
            }
        }catch(err){
            toastr.remove();
            msj('error',err.message);
        }
    });
}

function openModalRecuperar() {
    var user = $('#usuarioRecupera').val('');
    modal('recuperaContrasena');
}

function openModalCambiar() {
    modal('cambioContrasena');
}

function openModalCrear() {
    var nombres   = $('#nombres').val('');
    var compania  = $('#compania').val('');
    var pais      = $('#pais').val('');
    var region    = $('#region').val(0);
    var email     = $('#email').val('');
    var pass      = $('#pass').val('');
    var passRep   = $('#passRep').val('');
    modal('registroUsuario');
}

function recuperar() {
    var user = $('#usuarioRecupera').val();
    if (!validateEmail(user)){
        toastr.remove();
        msj('error', 'El formato de usuario ingresado es incorrecto');
        return;
    }
    $.ajax({
        data : { user : user },
        url  : 'Login/sendGmail',
        type : 'POST'
    })
    .done(function(data) {
        data = JSON.parse(data);
        console.log(data);
        try {
            if(data.error == 0) {
                abrirCerrarModal('recuperaContrasena');
                toastr.remove();
                msj('success',data.msj);
            } else { 
                toastr.remove();
                msj('error',data.msj);
                return; 
            }
        } catch (err){
            toastr.remove();
            msj('error', err.message);
        }
    });
}
function cambiarIdioma(){
    var idioma = $('#idioma').val();
    if(idioma == 'Español'){
        location.href = 'http://www.marketinghpe.com/promostorageq4/rla/es/';
    }else if(idioma == 'Inglés'){
        location.href = 'http://www.marketinghpe.com/promostorageq4/rla/en/';
    }
}

function registrar() {
    var nombres   = $('#nombres').val();
    var compania  = $('#compania').val();
    var pais      = $('#pais').val();
    var region    = $('#region').val();
    var email     = $('#email').val();
    var pass      = $('#pass').val();
    var passRep   = $('#passRep').val();
    if(nombres == '' || nombres == null) {
        toastr.remove();
        msj('error', 'Ingrese su nombre');
        $('#nombres').css('border-color','red');
        return;
    }
    if(compania == '' || compania == null) {
        toastr.remove();
        msj('error', 'Ingrese sus compañía');
        $('#compania').css('border-color','red');
        return;
    }
    if(pais == '' || pais == null) {
        toastr.remove();
        msj('error', 'Ingrese su pais');
        $('#pais').css('border-color','red');
        return;
    }
    if(region == '' || region == null) {
        toastr.remove();
        msj('error', 'Seleccione una región');
        $('#region').css('border-color','red');
        return;
    }
    if(email == '' || email == null) {
        toastr.remove();
        msj('error', 'Ingrese su email');
        $('#email').css('border-color','red');
        return;
    }
    if(pass == '' || pass == null) {
        toastr.remove();
        msj('error', 'Ingrese su contraseña');
        $('#pass').css('border-color','red');
        return;
    }
    if(passRep == '' || passRep == null) {
        toastr.remove();
        msj('error', 'Ingrese la confimacion de contraseña');
        $('#passRep').css('border-color','red');
        return;
    }
    if(pass != passRep) {
        toastr.remove();
        msj('error', 'Las contraseñas no coinciden');
        return;
    }
    $.ajax({
        data : { nombres  : nombres,   
                 compania : compania,  
                 pais     : pais,
                 region   : region,      
                 email    : email,     
                 pass     : pass,      
                 passRep  : passRep },
        url  : 'login/registrarUsuario',
        type : 'POST'
    })
    .done(function(data) {
        data = JSON.parse(data);
        console.log(data);
        try {
            if(data.error == 0) {
                abrirCerrarModal('registroUsuario');
                toastr.remove();
                msj('success',data.msj);
            } else { 
                toastr.remove();
                msj('error',data.msj);
                return; 
            }
        } catch (err){
            toastr.remove();
            msj('error', err.message);
        }
    });
}

// POR CONFIRMAR SI SE USARÁ

// function cambiar() {
//     $.ajax({
//         data : {},
//         url  : '',
//         type : 'POST'
//     })
//     .done(function(data) {
//         data = JSON.parse(data);
//         try {
//             if(data.error == 0) {
//                 abrirCerrarModal('recuperaContrasena');
//             }
//         } catch (err){
//             toastr.remove();
//             msj('error', err.message);
//         }
//     });
// }
