<script src="upup.min.js"></script>
	<script>
		UpUp.start({
			'cache-version' : 'v2',

			'content-url': '<?php base_url($this->uri->segment(1)) ?>',
			'content':'Cannot reach site, please cek your connection.',
			'service-worker-url':'upup.sw.min.js'
		});
	</script>

<script src="<?= base_url('sb-admin') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('sb-admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('sb-admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('sb-admin') ?>/js/sb-admin-2.min.js"></script>
