<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html>
<head>
	<title></title>
	<style type='text/css'>
		body
		{
			font-family: Arial;
			font-size: 14px;
		}
		a {
		    color: blue;
		    text-decoration: none;
		    font-size: 14px;
		}
		a:hover
		{
			text-decoration: underline;
		}
		strong { 
	    color: #000;
			font-size:20px; 
		}	
		
		li{
			list-style: none;
			float: left;
			margin:10px;
			width: 500px;
		}

		video{
			border: 1px solid #ccc;
		}

		h3{
			float: left;
			max-width: 265px
		}

		a.down {
			float: right;
			margin: 25px;
		}
	</style>
</head>

<body>
	<div>
		<a class="menu_item" id="menu_denunciar" href="<?php echo site_url('admin/denunciar');?>"> Registrar Nuevo migrante </a> |
		<a class="menu_item" id="menu_crea_denuncia" href="<?php echo site_url('admin/crea/denuncia');?>"> Agregar denuncia a un migrante ya registrado </a> |
		<a class="menu_item" id="menu_migrantes" href="<?php echo site_url('admin/migrantes');?>"> Migrantes </a> |
		<a class="menu_item" id="menu_denuncias" href="<?php echo site_url('admin/denuncias');?>"> Denuncias </a> |
		<a class="menu_item" id="menu_reportes" href="<?php echo site_url();?>/admin/reportes"> Reportes </a> |
		<a class="menu_item" id="menu_reportes" href="#"> <strong> Tutoriales </strong> </a> |
		<?php if(isset($_SESSION['user_id'])) ?>
			<a class="menu_item" href="<?php echo site_url('admin/logout');?>">Cerrar sesión</a> | 
		<?php ?>
		
	</div>

	<div id="_tooltip" style='height:20px;'> </div>  

	<div id="cabecera">
		<h1> Tutoriales </h1>
		<h2> En esta sección podrás encontrar recursos útiles para entender las distintas partes de este sistema de captura </h2>
	</div>

	<div id="personalizar" class="non-printable"> </div>

	<ul>
		<li>
			<video width="480" height="400" controls> 
				<source src="<?php echo site_url();?>/../assets/videos/Migrantes01.mp4" type="video/mp4">
			</video>
			<a class="down" href="<?php echo site_url();?>/../assets/videos/Migrantes01.mp4" > Descarga </a>
			<h3> Screencast Migrantes 01 - Presentación e ingreso al sistema <h3>
		</li>
		<li>
			<video width="480" height="400" controls> 
				<source src="<?php echo site_url();?>/../assets/videos/Migrantes02.mp4" type="video/mp4">
			</video>
			<a class="down" href="<?php echo site_url();?>/../assets/videos/Migrantes02.mp4" > Descarga </a>
			<h3> Screencast Migrantes 02 - Sección Migrantes <h3>
		</li>
		<li>
			<video width="480" height="400" controls> 
				<source src="<?php echo site_url();?>/../assets/videos/Migrantes03.mp4" type="video/mp4">
			</video>
			<a class="down" href="<?php echo site_url();?>/../assets/videos/Migrantes03.mp4" > Descarga </a>
			<h3> Screencast Migrantes 03 - Insertar migrantes y denuncias <h3>
		</li>

		<li>
			<video width="480" height="400" controls> 
				<source src="<?php echo site_url();?>/../assets/videos/Migrantes04.mp4" type="video/mp4">
			</video>
			<a class="down" href="<?php echo site_url();?>/../assets/videos/Migrantes04.mp4" > Descarga </a>
			<h3> Screencast Migrantes 04 - Insertar denuncia para migrante preregistrado <h3>
		</li>

		<li>
			<video width="480" height="400" controls> 
				<source src="<?php echo site_url();?>/../assets/videos/Migrantes05.mp4" type="video/mp4">
			</video>
			<a class="down" href="<?php echo site_url();?>/../assets/videos/Migrantes05.mp4" > Descarga </a>
			<h3> Screencast Migrantes 05 - Reportes <h3>
		</li>

		<li>
			<video width="480" height="400" controls> 
				<source src="<?php echo site_url();?>/../assets/videos/Migrantes06.mp4" type="video/mp4">
			</video>
			<a class="down" href="<?php echo site_url();?>/../assets/videos/Migrantes06.mp4" > Descarga </a>
			<h3> Screencast Migrantes 06 - Catálogos <h3>
		</li>
		

	</ul> 

</body>

</html>