<div class="col-lg-12">

  <div>
    <a href="<?= base_url() ?>tes-plagiasi/uji" class="btn btn-primary">Pilih dokumen untuk di uji</a>
  </div>
  <br>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>
    </div>
    <div class="panel-body">
      <div class="list-group">
        <table id="datatabel" class="table table-bordered">
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
                 <td><a href="<?= base_url().'member/tesdokumen/detail/'.$value['id_antrian_dokumen'] ?>" class="btn btn-warning btn-sm">Lihat Hasil</a>
                   <!-- <a href="<?= base_url().'member/tesdokumen/sertifikat/'.$value['id_antrian_dokumen'] ?>" class="btn btn-info btn-sm" target="_blank">Sertifikat</a> -->
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
