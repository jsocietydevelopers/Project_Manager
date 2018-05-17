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
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Acerca de</a></li>
				<li><a href="#">Contacto</a></li>
			</ul>
		</nav>
	</header>
	<section id="main-content">
		<header>
			<h1>Crear proyecto</h1>
		</header>
		<div class="content">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Proyectos</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo proyecto</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Colaboradores</a>
			  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			  	<table class="table">
				    <thead>
				      <tr>
				        <th>Nombre del proyecto</th>
				        <th>Colaboradores</th>
				        <th>Estatus</th>
				        <th>Acción</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td>SAP BUSINESS ONE</td>
				        <td>Jhonatan, José</td>
				        <td>Terminado</td>
				        <td><i class="mdi mdi-create"></i><i class="mdi mdi-delete"></i></td>
				      </tr>
				      <tr>
				        <td>HPE promo made simple</td>
				        <td>Jhonatan, José</td>
				        <td>Desarrollo</td>
				        <td><i class="mdi mdi-create"></i><i class="mdi mdi-delete"></i></td>
				      </tr>
				      <tr>
				        <td>Project Manager</td>
				        <td>Jhonatan, José</td>
				        <td>Inicio</td>
				        <td><i class="mdi mdi-create"></i><i class="mdi mdi-delete"></i></td>
				      </tr>
				    </tbody>
				  </table>
			  </div>
			  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	               <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="crearProyecto()"><i class="mdi mdi-add"></i>Crear Proyecto</button>
			  </div>
			  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			  	  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="crearGrupo()"><i class="mdi mdi-add"></i>Crear Grupo</button>
			  </div>
			</div>
			<!-- <div class="mdl-card__actions">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="crear()">Inicio</button>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="crear()">Proyectos</button>
                <p>Equipos</p>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="crear()">Crear equipo</button>
            </div> -->
		</div>
	</section>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>login.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        </script>
</body>
</html>