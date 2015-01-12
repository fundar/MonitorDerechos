<?php  foreach ($query->result() as $row) {?>
	<li><?php $row->nombre; ?></li>
<?php }?>
