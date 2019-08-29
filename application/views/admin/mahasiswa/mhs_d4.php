<div class="col-lg-12">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Mahasiswa</h3>
    </div>
    <div class="panel-body">
      <div class="list-group">
        <table id="datatable" class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Jenis kelamin</th>
              <th>Alamat</th>
              <th>Prodi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
             foreach ($view as $value) :?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $value['nama']; ?></td>
              <td><?= $value['jenis_kelamin']; ?></td>
              <td><?= $value['alamat']; ?></td>
              <td><?= $value['prodi']; ?></td>
            </tr>
          <?php endforeach; ?>
            </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
