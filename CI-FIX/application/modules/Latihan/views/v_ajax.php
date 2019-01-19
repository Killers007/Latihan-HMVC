<!DOCTYPE html>
<html>
<head>
	<title>Ajax</title>
	<script src="<?php echo base_url('assets') ?>/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
	<?php echo validation_errors(); ?>
	<form action="<?php echo base_url('latihan/ajax') ?>" method="post">
		Nama <br>
		<input type="text" name="nama" placeholder="Input Nama"><br>
		NIM <br>
		<input type="text" name="nim" placeholder="Input NIM"><br>
		Fakultas <br>
		<select id="fakultas" name='fakultas'>
			<?php foreach ($fakultas as $value): ?>
				<option value='<?php echo $value->kode_fakultas ?>'><?php echo $value->fakultas ?></option>
			<?php endforeach ?>
		</select>
		<br>
		Prodi <br>
		<select id='prodi' name='prodi'>

		</select>
		<br>
		<input type="submit" value="Simpan">
	</form>

	<script type="text/javascript">
		$(document).ready(function() {
			load();
			function load(){
				$('#prodi').html('');
				$.ajax({
					url: '<?php echo base_url('latihan/get_prodi'); ?>',
					type: 'POST',
					data: {'id': $('#fakultas').val()},
				})
				.done(function(response) {
					data=JSON.parse(response)
					// alert(data)
					for(var i=0;i<data.length;i++){
						$('#prodi').append('<option value="'+data[i].kodeps+'">'+data[i].namaps+'</option>')
					}
				})
				.fail(function() {
					console.log("error");
				})
			}

			$(document).on('change', '#fakultas', function(){
				load();
			});
		});	
	</script>
</body>
</html>