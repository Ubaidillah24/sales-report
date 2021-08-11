<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
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
						<a href="<?= base_url('laporan/export_detail/' . $laporan->no_laporan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
						<a href="<?= base_url('laporan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
					<div class="card-header">
						<div class="row">
							<div class="col-lg"><strong><?= $title ?> - <?= $laporan->no_laporan ?></div>
							<div class="col-lg"><strong>Status - <?= $laporan->status ?></strong></div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<table class="table table-borderless">
									<tr>
										<td><strong>No laporan</strong></td>
										<td>:</td>
										<td><?= $laporan->no_laporan ?></td>
									</tr>
									<tr>
										<td><strong>Cabang</strong></td>
										<td>:</td>
										<td><?= $laporan->nama_cabang ?></td>
									</tr>
									<tr>
										<td><strong>Nama Store Manager</strong></td>
										<td>:</td>
										<td><?= $laporan->nama_store_manager ?></td>
									</tr>
									<tr>
										<td><strong>Waktu laporan</strong></td>
										<td>:</td>
										<td><?= $laporan->tgl_laporan ?> - <?= $laporan->jam_laporan ?></td>
									</tr>
								</table>
							</div>
							<div class="col-md-4">
								<table class="table table-borderless">
									<tr>
										<td><strong>Target</strong></td>
										<td>:</td>
										<td>Rp. <?= $laporan->target ?></td>
									</tr>
									<tr>
										<td><strong>NETT</strong></td>
										<td>:</td>
										<td>Rp. <?= $laporan->nett ?></td>
									</tr>
									<tr>
										<td><strong>MTD NETT</strong></td>
										<td>:</td>
										<td>Rp. <?= $laporan->mtd_nett ?></td>
									</tr>
									<tr>
										<td><strong>Sales Race</strong></td>
										<td>:</td>
										<td><?= $laporan->sales_race ?></td>
									</tr>
									<tr>
										<td><strong>Sales Achieve</strong></td>
										<td>:</td>
										<td><?= $laporan->sales_achieve ?></td>
									</tr>
									<tr>
										<td><strong>SC</strong></td>
										<td>:</td>
										<td><?= $laporan->sc ?></td>
									</tr>
									<tr>
										<td><strong>Large</strong></td>
										<td>:</td>
										<td><?= $laporan->large ?></td>
									</tr>
								</table>
							</div>
							<div class="col-md-4">
								<table class="table table-borderless">
									<tr>
										<td><strong>Grab</strong></td>
										<td>:</td>
										<td>Rp. <?= $laporan->grab ?></td>
									</tr>
									<tr>
										<td><strong>Gofood</strong></td>
										<td>:</td>
										<td>Rp. <?= $laporan->gofood ?></td>
									</tr>
									<tr>
										<td><strong>Walk in</strong></td>
										<td>:</td>
										<td>Rp. <?= $laporan->walk_in ?></td>
									</tr>
									<tr>
										<td><strong>Shopee Food</strong></td>
										<td>:</td>
										<td>Rp. <?= $laporan->shopee_food ?></td>
									</tr>
								</table>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<thead>
										<tr>
											<td><strong>No</strong></td>
											<td><strong>Nama Produk</strong></td>
											<td><strong>Jumlah</strong></td>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_detail_laporan as $detail_laporan): ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $detail_laporan->nama_produk ?></td>
												<td><?= $detail_laporan->jumlah ?></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
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
	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>