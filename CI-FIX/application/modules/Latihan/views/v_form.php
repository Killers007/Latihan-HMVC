<!DOCTYPE html>
<html>
<head>
	<title>Form Validation {elapsed_time}</title>  
</head>
<body>
	<?php 
	$dropdown=array(
		'besar' => 'BESAR',
		'kecil' => 'KECIL',
		'sedang' => 'SEDANG',
	);
	 ?>
	<?php // echo validation_errors(); ?>
	<form action="<?php echo base_url('latihan/f_validation') ?>" method="post">
		<?php echo form_error('nama') ?>
		<input type="text" name="nama" value="<?php echo set_value('nama') ?>" placeholder="Nama"><br>
		<?php echo form_error('umur') ?>
		<?php echo form_input('umur', set_value('umur'), array('placeholder' => 'Umur')); ?><br>
		<?php echo form_dropdown('ukuran', $dropdown, 'kecil'); ?><br>
		<input type="submit" value="SImpan">
	</form>
</body>
</html>