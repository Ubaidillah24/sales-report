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
					<td width="20px">No</td>
					<td>Kode Cabang</td>
					<td>Nama Cabang</td>
					<td>Telepon</td>
					<td>Alamat</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($all_cabang as $cabang): ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $cabang->kode_cabang ?></td>
					<td><?= $cabang->nama_cabang ?></td>
					<td><?= $cabang->telepon ?></td>
					<td><?= $cabang->alamat ?></td>
				</tr>	
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>