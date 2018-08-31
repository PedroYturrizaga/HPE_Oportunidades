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
            <img src="<?php echo RUTA_IMG?>logo/hpe-logo.svg">
        </div>
        <div class="js-header--right">
            <p>Promo Storage Accelerate / Promo Flex Attach Servers</p>
            <a onclick="cerrarSesion()">Log out</a>
        </div>
    </div>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">What do you want to do?</span>
            <nav class="mdl-navigation">
                <a id="cotizacion" class="mdl-navigation__link active" onclick="goToMenu(this.id)">Enter a new quote</a>
                <a id="puntaje" class="mdl-navigation__link" onclick="goToMenu(this.id)">View total earned points</a>
                <a id="terminos" class="mdl-navigation__link" onclick="goToMenu(this.id)">Terms and Conditions</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <section class="js-section p-t-20">
                <div class="js-container">
                    <div class="js-user p-0">
                        <div class="js-user--left">
                            <p>Welcome <?php echo $nombre?> </p> 
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-cotizacion" class="js-section js-section--menu">
                <div class="js-container row">
                    <h2 class="js-title">Earn <span id="money"></span> dollars in Engage & Grow points for orders over 15k in the <span id="promocion"></span>promotion!</h2>
                    <p class="js-subtitle">If you have already closed a project using this promotion and your wholesaler billed you between September 1 and October 31, 2018, fill out the following information to claim your Engage & Grow points:</p>
                    <div class="col-xs-12 p-0">
                        <div class="col-sm-6 col-xs-12">
                            <div class="col-xs-12 js-input">
                                <label for="Nombre">Name</label>
                                <input type="text" id="Nombre" onchange="validarCampos(); verificaEstado();">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="compania">Company</label>
                                <input type="text" id="compania" onchange="validarCampos(); verificaEstado();">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="pais">Country</label>
                                <input type="text" id="pais" onchange="validarCampos(); verificaEstado();">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" onchange="validarCampos(); verificaEstado();">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="telefono">Phone</label>
                                <input type="text" id="telefono" onchange="validarCampos(); verificaEstado();">
                            </div>
                            <div class="col-xs-12 js-input js-radio">
                                <label>Do you have an active Engage & Grow account?</label>
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radioCotizacion">
                                    <input type="radio" id="radioCotizacion" class="mdl-radio__button" name="option1" value="1" onchange="validarCampos(); verificaEstado();">
                                    <span class="mdl-radio__label">Yes</span>
                                </label>
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radioFacturacion">
                                    <input type="radio" id="radioFacturacion" class="mdl-radio__button" name="option1" value="0" onchange="validarCampos(); verificaEstado();">
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
                                <label for="NombreContacto">Name of the person who assisted you in the wholesaler</label>
                                <input type="text" id="NombrePersona" onchange="validarCampos(); verificaEstado();">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="emailContacto">Email of the contact that attended you within the wholesaler</label>
                                <input type="email" id="emailContacto" onchange="validarCampos(); verificaEstado();">
                            </div>

                            <div class="col-xs-12 js-input">
                                <label for="numFactura"># of the wholesaler invoice with which it was billed</label>
                                <input type="text" id="numFactura" onchange="validarCampos(); verificaEstado();">
                            </div>
                            <div class="col-xs-12 js-input js-date js-flex">
                                <input type="text" id="fecha" name="fecha" maxlength="10" placeholder="Billing Date" value="" style="pointer-events: none" onchange="verificaEstado();">
                                <div class="js-icon">
                                    <button type="button" class="mdl-button mdl-js-button mdl-button--icon">
                                        <i class="mdi mdi-date_range"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="monto">Total amount of the purchase order in USD</label>
                                <input type="text" id="monto" placeholder="0.00" onchange="validarCampos(); verificaEstado();">
                            </div>
                            <div class="col-xs-12 js-input js-file js-flex">
                                <input type="text" id="archivoDocumento" placeholder="Upload your invoice in image or pdf format (2MB Max)" name="archivoDocumento" disabled onchange="verificaEstado();">
                                <div class="js-icon">
                                    <button type="button" class="mdl-button mdl-js-button mdl-button--icon" onclick="subirFactura()">
                                        <i class="mdi mdi-backup"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <button id="ingresar" type="button" name="boton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" onclick="registrar(); agregarDatos();" disabled>Register Opportunity</button>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-puntaje" class="js-section js-section--menu js-opacity-done">
                <div class="js-container">
                    <h2 class="js-title">Last 4 calculations</h2>
                    <div class="js-puntaje js-flex">
                        <div class="js-puntaje__table table-responsive">
                            <table id="tbUltimosIngresos" class="table">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>Company</th>
                                        <th>wholesaler</th>
                                        <th>Date</th>
                                        <th>Points</th>
                                    </tr>
                                </thead >
                                <tbody id="bodyPuntaje"><?php echo $html ?></tbody>
                            </table>
                        </div>
                        <div class="js-puntaje__puntos">
                            <p class="title-formulario">Total earned Engage&Grow points</p>
                            <span id="puntajeGeneral"><?php echo $puntosGeneral ?> pts</span>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-terminos" class="js-section js-section--menu js-opacity-done">
                <div class="js-container">
                    <h2 class="js-title">Terms and Conditions</h2>
                    <div class="js-terminos">
                        <h3>Promo Storage Accelerate</h3>
                        <ol>
                            <li>100 dollars in Engage & Grow points for orders over 15k in products of this Storage promotion.</li>
                            <li>It does not apply to projects sold with Deal/OPG special prices.</li>
                            <li>Promotion valid for billing from September 1, 2018 to October 31, 2018.</li>
                            <li>Only valid for purchases made through authorized wholesalers.</li>
                            <li>Points will be credited to the Engage & Grow account up to November 15, 2018.</li>
                            <li>HPE reserves the right to modify these Terms and Conditions, change, restructure or discontinue this incentive at any time without prior notice to the participants.</li>
                        </ol>
                        <h3>Promo Flex Attach Servers</h3>
                        <ol>
                            <li>50 dollars in Engage & Grow points for orders over 15k in the Promo flex Attach de Servidores.</li>
                            <li>It does not apply to projects sold with Deal/OPG special prices.</li>
                            <li>The quotes are valid even when the sale is not closed.</li>
                            <li>Promotion valid for billing from September 1, 2018 to October 31, 2018.</li>
                            <li>Only valid for purchases made through authorized wholesalers.</li>
                            <li>Points will be credited to the Engage & Grow account up to November 15, 2018.</li>
                            <li>HPE reserves the right to modify these Terms and Conditions, change, restructure or discontinue this incentive at any time without prior notice to the participants.</li>
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
                        <h2>ALL SET!&#33;</h2>
                    </div>
                    <div class="mdl-card__supporting-text p-t-0 p-b-0">
                        <h3>Your registration has been sent successfully.</h3>
                        <small>Team HPE RLA</small>
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
                        <h2>Welcome</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h3>Please select an option</h3>
                        <p>The points will be assigned according on your selection </p>
                    </div>
                    <div class="mdl-card__actions">
                        <button id="promo1" data-money="100" data-promo="Storage Accelerate" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="goToPromocion(this.id)">STORAGE</button>
                        <button id="promo2" data-money="50" data-promo="Promo Flex Attach" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="goToPromocion(this.id)">SERVERS</button>
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
    <script src="<?php echo RUTA_JS?>solicitud_en.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
        var nombre   = <?php echo "'".$nombre."'"?>;
        var compania = <?php echo "'".$compania."'"?>;
        var pais     = <?php echo "'".$pais."'"?>;
        var email    = <?php echo "'".$email."'"?>;
        $('#Nombre').val(nombre);
        $('#compania').val(compania);
        $('#pais').val(pais);
        $('#email').val(email);
        initButtonCalendarDaysMaxToday('fecha');
        initMaskInputs('fecha');
    </script>
</body>