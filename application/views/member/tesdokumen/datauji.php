<div class="col-lg-12">

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Dokumen yang akan di uji</h3>
  </div>
  <div class="panel-body">
    <table class="table table-bordered">
      <tbody>
            <tr>
              <th>Judul</th>
              <td><?= $dokumenuji[0]['judul'] ?></td>
            </tr>
            <tr>
              <th>Tahun</th>
              <td><?= $dokumenuji[0]['tahun'] ?></td>
            </tr>
            <tr>
              <th>Prodi</th>
              <td><?= $dokumenuji[0]['prodi'] ?></td>
            </tr>
            <tr>
              <th>Kata Kunci</th>
              <td><?php
                $array = explode(",", $dokumenuji[0]['keyword']);
                foreach ($array as $value) {?>
                  <label class="label label-info"><?= $value; ?></label>
                <?php } ?></td>
            </tr>
            <tr>
              <th>Tanggal Upload</th>
              <td><?php
              $date = new DateTime($dokumenuji[0]['created_at']);
              echo $date->format('d-M-Y h:i:s');
               ?></td>
            </tr>
        </tbody>
      </table>
  </div>
</div>

  <div class="panel panel-warning">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Dataset Terpilih</h3>
    </div>
    <div class="panel-body">
      <div class="list-group">
        <form action="<?= base_url() ?>member/tesdokumen/executeCheker" method="post">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul</th>
              <th>Program Studi</th>
              <th>Tahun</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($datauji as $value) {
              if (!empty($value)) {
                ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $value['judul'] ?></td>
                  <td><?= $value['prodi'] ?></td>
                  <td><?= $value['tahun'] ?></td>
                  <input type="hidden" name="id_data[]" value="<?= $value['id_data']; ?>">
                </tr>
              <?php } } ?>
              <input type="hidden" name="id_dokumen_user" value="<?= $dokumenuji[0]['id_dokumen_user']; ?>">
            </tbody>
          </table>
          <div>
            <input type="submit" class="btn btn-primary" value="Uji Sekarang" name="submit">
          </div>
        </form>
          <br>
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container-fluid -->
