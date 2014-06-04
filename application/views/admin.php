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
		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/migrantes')?>')" href="javascript:void(0)">Migrantes</a> |
		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/denuncias')?>')" href="javascript:void(0)">Denuncias</a> |
		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/estados')?>')" href="javascript:void(0)">Estados/Departamentos</a>
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/autoridades')?>')" href="javascript:void(0)">Autoridades</a> |
		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/paises')?>')" href="javascript:void(0)">Paises</a> |
		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/estados_casos')?>')" href="javascript:void(0)">Estado de los casos</a> |
		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/transportes')?>')" href="javascript:void(0)">Transportes</a>
		
		<?php if(isset($_SESSION['user_id'])) { ?>
			| <a onclick="javascript: return confirmacion('<?php echo site_url('admin/logout')?>')" href="javascript:void(0)">Cerrar sesión</a>
		<?php } ?>
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
    <script type="text/javascript">
		function confirmacion(url) {
			if(confirm('¿Esta segura/o que desea salir (verifique que ha guardado la información)?')) {
				document.location = url;
			} else {
				return false;
			}
		}
    </script>
</body>
</html>
