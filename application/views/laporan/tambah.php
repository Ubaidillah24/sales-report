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
						<a href="<?= base_url('laporan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('laporan/proses_tambah') ?>" id="form-tambah" method="POST">
									<h5>Data Petugas</h5>
									<hr>
									<div class="form-row">
										<div class="form-group col-md-2">
											<label>No. Laporan</label>
											<input type="text" name="no_laporan" value="LAP<?= time() ?>" readonly class="form-control">
										</div>
										<div class="form-group col-md-2">
											<label>Tanggal Laporan</label>
											<input type="text" name="tgl_laporan" value="<?= date('d/m/Y') ?>" readonly class="form-control">
										</div>
										<div class="form-group col-md-2">
											<label>Jam</label>
											<input type="text" name="jam_laporan" value="<?= date('H:i:s') ?>" readonly class="form-control">
										</div>
										<?php if ($this->session->login['role'] == 'store_manager'): ?>
										<div class="form-group col-md-3">
											<label>Cabang</label>
											<input type="text" name="nama_cabang" value="<?= $this->session->login['nama_cabang'] ?>" readonly class="form-control">
										</div>
										<?php endif; ?>
										<?php if ($this->session->login['role'] == 'admin'): ?>
										<div class="form-group col-md-3">
											<label>Cabang</label>
											<select name="nama_cabang" id="nama_cabang" class="form-control">
												<option value="">Pilih Cabang</option>
													<?php foreach ($all_cabang as $cabang): ?>
														<option value="<?= $cabang->nama_cabang ?>"><?= $cabang->nama_cabang ?></option>
													<?php endforeach ?>
											</select>
										</div>
										<?php endif; ?>
										<?php if ($this->session->login['role'] == 'admin'): ?>
										<div class="form-group col-md-3">
											<label>Nama Store Manager</label>
											<select name="nama_store_manager" id="nama_store_manager" class="form-control">
												<option value="">Pilih Store_manager</option>
													<?php foreach ($all_store_manager as $store_manager): ?>
														<option value="<?= $store_manager->nama ?>"><?= $store_manager->nama ?></option>
													<?php endforeach ?>
											</select>
										</div>
										<?php endif; ?>
										<?php if ($this->session->login['role'] == 'store_manager'): ?>
										<div class="form-group col-md-3">
											<label>Nama Store Manager</label>
											<input type="text" name="nama_store_manager" value="<?= $this->session->login['nama'] ?>" readonly class="form-control">
										</div>
										<?php endif; ?>								
									</div>
									<div class="form-row mb-4">
										<div class="col-md-4">
											<div class="form-group">
												<label>Target</label>
												<input type="number" name="target" value="" class="form-control" placeholder="Masukkan Target">
											</div>
											<div class="form-group">
												<label>NETT</label>
												<input type="number" name="nett" value="" class="form-control" placeholder="Masukkan NETT">
											</div>
											<div class="form-group">
												<label>MTD NETT</label>
												<input type="number" name="mtd_nett" value="" class="form-control" placeholder="Masukkan MTD NETT">
											</div>
											<div class="form-group">
												<label>Sales Race</label>
												<input type="text" name="sales_race" value="" class="form-control" placeholder="Masukkan Sales Race">
											</div>
											<div class="form-group">
												<label>Sales Achieve</label>
												<input type="text" name="sales_achieve" value="" class="form-control" placeholder="Masukkan Sales Achieve">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>SC</label>
												<input type="number" name="sc" value="" class="form-control" placeholder="Masukkan Jumlah SC">
											</div>
											<div class="form-group">
												<label>L</label>
												<input type="number" name="large" value="" class="form-control" placeholder="Masukkan Jumlah L">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Grab</label>
												<input type="number" name="grab" value="" class="form-control" placeholder="Masukkan Jumlah Grab">
											</div>
											<div class="form-group">
												<label>Gofood</label>
												<input type="number" name="gofood" value="" class="form-control" placeholder="Masukkan Jumlah Gofood">
											</div>
											<div class="form-group">
												<label>Walk In</label>
												<input type="number" name="walk_in" value="" class="form-control" placeholder="Masukkan Jumlah Walk In">
											</div>
											<div class="form-group">
												<label>Shopee Food</label>
												<input type="number" name="shopee_food" value="" class="form-control" placeholder="Masukkan Jumlah Shopee Food">
											</div>
										</div>								
									</div>
									<div class="row">
										<div class="col-md-8">
											<h5>Data Produk</h5>
											<hr>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="nama_produk">Nama Produk</label>
													<select name="nama_produk" id="nama_produk" class="form-control">
														<option value="">Pilih Produk</option>
														<?php foreach ($all_produk as $produk): ?>
															<option value="<?= $produk->nama_produk ?>"><?= $produk->nama_produk ?></option>
														<?php endforeach ?>
													</select>
												</div>
												<div class="form-group col-md-3">
													<label>Kode Produk</label>
													<input type="text" name="kode_produk" value="" readonly class="form-control">
												</div>
												<div class="form-group col-md-2 col-sm-8">
													<label>Jumlah</label>
													<input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
												</div>
												<div class="form-group col-md-1 col-sm-4">
													<label for="">&nbsp;</label>
													<button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
												</div>
											</div>
										</div>
									</div>
									<div class="keranjang">
										<h5>Detail laporan</h5>
										<hr>
										<table class="table table-bordered" id="keranjang">
											<thead>
												<tr>
													<td width="35%">Kode Produk</td>
													<td width="15%">Nama Produk</td>
													<td width="15%">Jumlah</td>
													<td width="15%">Aksi</td>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
											<tfoot>
												<tr>
													<td colspan="5" align="right">
														<input type="hidden" name="max_hidden" value="">
														<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
													</td>
												</tr>
											</tfoot>
										</table>
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
	<script>
		$(document).ready(function(){
			$('tfoot').hide()

			$(document).keypress(function(event){
		    	if (event.which == '13') {
		      		event.preventDefault();
			   	}
			})

			$('#nama_produk').on('change', function(){

				if($(this).val() == '') reset()
				else {
					const url_get_all_produk = $('#content').data('url') + '/get_all_produk'
					$.ajax({
						url: url_get_all_produk,
						type: 'POST',
						dataType: 'json',
						data: {nama_produk: $(this).val()},
						success: function(data){
							$('input[name="kode_produk"]').val(data.kode_produk)
							$('input[name="harga_produk"]').val(data.harga)
							$('input[name="jumlah"]').val(1)
							$('input[name="jumlah"]').prop('readonly', false)
							$('button#tambah').prop('disabled', false)

							// $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_produk"]').val())
							
							// $('input[name="jumlah"]').on('keydown keyup change blur', function(){
							// 	$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_produk"]').val())
							// })
						}
					})
				}
			})

			$(document).on('click', '#tambah', function(e){
				const url_keranjang_produk = $('#content').data('url') + '/keranjang_produk'
				const data_keranjang = {
					nama_produk: $('select[name="nama_produk"]').val(),
					kode_produk: $('input[name="kode_produk"]').val(),
					jumlah: $('input[name="jumlah"]').val(),
				}

				$.ajax({
					url: url_keranjang_produk,
					type: 'POST',
					data: data_keranjang,
					success: function(data){
						if($('select[name="nama_produk"]').val() == data_keranjang.nama_produk) $('option[value="' + data_keranjang.nama_produk + '"]').hide()
						reset()

						$('table#keranjang tbody').append(data)
						$('tfoot').show()

						$('#total').html('<strong>' + hitung_total() + '</strong>')
						$('input[name="total_hidden"]').val(hitung_total())
					}
				})
			})


			$(document).on('click', '#tombol-hapus', function(){
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-produk') + '"]').show()

				if($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function(){
				$('input[name="kode_produk"]').prop('disabled', true)
				$('select[name="nama_produk"]').prop('disabled', true)
				$('input[name="jumlah"]').prop('disabled', true)
			})

			function hitung_total(){
				let total = 0;
				$('.sub_total').each(function(){
					total += parseInt($(this).text())
				})

				return total;
			}

			function reset(){
				$('#nama_produk').val('')
				$('input[name="kode_produk"]').val('')
				$('input[name="jumlah"]').val('')
				$('input[name="jumlah"]').prop('readonly', true)
				$('button#tambah').prop('disabled', true)
			}
		})
	</script>
</body>
</html>