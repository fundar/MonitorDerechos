<?php foreach($query as $row){ ?>
	<li><?php echo $row->nombre; ?></li>
<?php }?>

<script type="text/javascript">
	
	var data = "<?php echo json_encode($query);?>";
	console.log(data);
</script>