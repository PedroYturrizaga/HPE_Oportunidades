<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="Registro de Oportunidades HPE">
        <meta name="keywords"               content="Registro de Oportunidades HPE">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="Agosto 22, 2018"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
    	<title>Promo Storage Accelerate / Promo Flex Attach Servers</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.ico">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>metric.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <body>
        <div class="js-header js-header--login">
            <div class="js-header--left">
                <img src="<?php echo RUTA_IMG?>logo/hpe-logo.png">
            </div>
            <div class="js-header--right">
                <div class="js-idioma">
                    <select class="selectpicker" id="idioma"  name="idioma" onchange="cambiarIdioma()">
                        <option value="Español">Espa&ntilde;ol</option>
                        <option value="Inglés">English</option>
                    </select>
                </div>
            </div>
        </div>
        <section class="js-section js-height">
            <div class="js-fondo--login"></div>
            <div class="js-container js-flex">
                <div class="js-login">
                    <h1>Promo Storage Accelerate / Promo Flex Attach Servers</h1>
                    <h2>Reporte aqu&iacute; tus ventas</h2>
                    <div class="col-xs-12 js-input m-0">
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" onkeyup="verificarDatos(event);">
                    </div>
                    <div class="col-xs-12 js-input m-0">
                        <label for="password">Contrase&ntilde;a</label>
                        <input type="password" id="password" onkeyup="verificarDatos(event);">
                    </div>
                    <div class="col-xs-12 js-checkbox">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                            <input type="checkbox" id="remember" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Recuerdame</span>
                        </label>
                    </div>
                    <div class="col-xs-12 p-0">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button js-button--login" onclick="ingresar()">Iniciar Sesi&oacute;n</button>
                    </div>
                    <div class="col-xs-12 js-middle">
                        <div class="js-middle--left">
                            <a onclick="openModalRecuperar()">¿Olvidaste tu contrase&ntilde;a?</a>
                        </div>
                        <div class="js-middle--right">
                            <a onclick="openModalCrear()">Crear acceso</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--MODAL REGISTRAR NUEVO USUARIO -->
        <div class="modal fade" id="registroUsuario" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title p-b-0">
                            <h2>Crear Acceso</h2>
                        </div>
                        <div class="mdl-card__supporting-text p-t-0">
                            <div class="col-xs-12 js-input">
                                <label for="nombres">Nombres y Apellidos</label>
                                <input type="text" id="nombres" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="compania">Compa&ntilde;&iacute;a</label>
                                <input type="text" id="compania" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input js-select">
                                <select class="selectpicker" title="Seleccione su región" id="region" title="Regi&oacute;n">
                                    <option value="Caribe">Caribe</option>
                                    <option value="Centro américa">Centro Am&eacute;rica</option>
                                </select>
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="pais">País</label>
                                <input type="text" id="pais" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="email">Email</label>
                                <input type="text" id="email" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="pass">Contrase&ntilde;a</label>
                                <input type="password" id="pass" onchange="validarCampos()">
                            </div>
                            <div class="col-xs-12 js-input">
                                <label for="passRep">Confirmar contrase&ntilde;a</label>
                                <input type="password" id="passRep" onchange="validarCampos()">
                            </div>
                        </div> 
                        <div class="mdl-card__actions">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button js-button--default" data-dismiss="modal">Cancelar</button>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button " onclick="registrar()">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL RECUPERAR CONTRASEÑA -->
        <div class="modal fade" id="recuperaContrasena" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <h2>Recuperar Contrase&ntilde;a</h2>
                            <p>Comp&aacute;rtenos tu correo y en breve te enviaremos un correo con tu contrase&ntilde;a</p>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="col-xs-12 js-input">
                                <label for="usuarioRecupera">Usuario</label>
                                <input type="text" id="usuarioRecupera" onkeyup="verificarDatos(event);">
                            </div>
                        </div> 
                        <div class="mdl-card__actions text-right">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button js-button--default" data-dismiss="modal">Cancelar</button>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" onclick="recuperar()" >Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--MODAL CAMBIO CONTRASEÑA -->
        <div class="modal fade" id="cambioContrasena" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm text-center">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__supporting-text">
                            <h2>CAMBIAR CONTRASE&Ntilde;A</h2>
                            <div class="col-xs-12 form-group js-input">
                                <label for="usuario">Usuario</label>
                                <input type="text" id="usuarioCambio" onkeyup="verificarDatos(event);">
                            </div>
                            <div class="col-xs-12 form-group js-input">
                                <label for="password">Nueva contrase&ntilde;a</label>
                                <input type="password" id="newPassword" onkeyup="verificarDatos(event);">
                            </div>
                            <div class="col-xs-12 form-group js-input">
                                <label for="confirmPassword">Confirmar contrase&ntilde;a</label>
                                <input type="confirmPassword" id="confirmPassword" onkeyup="verificarDatos(event);">
                            </div>
                        </div> 
                        <div class="mdl-card__actions">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal">Cancelar</button>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="cambiar()">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script> 
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>login.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            // var URLactual = window.location;
            // if(URLactual['href'] != 'http://www.marketinghpe.com/promostorageq4/rla/es/'){
            //     location.href = 'http://www.marketinghpe.com/promostorageq4/rla/es/';
            // }
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
            $(document).ready(function(){
                let CHECK = sessionStorage.getItem('CHECK');
                let USERNAME = sessionStorage.getItem('USERNAME');
                let PASS = sessionStorage.getItem('PASS');
                if(CHECK == 1) {
                    $('#remember').prop('checked', true);
                    $('#usuario').val(USERNAME);
                    $('#password').val(PASS);
                }else {
                    $('#remember').prop('checked', false);
                    $('#usuario').val('');
                    $('#password').val('');
                }
            });
        </script>
    </body>
</html>