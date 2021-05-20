<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
	<link href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('laporan') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('laporan/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
						<a href="<?= base_url('laporan/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
					</div>
				</div>
				<hr>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php elseif($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('error') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
				<div class="card shadow">
					<div class="card-header"><strong>Daftar laporan</strong></div>
					<div class="card-body">
						<div class="table-responsive">
							<table border="0" cellspacing="5" cellpadding="5" class="mb-4">
								<tbody>
									<tr>
										<td>Minimum date:</td>
										<td><input type="text" id="min" name="min"></td>
									</tr>
									<tr>
										<td>Maximum date:</td>
										<td><input type="text" id="max" name="max"></td>
									</tr>
								</tbody>
							</table>
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td>No</td>
										<td>No Laporan</td>
										<td>Cabang</td>
										<td>Nama Store Manager</td>
										<td>Tanggal Laporan</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($all_laporan as $laporan): ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $laporan->no_laporan ?></td>
											<td><?= $laporan->nama_cabang ?></td>
											<td><?= $laporan->nama_store_manager ?></td>
											<td><?= $laporan->tgl_laporan?> - <?= $laporan->jam_laporan ?></td>
											<td>
												<a href="<?= base_url('laporan/detail/' . $laporan->no_laporan) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
												<a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('laporan/hapus/' . $laporan->no_laporan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>				
				</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>

	<?php $this->load->view('partials/js.php') ?>

	<script>
		var minDate, maxDate;
		
		// Custom filtering function which will search data in column four between two values
		$.fn.dataTable.ext.search.push(
			function( settings, data, dataIndex ) {
				var min = minDate.val();
				var max = maxDate.val();
				var date = new Date( data[4] );
		
				if (
					( min === null && max === null ) ||
					( min === null && date <= max ) ||
					( min <= date   && max === null ) ||
					( min <= date   && date <= max )
				) {
					return true;
				}
				return false;
			}
		);
		
		$(document).ready(function() {
			// Create date inputs
			minDate = new DateTime($('#min'), {
				format: 'MMMM Do YYYY'
			});
			maxDate = new DateTime($('#max'), {
				format: 'MMMM Do YYYY'
			});
		
			// DataTables initialisation
			var table = $('#dataTable').DataTable();
		
			// Refilter the table
			$('#min, #max').on('change', function () {
				table.draw();
			});
		});
	</script>

	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/moment.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.dateTime.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/js/demo/datatables-demo.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>