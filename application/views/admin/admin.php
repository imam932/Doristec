<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<p>
			<a href="<?= base_url().'admin/Admin/New' ?>" class="btn btn-primary btn-sm"> New Admin</a>
		</p> <br>

		<?php if(isset($message)) { ?>
      <div class="alert alert-success"><?= $message ?></div>
    <?php } ?>

		<div class="row">
			<div class="col-lg-12">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Birth</th>
							<th>address</th>
							<th>Phone</th>
							<th>Admin</th>
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
								<td><?= $row->name ?></td>
								<td><?php
								if ($row->gender == 1) {
									echo "Male";
								}else {
									echo "Female";
								}
								?></td>
								<td><?= $row->birth ?></td>
								<td><?= $row->address ?></td>
								<td><?= $row->phone ?></td>
								<td><?php if($row->admin) echo 'Yes'; else echo 'No';  ?></td>
								<td>
									<a href="<?= base_url().'admin/Admin/editAdmin/'.$row->id_user ?>" class="btn btn-primary btn-sm">
										Edit
									</a>
									<a href="<?= base_url().'admin/Admin/deleteAdmin/'.$row->id_user ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete User ?')">
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
