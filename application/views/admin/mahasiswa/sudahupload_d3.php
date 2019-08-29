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
              <th>Tahun</th>
              <th>Judul</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
             foreach ($view as $value) :?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $value['nama']; ?></td>
              <td><?= $value['tahun']; ?></td>
              <td><?= $value['judul']; ?></td>
            </tr>
          <?php endforeach; ?>
            </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
