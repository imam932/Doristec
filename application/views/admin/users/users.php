<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<p>
			<a href="<?= base_url().'admin/Users/New' ?>" class="btn btn-primary btn-sm"> Create New</a>
		</p>
		 <br>

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
						foreach ($user as $row) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row->nama ?></td>
								<td><?= $row->email ?></td>
								<td><?= $row->tgl_lahir ?></td>
								<td>
									<a href="<?= base_url().'admin/Users/editUsers/'.$row->id ?>" class="btn btn-primary btn-sm">
										Edit
									</a>
									<a href="<?= base_url().'admin/Users/deleteUsers/'.$row->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Users ?')">
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
