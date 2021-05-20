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
			<div id="content" data-url="<?= base_url('cabang') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('cabang') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('cabang/proses_ubah/' . $cabang->kode_cabang) ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="kode_cabang"><strong>Kode</strong></label>
											<input type="text" name="kode_cabang" placeholder="Masukkan Kode cabang" autocomplete="off"  class="form-control" required value="<?= $cabang->kode_cabang ?>" maxlength="8" readonly>
										</div>
										<div class="form-group col-md-8">
											<label for="nama_cabang"><strong>Nama</strong></label>
											<input type="text" name="nama_cabang" placeholder="Masukkan Nama cabang" autocomplete="off"  class="form-control" required value="<?= $cabang->nama_cabang ?>">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="telepon"><strong>Telepon</strong></label>
											<input type="number" name="telepon" placeholder="Masukkan No Telepon" autocomplete="off"  class="form-control" required value="<?= $cabang->telepon ?>">
										</div>
										<div class="form-group col-md-8">
											<label for="alamat"><strong>Alamat</strong></label>
											<textarea name="alamat" id="alamat" style="resize: none;" class="form-control" placeholder="Masukkan Alamat"><?= $cabang->alamat ?></textarea>
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