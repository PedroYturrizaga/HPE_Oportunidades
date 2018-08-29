$( window ).load(function(){
	setTimeout(function() {
		$('.mdl-layout__drawer-button i').empty();
		$('.mdl-layout__drawer-button i').removeClass('material-icons');
		$('.mdl-layout__drawer-button i').addClass('mdi mdi-menu');
	}, 250);
	$("#ModalTipoPromo").modal('show');
});

function registrar() {
	var Nombre 			= $('#Nombre').val();
	var compania 		= $('#compania').val();
	var pais 			= $('#pais').val();
	var email 			= $('#email').val();
	var telefono		= $('#telefono').val();
	var facturacion 	= $('#radioFacturacion').is(':checked');
	var cotizacion  	= $('#radioCotizacion').is(':checked');
	var noMayorista 	= $('#noMayorista').val();
	var NombrePersona 	= $('#NombrePersona').val();
	var emailContacto  	= $('#emailContacto').val();
	var numFactura  	= $('#numFactura').val();
	var fecha			= $('#fecha').val();
	var newdate     	= fecha.split("/").reverse().join("-");
	var monto			= $('#monto').val();
	monto 				= monto.replace(",", "");

	var cuentaActiva	= null;
	var puntos      	= money;

	factura = $('#archivo')[0].files[0];
	if(factura == undefined){
		toastr.remove()
		msj('error', 'Seleccione una factura');
		return;
	}
	if(factura['size'] > 2048000){
		return;
	}

	if(Nombre == null || Nombre == ''){
		$('#Nombre').css('border-color','red');
		toastr.remove()
		msj('error', 'Ingrese su nombre');
		return;
	}
	if(compania == null || compania == ''){
		toastr.remove()
		msj('error', 'Ingrese su compañia');
		$('#compania').css('border-color','red');
		return;
	}
	if(pais == null || pais == '') {
		toastr.remove()
		msj('error', 'Ingrese un pais');
		$('#pais').css('border-color','red');
		return;		
	}
	if(email == null || email == ''){
		toastr.remove()
		msj('error', 'Ingrese su email');
		$('#email').css('border-color','red');
		return;
	}
	if (!validateEmail(email)){
		toastr.remove()
		msj('error', 'El formato de email ingresado es incorrecto');
		$('#email').css('border-color','red');
		return;
	}else {
		$('#email').css('border-color','#C6C9CA');
	}
	if(telefono == null || telefono == ''){
		toastr.remove()
		msj('error', 'Ingrese su telefono');
		$('#telefono').css('border-color','red');
		return;
	}
	if(noMayorista == null || noMayorista == ''){
		toastr.remove()
		msj('error', 'seleccione el nombre del mayorista');
		$('#noMayorista').css('border-color','red');
		return;
	}
	if(NombrePersona == null || NombrePersona == ''){
		toastr.remove()
		msj('error', 'Ingrese el nombre de la persona te atendió dentro del mayorista');
		$('#NombrePersona').css('border-color','red');
		return;
	}
	if(emailContacto == null || emailContacto == ''){
		toastr.remove()
		msj('error', 'Ingrese el email de la persona te atendió dentro del mayorista');
		$('#emailContacto').css('border-color','red');
		return;
	}
	if (!validateEmail(emailContacto)){
		toastr.remove()
		msj('error', 'El formato del email ingresado es incorrecto');
		$('#emailContacto').css('border-color','red');
		return;
	}else {
		$('#emailContacto').css('border-color','#C6C9CA');
	}
	if(numFactura == null || numFactura == ''){
		toastr.remove()
		msj('error', 'Ingrese su número de Factura');
		$('#numFactura').css('border-color','red');
		return;
	}
	if(fecha == null || fecha == ''){
		toastr.remove()
		msj('error', 'Ingrese la fecha de facturaci&oacute;n');
		$('#fecha').css('border-color','red');
		return;
	}
	if(monto == null || monto == ''){
		toastr.remove()
		msj('error', 'Ingrese el monto');
		$('#cliente').css('border-color','red');
		return;
	}
	if(Nombre == '' && email == '' && noMayorista == '' && compania == '' && numFactura == '' && monto == '' && fecha == '' ){
		validarCampos();
	}
	if(facturacion == true){
		cuentaActiva = 0;
	}
	if(cotizacion == true){
		cuentaActiva = 1;
	}
	if(cuentaActiva == null){
		toastr.remove()
		msj('error', 'Seleccione si tiene una cuenta activa.');
		return;
	}
	$.ajax({
		data  : { Nombre 		: Nombre,
				  compania		: compania,
				  pais			: pais,
				  email 		: email,
				  telefono		: telefono,
				  cuentaActiva 	: cuentaActiva,
				  noMayorista	: noMayorista,
				  NombrePersona	: NombrePersona,
				  emailContacto	: emailContacto,
				  numFactura	: numFactura,
				  fecha			: newdate,
				  monto			: monto,
				  puntos 		: puntos },
		url   : 'solicitud/registrar',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		modal('ModalQuestion');
        		$('#bodyPuntaje').html(data.html);
        		$('#puntajeGeneral').html(data.puntosGeneral);
        		$('#bodyUltimaCotizacion').html(data.bodyCotizaciones);
        		$('#bodyCanales').html(data.bodyCanales);
        		setTimeout(1000,limpiarCampos());
        	} else { return; }
      } catch (err){
      	toastr.remove()
        msj('error',err.message);
      }
	});
}

function subirFactura(){
	$("#archivo").trigger("click");
}
$("#archivo").change(function(e) {
	var files = e.target.files;
    var archivo = files[0].name;
    archivo = archivo.replace(/\s/g,"_");
	$('#archivoDocumento').val(archivo);
});

function agregarDatos(){
	var datos = new FormData();
	factura = $('#archivo')[0].files[0];
	if(factura == undefined){
		toastr.remove()
		msj('error', 'Seleccione una factura');
		return;
	}
	if(factura['size'] > 2048000){
		toastr.remove()
		msj('error', 'La factura debe ser menor a 2MB');
		return;
	}
    datos.append('archivo',$('#archivo')[0].files[0]);
     $.ajax({
        type     	:"post",
        dataType 	:"json",
        url		    :"solicitud/cargarFact",
        contentType :false,
        data 		:datos,
        processData :false,
      }).done(function(respuesta){
      	if(respuesta.error == 0) {
      		modal('ModalQuestion');
      		setTimeout(function() {
				modal('modalDetalles');
				$('#bodyPuntaje').html(respuesta.html);
        		$('#puntajeGeneral').html(respuesta.puntosGeneral);
        		$('#bodyUltimaCotizacion').html(respuesta.bodyCotizaciones);
        		$('#bodyCanales').html(respuesta.bodyCanales);
			}, 250);
      	} else {
      		toastr.remove()
        	msj('error', respuesta.mensaje);
      	}
    });
}

function limpiarCampos(){
	$('#facturacion').removeClass('is-checked');
	$('#cotizacion').removeClass('is-checked');
	$('#Nombre').val(null);
	$('#compania').val(null);
	$('#pais').val(null);
	$('#email').val(null);
	$('#telefono').val(null);
	$('#noMayorista').val(null);
	$('#NombrePersona').val(null);
	$('#emailContacto').val(null);
	$('#numFactura').val(null);
	$('#monto').val(null);
	$('.selectpicker').selectpicker('refresh');
	$('#attach').val('0');
	$('.selectpicker').selectpicker('refresh');
	$('#fecha').val(null);

}

function verificaEstado() {
	var Nombre 			= $('#Nombre').val();
	var compania 		= $('#compania').val();
	var pais 			= $('#pais').val();
	var email 			= $('#email').val();
	var telefono		= $('#telefono').val();
	var facturacion 	= $('#radioFacturacion').is(':checked');
	var cotizacion  	= $('#radioCotizacion').is(':checked');
	var noMayorista 	= $('#noMayorista').val();
	var NombrePersona 	= $('#NombrePersona').val();
	var emailContacto  	= $('#emailContacto').val();
	var numFactura  	= $('#numFactura').val();
	var fecha			= $('#fecha').val();
	var monto			= $('#monto').val();
	var cuentaActiva	= null;
	if(facturacion == true){
		cuentaActiva = 0;
	}
	if(cotizacion == true){
		cuentaActiva = 1;
	}
	factura = $('#archivo')[0].files[0];
	if ( Nombre != '' && compania != '' && pais != '' && email != '' && telefono != '' && cuentaActiva != null 
		&& noMayorista != '' && NombrePersona != '' && emailContacto != '' && numFactura != '' && fecha != '' && monto != '') {
		$('#ingresar').removeAttr('disabled');
		console.log(1);
	} else {
		$('#ingresar').attr('disabled');
		console.log(2);
	}
}

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
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8){
        return true;
    }
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
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
function isEmpty(val){
	if(jQuery.trim(val).length != 0)
    	return false;
		return true;
}
function goToMenu(id){
	var idLink    = $('#'+id);
	var idSection = $('#section-'+id)
	$('.mdl-navigation__link').removeClass('active');
	$('.js-section--menu').addClass('animated fadeOut');
	idSection.removeClass('animated fadeOut');
	idSection.addClass('animated fadeIn');
	idLink.addClass('active');
}
function cerrarSesion(){
	$.ajax({
		url  : 'Login/cerrarCesion',
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
      	toastr.remove()
        msj('error',err.message);
      }
	});
}

function downloadCanvas(canvasId, filename) {
    // Obteniendo la etiqueta la cual se desea convertir en imagen
    var domElement = document.getElementById(canvasId);
    // Utilizando la función html2canvas para hacer la conversión
    html2canvas(domElement, {
        onrendered: function(domElementCanvas) {
            // Obteniendo el contexto del canvas ya generado
            var context = domElementCanvas.getContext('2d');
            // Creando enlace para descargar la imagen generada
            var link = document.createElement('a');
            link.href = domElementCanvas.toDataURL("image/png");
            link.download = filename;
            // Chequeando para browsers más viejos
            if (document.createEvent) {
                var event = document.createEvent('MouseEvents');
                // Simulando clic para descargar
                event.initMouseEvent("click", true, true, window, 0,
                    0, 0, 0, 0,
                    false, false, false, false,
                    0, null);
                link.dispatchEvent(event);
            } else {
                // Simulando clic para descargar
                link.click();
            }
        }
    });
}
// Haciendo la conversión y descarga de la imagen al presionar el botón
$('#ingresar').click(function() {
    downloadCanvas('section-cotizacion', 'registro_de_oportunidad.png');
});
var money = null;
function goToPromocion(id){
	$('#ModalTipoPromo').modal('hide');
	var promo = $('#'+id).attr('data-promo');
		money = $('#'+id).attr('data-money');
	$('#money').text(money);
	$('#promocion').text(promo);
	$('.js-promo').removeClass('active');
	$('#'+id+'.js-promo').addClass('active');
}