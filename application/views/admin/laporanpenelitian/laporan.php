<div class="col-lg-12">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Daftar Laporan</h3>
    </div>
    <div class="panel-body">
      <div class="list-group">
        <table id="datatable" class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul Penelitian</th>
              <th>Tahun</th>
              <th>Waktu Selesai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($view as $value) {?>
            <tr>
              <td><?= $i++; ?></td>
                <td><?= $value['judul'] ?></td>
                <td><?= $value['tahun'] ?></td>
                <td><?php $waktu = new DateTime($value['created_at']);
                echo $waktu->format('d-M-Y h:i:s');
                 ?></td>
                 <td><a href="<?= base_url().'admin/Mahasiswa/detail/'.$value['id_antrian_dokumen'] ?>" class="btn btn-warning btn-sm">Lihat Hasil</a>
                   </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->
