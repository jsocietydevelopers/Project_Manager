<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="description"            content="Project Manager">
    <meta name="keywords"               content="Project Manager">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="Febrero 15, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
	<title>PROJECT MANAGER</title>
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>stilos.css?v=<?php echo time();?>">
</head>
 
<body>
	<header id="main-header">
		<a id="logo-header" href="#">
			<span class="site-name">Project Manager</span>
			<span class="site-desc">Crear proyecto</span>
		</a>
 
		<nav>
			<ul>
				<li><a href="Admin">Inicio</a></li>
				<li><a href="#">Acerca de</a></li>
				<li><a href="#">Contacto</a></li>
			</ul>
		</nav>
	</header>
	<section id="main-content">
		<header>
			<h1><?php echo $proyecto ?></h1>
		</header>
		<div class="content">
			<input type="text" class="form-control" id="tarea" placeholder="Tarea" style="max-width: 300px;">
			<input type="text" class="form-control" id="tiempo" placeholder="Tiempo(Horas)" style="max-width: 300px;">
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="crearTarea()"><i class="mdi mdi-add"></i></button>
			<div class="actividades">
				<!-- <h3>Actividad 1</h3>
				<div class="progress">
				    <div class="progress-bar" style="width:0%; color:black">0%</div>
				</div>
				<a onclick="cambiarInput()"><span id="activi">Ingrese una actividad...</span></a>
				<input type="text" class="form-control" id="actividad" placeholder="Ingrese una actividad..." style="display: none;">
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnActividad" onclick="crearActividad()" style="display: none;"><i class="mdi mdi-add"></i>Crear actividad</button> -->
                <?php echo $html ?>
			</div>
		</div>
				
	</section>
	<div class="modal fade" id="ModalIquote" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <p>crear</p>
                        </div>
                        <div class="mdl-card__supporting-text text-center">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre del proyecto">
                        	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="guardarProyecto()"></i>Guardar</button>
                        </div>
                        <!-- <div class="mdl-card__menu">
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>admin.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        </script>
</body>
</html>