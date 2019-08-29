<div class="col-lg-12">

  <div>
    <a href="<?= base_url() ?>dokumen/upload" class="btn btn-primary">Upload Dokumen Baru</a>
  </div>
  <br>

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Dokumen Anda</h3>
    </div>
    <div class="panel-body">
      <div class="list-group">
        <table id="datatabel" class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul Penelitian</th>
              <th>Kata Kunci</th>
              <th>Tahun</th>
              <th>Program Studi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
             foreach ($view as $value) : ?>
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
                <a href="<?= base_url().'member/dokumen/view/'.$value['id_dokumen_user']; ?>" class="btn btn-info btn-sm">
                  Lihat
                </a>
                <a href="<?= base_url().'member/dokumen/edit/'.$value['id_dokumen_user']; ?>" class="btn btn-primary btn-sm">
                  Edit
                </a>
                <a href="<?= base_url().'member/dokumen/delete/'.$value['id_dokumen_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapusnya ?')">
                  Hapus
                </a>
            </tr>
          <?php endforeach; ?>
        </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
