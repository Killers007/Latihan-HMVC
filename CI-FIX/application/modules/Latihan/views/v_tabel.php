<!DOCTYPE html>
<html>
<head>
	<title>Data Table</title>  
</head>
<body>
	<table>
		<thead>
			<tr>
			<?php foreach ($field as $value): ?>
				<td><?php echo $value->name ?></td>
			<?php endforeach ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $value): ?>
			<tr>
				<td><?php echo $value->nim ?></td>
				<td><?php echo $value->nama ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>