<div class="col-lg-12">

  <div>
    <a href="<?= base_url() ?>admin/dataset/uploaddokumen" class="btn btn-primary">Upload Datasheet Baru</a>
    <a href="<?= base_url() ?>admin/dataset/uploaddokumencustom" class="btn btn-primary">Upload Datasheet Baru Custom</a>
  </div>
  <br>
  <?php if (!empty($this->session->flashdata('success_message'))) { ?>
    <label class="alert alert-success"><?php echo $this->session->flashdata('success_message'); ?></label>
  <?php } ?>
  <?php if (!empty($this->session->flashdata('error_message'))) { ?>
    <label class="alert alert-success"><?php echo $this->session->flashdata('error_message'); ?></label>
  <?php } ?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Kumpulan Dataset</h3>
    </div>
    <div class="panel-body">
      <div class="list-group">
        <table class="table table-bordered" id="datatable">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul Penelitian</th>
              <th>Kata Kunci</th>
              <th>Tahun</th>
              <th>Prodi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
             foreach ($view as $value) :?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $value['judul']; ?></td>
              <td><?php
              $array = explode(",", $value['keyword']);
              foreach ($array as $row) {?>
                <label class="label label-info"><?= $row; ?></label>
              <?php } ?></td>
              <td><?= $value['tahun']; ?></td>
              <td><?= $value['prodi']; ?></td>
              <td>
                <a href="<?= base_url().'admin/dataset/view/'.$value['id_data']; ?>" class="btn btn-info btn-sm">
                  View
                </a>
                <a href="<?= base_url().'admin/dataset/edit/'.$value['id_data']; ?>" class="btn btn-primary btn-sm">
                  Edit
                </a>
                <a href="<?= base_url().'admin/dataset/delete/'.$value['id_data']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapusnya ?')">
                  Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
            </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
