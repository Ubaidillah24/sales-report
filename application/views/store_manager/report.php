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
				<?php foreach ($all_store_manager as $store_manager): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $store_manager->kode ?></td>
						<td><?= $store_manager->nama ?></td>
						<td><?= $store_manager->username ?></td>
						<td><?= $store_manager->nama_cabang ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>