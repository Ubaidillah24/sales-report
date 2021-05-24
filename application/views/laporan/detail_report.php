<strong><?= $title ?> - <?= $laporan->no_laporan ?></strong>

<table width="100%">
	<tr>
		<td>
			<table width="100%">
				<tr>
					<td><strong>No laporan</strong></td>
					<td>:</td>
					<td><?= $laporan->no_laporan ?></td>
				</tr>
				<tr>
					<td><strong>Cabang</strong></td>
					<td>:</td>
					<td><?= $laporan->nama_cabang ?></td>
				</tr>
				<tr>
					<td><strong>Nama Store Manager</strong></td>
					<td>:</td>
					<td><?= $laporan->nama_store_manager ?></td>
				</tr>
				<tr>
					<td><strong>Waktu laporan</strong></td>
					<td>:</td>
					<td><?= $laporan->tgl_laporan ?> - <?= $laporan->jam_laporan ?></td>
				</tr>
			</table>
		</td>

		<td>
			<table width="100%">
				<tr>
					<td><strong>Target</strong></td>
					<td>:</td>
					<td>Rp. <?= $laporan->target ?></td>
				</tr>
				<tr>
					<td><strong>NETT</strong></td>
					<td>:</td>
					<td>Rp. <?= $laporan->nett ?></td>
				</tr>
				<tr>
					<td><strong>MTD NETT</strong></td>
					<td>:</td>
					<td>Rp. <?= $laporan->mtd_nett ?></td>
				</tr>
				<tr>
					<td><strong>Sales Race</strong></td>
					<td>:</td>
					<td><?= $laporan->sales_race ?></td>
				</tr>
				<tr>
					<td><strong>Sales Achieve</strong></td>
					<td>:</td>
					<td><?= $laporan->sales_achieve ?></td>
				</tr>
				<tr>
					<td><strong>SC</strong></td>
					<td>:</td>
					<td><?= $laporan->sc ?></td>
				</tr>
				<tr>
					<td><strong>Large</strong></td>
					<td>:</td>
					<td><?= $laporan->large ?></td>
				</tr>
			</table>
		</td>

		<td>
			<table width="100%">
				<tr>
					<td><strong>Grab</strong></td>
					<td>:</td>
					<td>Rp. <?= $laporan->grab ?></td>
				</tr>
				<tr>
					<td><strong>Gofood</strong></td>
					<td>:</td>
					<td>Rp. <?= $laporan->gofood ?></td>
				</tr>
				<tr>
					<td><strong>Walk in</strong></td>
					<td>:</td>
					<td>Rp. <?= $laporan->walk_in ?></td>
				</tr>
				<tr>
					<td><strong>Shopee Food</strong></td>
					<td>:</td>
					<td>Rp. <?= $laporan->shopee_food ?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<hr>

<table width="100%" class="table table-bordered">
	<thead>
		<tr>
			<td><strong>No</strong></td>
			<td><strong>Nama Produk</strong></td>
			<td><strong>Jumlah</strong></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($all_detail_laporan as $detail_laporan) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $detail_laporan->nama_produk ?></td>
				<td><?= $detail_laporan->jumlah ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>