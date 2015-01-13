<?php foreach($query as $row){ ?>
	<li><?php echo $row->pais; ?></li>
<?php }?>

<script type="text/javascript">
	var data = <?php echo json_encode($query);?>;
	console.log(data);
</script>