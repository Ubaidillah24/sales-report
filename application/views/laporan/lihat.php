<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
	<link href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datepicker/datepicker3.css" rel="stylesheet">
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
							<a href="#" class="btn btn-success btn-sm" id="exportFile"><i class="fa fa-file-excel"></i>&nbsp;&nbsp;Export Excel</a>
							<a href="#" class="btn btn-warning btn-sm" id="exportFile1"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export Pdf</a>
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
					<?php elseif ($this->session->flashdata('error')) : ?>
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
											<td><input type="text" data-date-format="yyyy-mm-dd" readonly id="min" name="min" value="<?= $this->uri->segment(3); ?>"></td>
											<td></td>
										</tr>
										<tr>
											<td>Maximum date:</td>
											<td><input type="text" data-date-format="yyyy-mm-dd" readonly id="max" name="max" value="<?= $this->uri->segment(4); ?>"></td>
											<td><button type="button" name="cari" id="cari" class="btn btn-primary">Search</button></td>
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
											<td>Target</td>
											<td>NETT</td>
											<td>MTD NETT</td>
											<td>Sales Race</td>
											<td>Sales Achieve</td>
											<td>SC</td>
											<td>Large</td>
											<td>Grab</td>
											<td>Gofood</td>
											<td>Walk In</td>
											<td>Shopee Food</td>
											<td>Status</td>
											<td >Aksi</td>
										</tr>
									</thead>

								</table>
								<table class="table table-bordered" id="dataTableDetail" width="100%" cellspacing="0">
									<thead>
										<tr>
											<td>No</td>
											<td>No Laporan</td>
											<td>Nama Produk</td>
											<td>Jumlah</td>
											
										</tr>
									</thead>

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
		$(document).ready(function() {
			$("#exportFile").click(function() {
				
				var table = $('#dataTable').DataTable();
				table.button(0).trigger();

				var table1 = $('#dataTableDetail').DataTable();
				table1.button(0).trigger();

			})

			$("#exportFile1").click(function() {
				
				var table = $('#dataTable').DataTable();
				table.button(1).trigger();

				var table1 = $('#dataTableDetail').DataTable();
				table1.button(1).trigger();

			})

			
			var thisDate = new Date().toISOString().slice(0, 10);

			$('#min').datepicker({
				autoclose: true,
				endDate: thisDate,
			}).on('changeDate', function(data) {
				var minDate = new Date(data.date.valueOf());
				$('#max').datepicker('setStartDate', minDate);
			});

			$('#max').datepicker({
				autoclose: true,
			});

			$('#cari').click(function() {

				var tgl_awal = $('#min').val();
				var tgl_akhir = $('#max').val();


				if (tgl_awal == '') {
					tgl_awal = null;
				} else {
					tgl_awal = tgl_awal;
				}

				if (tgl_akhir == '') {
					tgl_akhir = null;
				} else {
					tgl_akhir = tgl_akhir;
				}

				window.location.href = `<?= base_url(); ?>laporan/index/` + tgl_awal + '/' + tgl_akhir;


			})

			var path = `<?php echo base_url() . 'laporan/dataAll/' . $this->uri->segment(3) . '/' . $this->uri->segment(4); ?>`;
			var pathDetail = `<?php echo base_url() . 'laporan/dataAllDetail/' . $this->uri->segment(3) . '/' . $this->uri->segment(4); ?>`;

			$('#dataTable').DataTable({
				"scrollX": true,
				"scrollCollapse": true,
				"processing": true,
				//"serverSide": true,
				"ajax": {
					"url": path,
					"type": "POST"
				},
				"columns": [{
						"data": {

						},
						render: function(data, type, row, meta) {
							var num = meta.row + meta.settings._iDisplayStart + 1;

							return num;
						}
					},
					{
						"data": "no_laporan"
					},
					{
						"data": "nama_cabang"
					},

					{
						"data": "nama_store_manager"
					},
					{
						"data": {},
						render: function(data) {
							return data.tgl_laporan + ' - ' + data.jam_laporan
						}
					},
					{
						"data": "target"
					},
					{
						"data": "nett"
					},
					{
						"data": "mtd_nett"
					},
					{
						"data": "sales_race"
					},
					{
						"data": "sales_achieve"
					},
					{
						"data": "sc"
					},
					{
						"data": "large"
					},
					{
						"data": "grab"
					},
					{
						"data": "gofood"
					},
					{
						"data": "walk_in"
					},
					{
						"data": "shopee_food"
					},
					{
						"data": "status" 
					},


					{
						"data": {

						},
						render: function(data) {

							return ` 
									<a href="<?= base_url('laporan/ubah/'); ?>` + data.no_laporan + `" class="btn btn-primary btn-sm" ><i class="fa fa-pen"></i></a>

									<a href="<?= base_url('laporan/detail/'); ?>` + data.no_laporan + `" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
									<a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('laporan/hapus/') ?>` + data.no_laporan + `" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
																		
									`;
						}
					}
				],
				"dom": 'Blfrtip',
				"buttons": [{
						"extend": 'excelHtml5',
						"title": 'REKAP DATA LAPORAN_' + `<?= $this->uri->segment(3) ?>` + `_` + `<?= $this->uri->segment(4) ?>`,
						"footer": true
					},
					{
						"extend": 'pdf',
						"title": 'REKAP DATA LAPORAN_' + `<?= $this->uri->segment(3) ?>` + `_` + `<?= $this->uri->segment(4) ?>`,
						"footer": true,
						"orientation": 'landscape',
						"pageSize": 'LEGAL'
					},
				]
			});

			$('#dataTableDetail').DataTable({
				"scrollX": true,
				"scrollCollapse": true,
				"processing": true,
				//"serverSide": true,
				"ajax": {
					"url": pathDetail,
					"type": "POST"
				},
				"columns": [{
						"data": {

						},
						render: function(data, type, row, meta) {
							var num = meta.row + meta.settings._iDisplayStart + 1;

							return num;
						}
					},
					{
						"data": "no_laporan"
					},
					{
						"data": "nama_produk"
					},
					{
						"data": "jumlah"
					}

					
				],
				"dom": 'Blfrtip',
				"buttons": [{
						"extend": 'excelHtml5',
						"title": 'REKAP DATA DETAIL LAPORAN_' + `<?= $this->uri->segment(3) ?>` + `_` + `<?= $this->uri->segment(4) ?>`,
						"footer": true
					},
					{
						"extend": 'pdf',
						"title": 'REKAP DATA DETAIL LAPORAN_' + `<?= $this->uri->segment(3) ?>` + `_` + `<?= $this->uri->segment(4) ?>`,
						"footer": true,
						"orientation": 'landscape',
						"pageSize": 'LEGAL'
					},
				]
			});
		});
	</script>

	<style>
		.dt-buttons {
			margin-bottom: 10px;
			display:none;
			/* float: right!important; */
		}

		.dt-buttons>.buttons-copy,
		.dt-buttons>.buttons-csv,
		.dt-buttons>.buttons-excel,
		.dt-buttons>.buttons-pdf,
		.dt-buttons>.buttons-print {
			padding: 4px 8px;
			font-size: 12px;
			border-radius: 3px;
			-webkit-box-shadow: none;
			box-shadow: none;
			border: 1px solid transparent;
		}
	</style>

	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/moment.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.dateTime.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/js/demo/datatables-demo.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<script src="<?= base_url('sb-admin') ?>/vendor/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dt-btn/dataTables.button.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dt-btn/dataTables.button.flash.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dt-btn/dataTables.jszip.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dt-btn/dataTables.pdfmake.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dt-btn/dataTables.vfs_font.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dt-btn/dataTables.button.html5.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dt-btn/dataTables.print.min.js"></script>
</body>

</html>