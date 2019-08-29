<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($message)) { ?>
      <div class="alert alert-success"><?= $message ?></div>
    <?php } ?>

		<div class="row">
			<div class="col-lg-12">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>E-Mail</th>
							<th>Tanggal Lahir</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no =1;
						foreach ($view as $row) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row['nama'] ?></td>
								<td><?= $row['email'] ?></td>
								<td><?= $row['prodi'] ?></td>
								<td>
									<a href="<?= base_url().'admin/Users/viewPanitiaBaru/'.$row['id_user'] ?>" class="btn btn-primary btn-sm">
										Lihat
									</a>
									<a href="<?= base_url().'admin/Users/deleteUsers/'.$row['id_user'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Users ?')">
										Delete
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
