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
    <title>Registro de Cotizaciones HPE</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.ico">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>metric.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>animate.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
</head>
<body>
    <div class="js-header js-relative">
        <div class="js-header--left">
            <img class="js-partner" src="<?php echo RUTA_IMG?>logo/hpe-logo.svg">
        </div>
        <div class="js-header--right">
            <p>Registro de Oportunidades</p>
            <a onclick="cerrarSesion()">Cerrar Sesi&oacute;n</a>
        </div>
    </div>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">¿Qu&eacute; deseas hacer&#63;</span>
            <nav class="mdl-navigation">
                <a id="cotizacion" class="mdl-navigation__link active" onclick="goToMenu(this.id)">Ingresar una nueva cotizaci&oacute;n</a>
                <a id="puntaje" class="mdl-navigation__link" onclick="goToMenu(this.id)">Ver puntaje acumulado</a>
                <a id="terminos" class="mdl-navigation__link" onclick="goToMenu(this.id)">T&eacute;rminos y Condiciones</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <section class="js-section p-t-20">
                <div class="js-container">
                    <div class="js-user p-0">
                        <div class="js-user--left">
                            <p>Bienvenido(a) <?php echo $nombre?> </p> 
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-cotizacion" class="js-section js-section--menu">
                <div class="js-container">
                    <h2 class="js-title">¡Gana 100 d&oacute;lares en puntos Engage & Grow por &oacute;rdenes superiores a los 15k en la promoci&oacute;n de Storage Accelerate!</h2>
                    <div class="col-xs-12 p-0">
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
                        <div class="col-xs-12">
                            <button id="ingresar" type="button" name="boton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" onclick="agregarDatos(); registrar();">Registrar Oportunidad</button>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-puntaje" class="js-section js-section--menu js-opacity-done">
                <div class="js-container">
                    <h2 class="js-title">&Uacute;ltimos 4 ingresos</h2>
                    <div class="js-puntaje js-flex">
                        <div class="js-puntaje__table table-responsive">
                            <table id="tbUltimosIngresos" class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th> 
                                        <th></th>
                                        <th class="text-center" colspan="2"> <strong>Puntaje</strong> </th> 
                                        <th></th>  
                                    </tr>
                                    <tr>
                                        <th>Pais</th>
                                        <th>Documento</th>
                                        <th>Fecha</th>
                                        <th class="text-center">Cotizado</th>
                                        <th class="text-center">Facturado</th>
                                        <th>Total</th>
                                    </tr>
                                </thead >
                                <tbody id="bodyPuntaje"><?php echo $html ?></tbody>
                            </table>
                        </div>
                        <div class="js-puntaje__puntos">
                            <p class="title-formulario">Puntos Engage & Grow acumulados</p>
                            <span id="puntajeGeneral"><?php echo $puntosGeneral ?> pts</span>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-terminos" class="js-section js-section--menu js-opacity-done">
                <div class="js-container">
                    <h2 class="js-title">T&eacute;rminos y condiciones</h2>
                    <div class="js-terminos">
                        <h3>Storage:</h3>
                        <ol>
                            <li>100 d&oacute;lares en puntos Engage & Grow por &oacute;rdenes superiores a los 20k en productos de esta promoci&oacute;n de Storage.</li>
                            <li>No aplica para proyectos vendidos con Deal/OPG de precios especiales.</li>
                            <li>Promoci&oacute;n v&aacute;lida para facturaciones desde el 1 de Septiembre, 2018 hasta el 31 de Octubre, 2018.</li>
                            <li>&Uacute;nicamente v&aacute;lido por compras realizadas a trav&eacute;s de mayoristas autorizados.</li>
                            <li>Los puntos ser&aacute;n acreditados en la cuenta de Engage & Grow m&aacute;ximo el 15 de Noviembre, 2018</li>
                            <li>HPE se reserva el derecho de modificar estos T&eacute;rminos y Condiciones, cambiar, reestructurar o descontinuar este incentivo en cualquier  momento sin previo aviso a los participantes.</li>
                        </ol>
                        <h3>Servers:</h3>
                        <ol>
                            <li>50 d&oacute;lares en puntos Engage & Grow por &oacute;rdenes superiores a 15k en la Promo flex Attach de Servidores.</li>
                            <li>No aplica para proyectos vendidos con Deal/OPG de precios especiales.</li>
                            <li>Las cotizaciones valen a&uacute;n cuando no se cierre la venta.</li>
                            <li>Promoci&oacute;n v&aacute;lida para facturaciones desde el 1 de Septiembre, 2018 hasta el 31 de Octubre, 2018.</li>
                            <li> &Uacute;nicamente v&aacute;lido por compras realizadas a trav&eacute;s de mayoristas autorizados.</li>
                            <li>Los puntos ser&aacute;n acreditados en la cuenta de Engage & Grow m&aacute;ximo el 15 de Noviembre, 2018.</li>
                            <li>HPE se reserva el derecho de modificar estos T&eacute;rminos y Condiciones, cambiar, reestructurar o descontinuar este incentivo en cualquier momento sin previo aviso a los participantes.</li>
                        </ol>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <!--MODAL-->
    <div class="modal fade" id="ModalQuestion" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="mdl-card">
                    <div class="mdl-card__title p-b-0">
                        <h2>LISTO&#33;</h2>
                    </div>
                    <div class="mdl-card__supporting-text p-t-0 p-b-0">
                        <h3>Tu registro ha sido enviado satisfactoriamente.</h3>
                        <p>Nos pondremos en contacto contigo a la brevedad</p>
                        <small>Team HPE - Microsoft</small>
                    </div> 
                    <div class="mdl-card__actions">                         
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" data-dismiss="modal">Aceptar</button> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalTipoPromo" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <h2>Bienvenido</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h3>Por favor seleccione una opción</h3>
                            <p>Depende de la selección se le asignaran sus puntos</p>
                        </div>
                        <div class="mdl-card__actions">
                            <a href="es/Home" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">SERVERS</a>
                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal">STORAGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <form id="frmArchivo" method="post" style="display: none;">
        <input id="archivo" type="file" name="archivo" accept=".jpg,.pdf,.png"/>
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>solicitud.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
        var pais = <?php echo "'".$pais."'"?>;
        $('#pais').val(pais);
        initButtonCalendarDaysMaxToday('fecha');
        initMaskInputs('fecha');
    </script>
</body>