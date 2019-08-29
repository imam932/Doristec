<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Doristec | Literatur</title>
  <!-- Favicon -->

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/font-awesome/css/font-awesome.css">

  <link href="<?= base_url() ?>assets/admin/css/sb-admin.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url( )?>assets/admin/css/jquery.paginate.css">
  <link rel="stylesheet" href="<?= base_url( )?>assets/admin/css/bootstrap-switch.min.css">
  <!-- Vendor -->
  <script src="<?= base_url() ?>assets/admin/js/jquery.js"></script>
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav id="nav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= base_url().'admin/Dashboard' ?>">
          Doristec Admin
        </a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        <li class="dropdown">


        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $this->session->userdata('logged_inAdm')['nama']; ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?= base_url().'admin/setting' ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?= base_url().'logout/proses/admin' ?>" onclick="return confirm('Yakin ingin keluar dari aplikasi ini ?')"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="active">
            <a href="<?= base_url() ?>admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
          </li>
          <li>
            <a href="<?= base_url().'admin/Mahasiswa/laporanPenelitian' ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Laporan Penelitian</a>
          </li>
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#mahasiswad3" class="collapsed" aria-expanded="false"><i class="fa fa-fw fa-arrows-v"></i> D3 Manajemen Informatika <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="mahasiswad3" class="collapse" aria-expanded="false" style="height: 0px;">
              <li>
                <a href="<?= base_url() ?>admin/mahasiswa/sudahUploadD3">Yang sudah upload</a>
              </li>
              <li>
                <a href="<?= base_url() ?>admin/users/mhsd3">D3 Manajemen Informatika</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#mahasiswad4" class="collapsed" aria-expanded="false"><i class="fa fa-fw fa-arrows-v"></i> D4 Teknik Informatika <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="mahasiswad4" class="collapse" aria-expanded="false" style="height: 0px;">
              <li>
                <a href="<?= base_url() ?>admin/mahasiswa/sudahUploadD4">Yang sudah upload</a>
              </li>
              <li>
                <a href="<?= base_url() ?>admin/users/mhsd4">D4 Teknik Informatika</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#master" class="collapsed" aria-expanded="false"><i class="fa fa-fw fa-arrows-v"></i> Master <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="master" class="collapse" aria-expanded="false" style="height: 0px;">
              <li>
                <a href="<?= base_url() ?>admin/dataset"><i class="fa fa-fw fa-bar-chart-o"></i>Daftar Dataset</a>
              </li>
              <li>
                <a href="<?= base_url() ?>admin/tahun"><i class="fa fa-fw fa-bar-chart-o"></i>Tahun</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="<?= base_url().'admin/Users/panitiaBaru' ?>"><i class="fa fa-fw fa-users"></i> Verifikasi Panitia Baru <span class="badge"><?php echo count($user_baru); ?></span></a>
          </li>
          <li>
            <a href="<?= base_url().'admin/Users/Panitia' ?>"><i class="fa fa-fw fa-users"></i> Panitia</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              Data <small><?= $desc; ?></small>
            </h1>
          </div>
        </div>
        <!-- /.row -->

        <!-- ADD YOUR CONTENT HERE -->
        <?= $content; ?>
        <!-- END OF CONTENT -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->
  <script type="text/javascript">
  $(document).ready(function() {
    // data table
    $('#datatable').DataTable();
  });
  </script>

  <!-- Include JS -->
  <!-- Bootstrap Core JavaScript -->
  <script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/admin.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/bootstrap-filestyle.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/list.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/list.pagination.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/bootstrap-switch.min.js"></script>
</body>

</html>
