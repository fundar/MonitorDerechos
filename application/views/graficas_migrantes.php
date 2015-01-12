<?php  foreach ($query->result() as $row) {?>
	<li><?php echo $row->nombre; ?></li>
<?php }?>


<?php var_dump($query);?>