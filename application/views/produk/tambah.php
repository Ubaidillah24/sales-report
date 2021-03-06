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
			<div id="content" data-url="<?= base_url('produk') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('produk') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('produk/proses_tambah') ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="kode_produk"><strong>Kode Produk</strong></label>
											<input type="text" name="kode_produk" placeholder="Masukkan Kode Produk" autocomplete="off"  class="form-control" required>
										</div>
										<div class="form-group col-md-6">
											<label for="nama_produk"><strong>Nama Produk</strong></label>
											<input type="text" name="nama_produk" placeholder="Masukkan Nama Produk" autocomplete="off"  class="form-control" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="id_kategori"><strong>Kategori Produk</strong></label>
											<select class="custom-select" name="id_kategori">
												<option selected>Pilih Kategori</option>
												<?php foreach ($all_kategori as $kategori) : ?>
													<option value="<?= $kategori->id_kategori ?>"> <?= $kategori->kategori_produk ?> </option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="harga"><strong>Harga</strong></label>
											<input type="text" name="harga" placeholder="Masukkan Harga" autocomplete="off"  class="form-control" required>
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