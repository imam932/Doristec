<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<!-- <p>
		<a href="<?= base_url().'index.php/admin/Kost/add_data' ?>" class="btn btn-primary btn-sm"> Tambah Kamar</a>
	</p>
	<br> -->

	<?php if(isset($message)) { ?>
		<div class="alert alert-success"><?= $message ?></div>
	<?php } ?>

	<div class="row">
		<!-- panel left -->
		<div class="col-lg-8">
			<div class="">
				<div class="panel-heading">
					<!-- <b>Profil User</b> -->
				</div>

				<label for="">Nama</label>
				<p><?= $view[0]['nama']; ?></p>
				<hr>
				<label for="">Email</label>
				<p><?= $view[0]['email']; ?></p>
				<hr>
				<label for="">Jenis Kelamin</label>
				<p><?= $view[0]['jenis_kelamin']; ?></p>
				<hr>
				<label for="">Tanggal Lahir</label>
				<p><?php $date = new DateTime($view[0]['tgl_lahir']);
				echo $date->format('d-m-Y'); ?></p>
				<hr>
				<label for="">Alamat</label>
				<p><?= $view[0]['alamat']; ?></p>
				<hr>
				<label for="">Program Studi</label>
				<p><?= $view[0]['prodi']; ?></p>
				<hr>
				<label for="">No Handphone</label>
				<p><?= $view[0]['nohp']; ?></p>
				<hr>
				<label for="">Status Akun</label>
				<p><?php echo ($view[0]['status'] != 0 ) ? 'Terverifikasi':'Belum Terverifikasi' ?>
					<a href="<?= base_url().'admin/users/verifikasipanitiabaru/'.$view[0]['id_user']; ?>" class="btn btn-primary btn-sm">
						Verifikasi Sekarang
					</a>
				</p>
				<hr>
			</div>
		</div>
	</div>
</div>
</div>
</div>
