function getDetails(cotizacion) {
	var cotizacion = cotizacion;
	limpiarCampos();
	$.ajax({
		data  : { cotizacion : cotizacion },
		url   : 'Admin/getDetalles',
		type : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){

        		$('#Nombre').val(data.detalles[0]['Nombre']);
				$('#compania').val(data.detalles[0]['compania']);
        		$('#pais').val(data.detalles[0]['pais']);
        		$('#email').val(data.detalles[0]['email']);
        		$('#telefono').val(data.detalles[0]['telefono']);
				$('#noMayorista').html(data.option);
				$('#noMayorista').selectpicker('render');
        		$('#monto').val(data.detalles[0]['monto_final']);
        		$('#numFactura').val(data.detalles[0]['nu_factura']);
        		$('#fecha').val(data.detalles[0]['fecha']);
				$('#NombrePersona').val(data.detalles[0]['no_contacto_mayo']);
				$('#emailContacto').val(data.detalles[0]['email_contacto']);
        		$('#cotizacion').addClass('is-checked');
        		for (var i = 0; i < data.detalles.length; i++) {
        			if(data.detalles[i]['no_producto'] == "Windows Server Essentials Edition") {
						$('#cantidadWSEE').val(data.detalles[i]['cantidad']);
        			} else if(data.detalles[i]['no_producto'] == "Windows Server Standard Edition") {
						$('#cantidadWSSE').val(data.detalles[i]['cantidad']);
        			} else if(data.detalles[i]['no_producto'] == "Windows Server Datacenter Edition") {
						$('#cantidadWSDE').val(data.detalles[i]['cantidad']);
        			} else if (data.detalles[i]['no_producto'] == "CALs") {
        				$('#cantidadCAL').val(data.detalles[i]['cantidad']);
        			}
        		}
        		$('#archivoDocumento').val(data.detalles[0]['documento']);
        		$('#cotizacion').addClass('js-events-none');
        		$('#facturacion').addClass('js-events-none');
				$('.js-disabled').prop('disabled', true);
				$('.js-none').css('display','none');
				$('#aceptar').css('display', 'block');
				$('#registrar').css('display', 'none');
				$('#cancelar').css('display', 'none');
        		modal('modalDetalles');
        	} else { return; }
      } catch (err){
        msj('error',err.message);
      }
	});
}

function openModal(){
	limpiarCampos();
	$.ajax({
		data : { },
		url  : 'Admin/comboMayoristas',
		type : 'POST'
	}).done(function(data){
		data = JSON.parse(data);
		if(data.error == 0 ){
			$('#cotizacion').removeClass('js-events-none');
    		$('#facturacion').removeClass('js-events-none');
			$('.js-disabled').prop('disabled', false);
			$('.js-none').css('display', 'table-cell');
			$('#aceptar').css('display', 'none');
			$('#registrar').css('display', 'block');
			$('#cancelar').css('display', 'block');
			$('#noMayorista').html(data.option);
			$('#noMayorista').selectpicker('refresh');
			$('#pais').val(data.pais);
			componentHandler.upgradeAllRegistered();
			modal('modalDetalles');		
		} else { return; }
	});
}

function limpiarCampos() {
	$('#facturacion').removeClass('is-checked');
	$('#cotizacion').removeClass('is-checked');
	$('#Nombre').val('');
	$('#email').val('');
	$('#noMayorista').prop('disabled', false);
	$('#canal').val('');
	$('#pais').val('');
	$('#facturacion').val('');
	$('#cotizacion').val('');
	$('#numFactura').val('');
	$('#fecha').val('');
	$('#monto').val('');
	$('#cantidadWSEE').val('');
	$('#cantidadWSSE').val('');
	$('#cantidadWSDE').val('');
	$('#cantidadCAL').val('');
	$('#puntosWSEE').val('');
	$('#puntosWSSE').val('');
	$('#puntosWSDE').val('');
	$('#puntosCAL').val('');
}

function subirFactura(){
	$( "#archivo" ).trigger( "click" );
}

$("#archivo").change(function(e) {
	var files = e.target.files,
	    filesLength = files.length;
	for (var i = 0; i < filesLength ; i++) {
		var f = files[i]
		var archivo = (f.name).replace(" ","");
		nombre = archivo;
	}
	$('#archivoDocumento').val(nombre);
});

function openModalDocuemento (id) {
	var id = id;
	var ruta = '';
	$.ajax({
		data : { id : id},
		url  : 'Admin/muestraDocumento',
		type : 'POST'
	}).done(function(data){
		data = JSON.parse(data);
		if(data.error == 0 ){
			if(data.imagen != "") {
				$('#imgDocumento').attr("data", data.imagen);
			} else {
				$('#imgDocumento').text("IMAGEN NO ENCONTRADA");
			}
			modal('modalDocumento');
		} else { return; }
	});
}

function drawChartDonut() {
	var pais = null;
	var importe = null;
	$.ajax({
		data : {},
		url  : 'Admin/getDatosGraficosCanales',
		type : 'POST'
	}).done(function(data) {
		data = JSON.parse(data);
		if((data.datos).length > 2 ) {
			var arr = $.parseJSON(data.datos);
			arr.splice(0, 0, ["pais", "ventas"]);
			var data = google.visualization.arrayToDataTable( arr );

		    var options = {
				title: 'Sale by countries',
				pieHole: 0.6,
				pieSliceTextStyle: {
					color: 'black',
				},
				titleTextStyle : { 
					color: 'black',
					// fontName: <string>,
					fontSize: 18,
					bold: true,
				},
				colors: ['#2AD2C9', '#FF8D6D', '#614767', '#5F7A76','#56C5D0'], //, '#425563'. '#80746E', '#C6C9CA']
				legend : 'bottom'
		    };

		    var chart = new google.visualization.PieChart(document.getElementById('venta'));
		    chart.draw(data, options);
		}
	});
}

function drawChart() {
	$.ajax({
		data : { },
		url  : 'Admin/getDatosGraficoCotiza',
		type : 'POST'
	}).done(function(data) {
		data = JSON.parse(data);
		if((data.datos).length > 2 ) {
			var arr = $.parseJSON(data.datos);
			arr.splice(0, 0, ["pais", "puntaje"]);
			var data = google.visualization.arrayToDataTable( arr );

	        var options = {
	        	title: 'Given score',
				pieHole: 0.6,
				pieSliceTextStyle: {
					color: 'black',
				},
				titleTextStyle : { 
					color: 'black',
					// fontName: <string>,
					fontSize: 18,
					bold: true,
				},
				colors: ['#2AD2C9', '#FF8D6D', '#614767', '#5F7A76','#56C5D0'], //, '#425563'. '#80746E', '#C6C9CA']
				legend : 'bottom'
	        };

	        var chart = new google.visualization.PieChart(document.getElementById('puntaje'));
	        chart.draw(data, options);
		}
	});
}
