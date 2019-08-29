<div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-green">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-tasks fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= count($viewd3); ?></div>
            <div>D3-MI Sudah Upload</div>
          </div>
        </div>
      </div>
      <a href="<?= base_url() ?>admin/mahasiswa/sudahUploadD3">
        <div class="panel-footer">
          <span class="pull-left">Lihat Detail</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-tasks fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= count($viewd4); ?></div>
            <div>D4-TI Sudah Upload</div>
          </div>
        </div>
      </div>
      <a href="<?= base_url() ?>admin/mahasiswa/sudahUploadD4">
        <div class="panel-footer">
          <span class="pull-left">Lihat Detail</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-yellow">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= count($viewusr); ?></div>
            <div>Total Mahasiswa Terdaftar</div>
          </div>
        </div>
      </div>
      <a href="<?= base_url() ?>admin/mahasiswa/sudahUploadD4">
        <div class="panel-footer">
          <span class="pull-left">Lihat Detail</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-red">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= count($viewpanitia); ?></div>
            <div>Total Panitia Terdaftar</div>
          </div>
        </div>
      </div>
      <a href="<?= base_url() ?>admin/users/panitia">
        <div class="panel-footer">
          <span class="pull-left">Lihat Detail</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-8 col-md-12">
    <div class="panel panel-green">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= count($viewpenelitian); ?></div>
            <div>Total Penelitian Teruji</div>
          </div>
        </div>
      </div>
      <a href="<?= base_url() ?>admin/mahasiswa/laporanpenelitian">
        <div class="panel-footer">
          <span class="pull-left">Lihat Detail</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-yellow">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-user fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= $this->session->userdata('logged_inAdm')['nama']; ?></div>
            <div><?= $this->session->userdata('logged_inAdm')['email']; ?></div>
            <div><?= $this->session->userdata('logged_inAdm')['prodi']; ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
