<tr class="row-keranjang">
	<td class="nama_produk">
		<?= $this->input->post('nama_produk') ?>
		<input type="hidden" name="nama_produk_hidden[]" value="<?= $this->input->post('nama_produk') ?>">
	</td>
	<td class="kode_produk">
		<?= $this->input->post('kode_produk') ?>
		<input type="hidden" name="kode_produk_hidden[]" value="<?= $this->input->post('kode_produk') ?>">
	</td>
	<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-produk="<?= $this->input->post('nama_produk') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>