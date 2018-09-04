<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="Registro de Cotizaciones HPE">
    <meta name="keywords"               content="Registro de Cotizaciones HPE">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="June 1, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
    <title>Promo Storage Accelerate / Promo Flex Attach Servers</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.ico">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>"> 
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>metric.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet"    href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css">
    <style type="text/css">
        object {
              height: 400px;
              left: 0;
              top:0;
              width: 100%;
            }
    </style>
</head>
<body>
    <div class="js-header js-fixed">
        <div class="js-header--left">
            <img src="<?php echo RUTA_IMG?>logo/hpe-logo.svg">
        </div>
        <div class="js-header--right">
            <p>Promo Storage Accelerate / Promo Flex Attach Servers</p>
            <a onclick="cerrarSesion()">Cerrar Sesi&oacute;n</a>
        </div>
    </div>
    <section id="principal" class="js-section">
        <div class="js-container">
            <div class="js-user m-t-30">
                <div class="js-user--left">
                    <p>Bienvenido(a) <?php echo $nombre?> </p> 
                </div>
                <?php if($pais != ''){ ?>
                <div class="js-user--right">
                    <button type="button" name="boton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" onclick="openModal();" >Nueva Oportunidad</button>
                </div>
                <?php } ?>
            </div>
            <div class="formulario col-sm-12 col-xs-12 m-t-20">
				<div class="col-sm-4 col-xs-12"> 
                    <div id="venta" style="width: 350px; height: 250px;"></div>
                    <div id="puntaje" style="width: 350px; height: 250px;"></div>
				</div>
                <div class="col-sm-8 col-xs-12">
                    <div class="js-table"> 
                        <h2>Top 3 canales en importes facturados</h2>
                        <div class="table-responsive">
                            <table class="table" id="tableCanales">
                                <thead>
                                    <tr>
                                        <th>Nombre canal</th>
                                        <th>Nombre vendedor</th>
                                        <th>Pais</th>
                                        <th class="text-right">Importe</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyCanales">
                                    <?php echo $bodyCanales?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="js-table">
                    	<h2>&Uacute;ltimos 10 registros </h2>
                        <div class="table-responsive">
                            <table class="table" id="tableCotizacion">
                                <thead>
                                    <tr>
                                        <th>Registrado por</th>
                                        <th>Nombre vendedor</th>
                                        <th>Nombre canal</th>
                                        <th>Pais</th>
                                        <th>Tipo venta</th>
                                        <th>Fecha</th>
                                        <th class="text-center">Ver m&aacute;s</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyUltimaCotizacion">
                                    <?php echo $bodyCotizaciones?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mdl-card">
                        <div class="mdl-card__actions">
                            <h5>Reporte General de Registros</h5>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-excel" id="excel1">Descargar Excel</button>
                        </div>
                    </div>
                    <div id="reporte" class="js-table" style="display:none">
                        <h2>Oportunidades Registradas </h2>
                        <div class="table-responsive">
                            <table class="table" id="tbReporte">
                                <thead>
                                    <tr>
                                        <th>Registrado por</th>
                                        <th>Compa&ntilde;&iacute;a</th>
                                        <th>Nombre canal</th>
                                        <th>Nombre vendedor</th>
                                        <th>Email vendedor</th>
                                        <th>Pais</th>
                                        <th>Tipo Documento</th>
                                        <th>Fecha</th>
                                        <th>Documento</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyReporte">
                                    <?php echo $bodyReporte?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="reporte1"></div>
                </div>
            </div>
        </div>
    </section>
    <!--MODAL-->
    <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="mdl-card">
                    <div class="mdl-card__title">
                        <h2 class="js-title">¡Gana <span id="money"></span> d&oacute;lares en puntos Engage & Grow por &oacute;rdenes superiores a los 15k en la promoci&oacute;n de <span id="promocion"></span>!</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="col-sm-6 col-xs-12">
                            <div class="col-xs-12 js-input">
                                <label for="Nombre">Nombre</label>
                                <input type="text" id="Nombre" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="compania">Compa&ntilde;&iacute;a</label>
                                <input type="text" id="compania" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="pais">Pais</label>
                                <input type="text" id="pais" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="email">Email</label>
                                <input type="email" id="email" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="telefono">Tel&eacute;fono</label>
                                <input type="text" id="telefono" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input js-radio">
                                <label>¿Tienes una cuenta de Engage&Grow activa?</label>
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radioCotizacion">
                                    <input type="radio" id="radioCotizacion" class="mdl-radio__button" name="option1" value="1" onchange="validarCampos()">
                                    <span class="mdl-radio__label">Sí</span>
                                </label>
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radioFacturacion">
                                    <input type="radio" id="radioFacturacion" class="mdl-radio__button" name="option1" value="0" onchange="validarCampos()">
                                    <span class="mdl-radio__label">No</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="col-xs-12 js-input js-select">
                                <select name="noMayorista" id="noMayorista"> 
                                    <?php echo $option ?>
                                </select>
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="NombreContacto">Nombre de la persona que te atendi&oacute; dentro del mayorista</label>
                                <input type="text" id="NombrePersona" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="emailContacto">Email del contacto que te atendi&oacute; dentro del mayorista</label>
                                <input type="email" id="emailContacto" onchange="validarCampos()">
                            </div>

                            <div class="col-xs-12 js-input">
                                <label for="numFactura"># de la factura del mayorista con el que se factur&oacute;</label>
                                <input type="text" id="numFactura" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input js-date js-flex">
                                <input type="text" id="fecha" name="fecha" maxlength="10" placeholder="Fecha de Facturación" value="" style="pointer-events: none">
                                <div class="js-icon">
                                    <button type="button" class="mdl-button mdl-js-button mdl-button--icon">
                                        <i class="mdi mdi-date_range"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="monto">Monto total de la orden de compra en USD</label>
                                <input type="text" id="monto" placeholder="0.00" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input js-file js-flex">
                                <input type="text" id="archivoDocumento" placeholder="Suba su factura en imagen o pdf (2MB Max)" name="archivoDocumento" disabled>
                                <div class="js-icon">
                                    <button type="button" class="mdl-button mdl-js-button mdl-button--icon" onclick="subirFactura()">
                                        <i class="mdi mdi-backup"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="mdl-card__actions" id="aceptar">                         
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" data-dismiss="modal">Cerrar</button>
                    </div>
                    <div class="mdl-card__actions" id="registrar">                         
                        <button type="button" name="boton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button js-button--default" data-dismiss="modal">Cancelar</button>
                        <button type="button" name="boton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button"  onclick="registrar(); agregarDatos(); ">Registrar Oportunidad</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDocumento" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="mdl-card">
                    <div class="mdl-card__title">
                        <h2>Documento</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <object id="imgDocumento" data=""></object>
                    </div> 
                    <div class="mdl-card__actions">                         
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="frmArchivo" method="post" style="display: none;">
        <input id="archivo" type="file" name="archivo" />
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
    </form>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>google_chart/loader.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>champion.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>solicitud.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
        initButtonCalendarDaysMaxToday('fecha');
        initMaskInputs('fecha');
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChartDonut);
        google.charts.setOnLoadCallback(drawChart);
        var pais = <?php echo "'".$pais."'"?>;
        if (pais == '') {
            $('#excel1').click(function(){
                $('#tbReporte_wrapper').find('button').trigger("click");
                console.log('entra');
            });
            $(document).ready(function() {
                $('#tbReporte').DataTable( {
                    searching : false,
                    dom: 'Bfrtip',
                    paging: false,
                    order:[[5, 'desc'], [3,'desc'], [4, 'asc']],
                    language:{
                        "emptyTable":     "No se encontraron registros",
                        "info" : ''
                    },
                    lengthMenu: [
                        [ 10 ]
                    ],
                    buttons: [
                        {
                            extend:'excel',
                            text: 'Exportar a Excel',
                        }
                    ]
                });
            });
        }
    </script>
</body>