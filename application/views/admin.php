<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
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
</style>
</head>
<body>
	<div>
		<a href='<?php echo site_url('admin/migrantes')?>'>Migrantes</a> |
		<a href='<?php echo site_url('admin/denuncias')?>'>Denuncias</a> |
		<a href='<?php echo site_url('admin/estados')?>'>Estados/Departamentos</a>
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<a href='<?php echo site_url('admin/autoridades')?>'>Autoridades</a> |
		<a href='<?php echo site_url('admin/paises')?>'>Paises</a> |
		<a href='<?php echo site_url('admin/estados_casos')?>'>Estado de los casos</a> |
		<a href='<?php echo site_url('admin/transportes')?>'>Transportes</a>
		
		<?php if(isset($_SESSION['user_id'])) { ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			| <a href='<?php echo site_url('admin/logout')?>'>Cerrar sesión</a>
		<?php } ?>
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
