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
			<div id="content" data-url="<?= base_url('kasir') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('kasir') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('kasir/proses_ubah/' . $kasir->id) ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="nik"><strong>NIK Kasir</strong></label>
											<input type="text" name="nik" placeholder="Masukkan Nik kasir" autocomplete="off"  class="form-control" required value="<?= $kasir->nik ?>" maxlength="8">
										</div>
										<div class="form-group col-md-6">
											<label for="nama"><strong>Cabang</strong></label>
											<select class="custom-select" name="id_cabang">
												<option selected value="<?= $kasir->id_cabang ?>"> Ganti Cabang </option>
												<?php foreach ($all_cabang as $cabang) : ?>
													<option value="<?= $cabang->id_cabang ?>"> <?= $cabang->nama_cabang ?> </option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="form-group">
											<label for="nama"><strong>Nama kasir</strong></label>
											<input type="text" name="nama" placeholder="Masukkan Nama kasir" autocomplete="off"  class="form-control" required value="<?= $kasir->nama ?>">
										</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="username"><strong>Username</strong></label>
											<input type="text" name="username" placeholder="Masukkan Username" autocomplete="off"  class="form-control" required value="<?= $kasir->username ?>">
										</div>
										<div class="form-group col-md-6">
											<label for="password"><strong>Password (Ganti baru jika lupa)</strong></label>
											<input type="password" name="password" placeholder="Masukkan Password" autocomplete="off"  class="form-control" required value="<?= $kasir->password ?>">
										</div>
									</div>
									<hr>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
										<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
									</div>
								</form>
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
</body>
</html>