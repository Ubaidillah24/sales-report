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
			<div id="content" data-url="<?= base_url('store_manager') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
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

					<div class="row">

						<!-- Earnings (Monthly) Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
							<a href="<?= base_url('produk') ?>">
								<div class="card border-left-primary shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Produk</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_produk ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-box fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<!-- Earnings (Monthly) Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
							<a href="<?= base_url('store_manager') ?>">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Store Manager</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_store_manager ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-users fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<!-- Earnings (Monthly) Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
							<a href="<?= base_url('cabang') ?>">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Cabang</div>
												<div class="row no-gutters align-items-center">
													<div class="col-auto">
														<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlah_cabang ?></div>
													</div>
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-store fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<!-- Pending Requests Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
							<a href="<?= base_url('laporan') ?>">
								<div class="card border-left-warning shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Laporan Hari Ini</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_laporan ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-file-invoice fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-xl-12 col-md-6 mb-4">
							<?php

							$prod = "";
							$jmlProd = "";

							foreach ($dataproduk as $dataproduk) {
								$prod .= '"' . $dataproduk['nama_produk'] . '",';
								$jmlProd .= $dataproduk['jumlah'] . ',';
							}

							$data['prod'] = (substr($prod, -1, 1) == ',' ? substr($prod, 0, -1) : '');
							$data['jmlProd'] = (substr($jmlProd, -1, 1) == ',' ? substr($jmlProd, 0, -1) : '');



							?>
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Produk Terlaris Hari Ini</h6>

								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-area">
										<canvas id="produkChart"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-12 col-md-6 mb-4">
							<?php

							$toko = "";
							$jmltoko = "";

							foreach ($datatoko as $datatoko) {
								$toko .= '"' . $datatoko['nama_cabang'] . '",';
								$jmltoko .= $datatoko['jumlah'] . ',';
							}

							$data1['toko'] = (substr($toko, -1, 1) == ',' ? substr($toko, 0, -1) : '');
							$data1['jmltoko'] = (substr($jmltoko, -1, 1) == ',' ? substr($jmltoko, 0, -1) : '');



							?>
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-success">Penjualan Toko Hari Ini</h6>

								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-area">
										<canvas id="tokoChart"></canvas>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="card shadow">
								<div class="card-header"><strong>User Sedang Login</strong></div>
								<div class="card-body">
									<strong>Nama : </strong><br>
									<input type="text" value="<?= $this->session->login['nama'] ?>" readonly class="form-control mt-2 mb-2">
									<strong>Username : </strong><br>
									<input type="text" value="<?= $this->session->login['username'] ?>" readonly class="form-control mt-2 mb-2">
									<?php if ($this->session->login['role'] == 'store_manager' || $this->session->login['role'] == 'kasir') : ?>
										<strong>Cabang : </strong><br>
										<input type="text" value="<?= $this->session->login['nama_cabang'] ?>" readonly class="form-control mt-2 mb-2">
									<?php endif; ?>
									<strong>Role : </strong><br>
									<input type="text" value="<?= $this->session->login['role'] ?>" readonly class="form-control mt-2 mb-2">
									<strong>Jam Login : </strong><br>
									<input type="text" value="<?= $this->session->login['jam_masuk'] ?>" readonly class="form-control mt-2">
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
	<script src="<?= base_url('sb-admin') ?>/vendor/chart.js/Chart.min.js"></script>


	<?php $this->load->view('chart-produk', $data); ?>
	<?php $this->load->view('chart-toko', $data1); ?>

</html>