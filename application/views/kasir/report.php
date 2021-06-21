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
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<td>No</td>
					<td>Kode</td>
					<td>Nama</td>
					<td>Username</td>
					<td>Cabang</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_kasir as $kasir): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $kasir->kode ?></td>
						<td><?= $kasir->nama ?></td>
						<td><?= $kasir->username ?></td>
						<td><?= $kasir->nama_cabang ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>