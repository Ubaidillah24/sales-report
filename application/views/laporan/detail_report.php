<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<table class="table table-borderless">
				<tr>
					<td><strong>No Terima</strong></td>
					<td>:</td>
					<td><?= $laporan->no_terima ?></td>
				</tr>
				<tr>
					<td><strong>Nama Petugas</strong></td>
					<td>:</td>
					<td><?= $laporan->nama_petugas ?></td>
				</tr>
				<tr>
					<td><strong>Nama Supplier</strong></td>
					<td>:</td>
					<td><?= $laporan->nama_supplier ?></td>
				</tr>
				<tr>
					<td><strong>Waktu Terima</strong></td>
					<td>:</td>
					<td><?= $laporan->tgl_terima ?> - <?= $laporan->jam_terima ?></td>
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
						<td><strong>Nama Barang</strong></td>
						<td><strong>Jumlah</strong></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($all_detail_laporan as $detail_laporan): ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $detail_laporan->nama_barang ?></td>
							<td><?= $detail_laporan->jumlah ?> <?= strtolower($detail_laporan->satuan) ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>