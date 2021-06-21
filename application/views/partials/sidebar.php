<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
				<div class="sidebar-brand-text mx-3">Sales Report</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('dashboard') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<hr class="sidebar-divider">

			<div class="sidebar-heading">
				Master
			</div>
			
			<li class="nav-item <?= $aktif == 'kategori' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('kategori') ?>">
					<i class="fas fa-fw fa-list"></i>
					<span>Master Kategori</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'produk' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('produk') ?>">
					<i class="fas fa-fw fa-box"></i>
					<span>Master Produk</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'cabang' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('cabang') ?>">
					<i class="fas fa-fw fa-store"></i>
					<span>Master Cabang</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'kasir' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('kasir') ?>">
					<i class="fas fa-fw fa-users"></i>
					<span>Master Kasir</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'store_manager' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('store_manager') ?>">
					<i class="fas fa-fw fa-users"></i>
					<span>Master Store Manager</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">
	
			<div class="sidebar-heading">
				Transaksi
			</div>

			<li class="nav-item <?= $aktif == 'laporan' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('laporan') ?>">
					<i class="fas fa-fw fa-file-invoice"></i>
					<span>Laporan Penjualan</span></a>
			</li>


			<hr class="sidebar-divider">
			<?php if ($this->session->login['role'] == 'admin'): ?>
				<!-- Heading -->
				<div class="sidebar-heading">
					Pengaturan
				</div>

				<li class="nav-item <?= $aktif == 'admin' ? 'active' : '' ?>">
					<a class="nav-link" href="<?= base_url('admin') ?>">
						<i class="fas fa-fw fa-users"></i>
						<span>Manajemen Admin</span></a>
				</li>

				<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<?php endif; ?>

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>