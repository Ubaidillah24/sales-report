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
			<!-- <h4 class="h4 text-dark "><strong><?= $perusahaan->nama_perusahaan ?></strong></h4> -->
		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<td>No Terima</td>
					<td>Nama Petugas</td>
					<td>Nama Supplier</td>
					<td>Tanggal Terima</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_laporan as $laporan): ?>
					<tr>
						<td><?= $laporan->no_terima ?></td>
						<td><?= $laporan->nama_petugas ?></td>
						<td><?= $laporan->nama_supplier ?></td>
						<td><?= $laporan->tgl_terima ?> Pukul <?= $laporan->jam_terima ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>