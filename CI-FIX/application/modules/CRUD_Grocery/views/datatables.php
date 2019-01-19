<!DOCTYPE html>
<html>
<head>
	<title>Datatables</title>
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">

	<script src="<?php echo base_url('assets') ?>/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url('assets') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>

			<div class="table-responsive m-t-40">
				<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Age</th>
							<th>Start date</th>
							<th>Salary</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Age</th>
							<th>Start date</th>
							<th>Salary</th>
						</tr>
					</tfoot>
					<tbody>
						<tr>
							<td>Tiger Nixon</td>
							<td>System Architect</td>
							<td>Edinburgh</td>
							<td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td>
						</tr>
					</tbody>
				</table>
			</div>
	
</body>
<script src="<?php echo base_url('assets'); ?>/datatables/datatables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets'); ?>/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/datatables/datatables-init.js"></script>
</html>
