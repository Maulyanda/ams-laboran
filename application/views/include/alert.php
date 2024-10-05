		<!-- Sweet Alert -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/sweetalert2/sweetalert2.css'); ?>">
		<!-- End Sweet Alert -->
		<!-- Sweet Alert JS & CSS in Footer -->
		<script src="<?= base_url('assets/sweet/sweetalert2.all.js') ?>"></script>
		<script src="<?= base_url('assets/sweet/sweetalert2.all.min.js') ?>"></script>
		<script src="<?= base_url('assets/sweet/sweetalert2.js') ?>"></script>
		<script src="<?= base_url('assets/sweet/sweetalert2.min.js') ?>"></script>
		<!-- Script Alert Notif -->
		<!-- <script src="<?= base_url('assets/sweet/message.js') ?>"></script> -->
		<!-- End Sweet Alert JS & CSS in Footer -->
		<!-- /////////////////////////////////TINDAKAN///////////////////////////////////// -->


		<?php if ($this->session->flashdata('success')) : ?>
			<script>
				Swal.fire({
					title: 'Notifikasi!',
					text: '<?php echo $this->session->flashdata('success') ?>',
					imageUrl: '<?= base_url('assets/svg/files-sent-animate.svg') ?>',
					imageWidth: 400,
					imageHeight: 250,
					imageAlt: 'Custom image',
				});
			</script>
		<?php endif; ?>
