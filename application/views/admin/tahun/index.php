<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($message)) { ?>
			<div class="alert alert-success alert-link"><?=$message?></div>
		<?php } ?>

		<div class="row">
			<div class="col-lg-6">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Tahun</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						foreach ($tahun as $row) {
							?>
							<tr>
								<td><?= $no++; ?></td>
									<td>
										<form id="form<?=$row->id_tahun?>" action="<?=base_url()?>admin/Tahun/edit/<?=$row->id_tahun?>" method="post">
										<div class="form-group <?= empty(form_error('tahun')) || set_value('id_tahun') != $row->id_tahun ? '' : 'has-error'  ?>">
											<input type="hidden" name="id_tahun" value="<?= $row->id_tahun ?>">
											<input type="text" class="form-control" name="tahun" placeholder="Tahun" value="<?= set_value('id_tahun') == $row->id_tahun ? set_value('tahun', $row->tahun) : $row->tahun ?>">
											<span class="hidden"><?= $row->tahun; ?></span>
											<div class="form-error"><?= empty(form_error('tahun')) || set_value('id_tahun') != $row->id_tahun ? '' : form_error('tahun') ?></div>
										</div>
									</form>
									</td>
									<td>
										<div class="radio">
											<input type="checkbox" name="publish-status" class="switch-art" id="<?= $row->id_tahun ?>" <?php if($row->status == true) echo "checked" ?>>
										</div>
									</td>
								<td>
									<div class="btn-group btn-group-sm">
										<input form="form<?=$row->id_tahun?>" type="submit" value="Edit" class="btn btn-primary">
										<a href="<?=base_url()?>admin/Tahun/delete/<?=$row->id_tahun?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Tahun ?')">
											Delete
										</a>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- panel left -->
			<div class="col-lg-6">
				<h4>Tambah tahun</h4>
				<form class="" action="<?= base_url(); ?>admin/Tahun/store" method="post">
					<div class="input-group <?= empty(form_error('tahun')) || !empty(set_value('id_tahun')) ? '' : 'has-error' ?>">
						<input type="text" class="form-control" placeholder="Tahun" name="tahun" value="<?= set_value('tahun') ?>">
						<span class="input-group-btn">
							<button class="btn btn-primary" name="submit">Submit</button>
						</span>
					</div>
					<div class="form-error"><?= empty(form_error('tahun')) || !empty(set_value('id_tahun')) ? '' : form_error('tahun') ?></div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
