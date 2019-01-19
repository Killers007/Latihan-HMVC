<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<div>
		<a href='<?php echo base_url('grocery/customers_management')?>'>Customers</a> |
		<a href='<?php echo base_url('grocery/orders_management')?>'>Orders</a> |
		<a href='<?php echo base_url('grocery/products_management')?>'>Products</a> |
		<a href='<?php echo base_url('grocery/offices_management')?>'>Offices</a> | 
		<a href='<?php echo base_url('grocery/employees_management')?>'>Employees</a> |		 
		<a href='<?php echo base_url('grocery/film_management')?>'>Films</a> |
		<a href='<?php echo base_url('grocery/multigrids')?>'>Multigrid [BETA]</a>
		
	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
