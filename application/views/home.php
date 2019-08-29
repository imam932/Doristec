<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Home</title>

  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/main.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/custom.css">
</head>
<body>
  <section>
    <div class="parallax ruangan">
      <div class="parallax-inner">
        <div class="container">
          <div class="row">
            <!-- <div class="main-logo">
            <div class="col-xs-12">
            <img src="./assets/img/logo.png" alt="Logo">
            <label for="logo">Logo</label>
          </div>
        </div> -->
        <div class="main-deskrip">
          <div class="col-xs-12">
            <h1>DORISTEC</h1>
            <p class="header-tagline-h1">( <i>Document Plagiarism Detection</i> )</p>
            <hr>
            <h3>Uji Dokumen Anda Sekarang</h3>
            <p class="header-tagline">Pastikan bahwa Skripsi atau Tugas Akhir anda telah terbebas dari plagiarisme.</p>
            <div class="col-lg-6 col-md-12">
              <a href="#form" class="btn btn-main-form col-lg-12 daftar">Daftar Sekarang</a>
            </div>
            <div class="col-lg-6 col-md-12">
              <a href="#form" class="btn btn-main-form col-lg-12">Masuk</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</section>
<section class="section-panel">
  <div class="container">
    <div class="row section-text">
      <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="box-info">
          <img src="<?= base_url() ?>assets/img/file.png" alt="file"> <!--#6E6D6D-->
          <label for="">Upload Dokumen</label>
          <p>Lakukan upload untuk di simpan kedalam database. Dokumen yang telah tersimpan, akan ditampilkan pada aplikasi.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="box-info">
          <img src="<?= base_url() ?>assets/img/files-selection.png" alt="files"> <!--#6E6D6D-->
          <label for="">Pilih Dokumen</label>
          <p>Untuk memulai proses pengecekan, dilakukan pemilihan dokumen yang ada pada list aplikasi anda. Dokumen yang terpilih akan dijadikan sebagai kandidat deteksi.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="box-info">
          <img src="<?= base_url() ?>assets/img/search-plagiasi.png" alt="deteksi"> <!--#6E6D6D-->
          <label for="">Proses Deteksi</label>
          <p>Kandidat dokumen akan diterima oleh engine, dan engine mulai melakukan proses deteksi plagiarisme pada kandidat dokumen dengan dataset yang ada pada database sistem.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="box-info">
          <img src="<?= base_url() ?>assets/img/report.png" alt="report"> <!--#6E6D6D-->
          <label for="">Laporan Plagiasi</label>
          <p>Hasil dari proses deteksi akan ditampilkan pada halaman laporan hasil deteksi dengan memberikan informasi dari proses deteksi yang berupa nilai - nilai berapa besar plagiarisme yang didapat.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-panel">
  <div class="parallax belajar">
    <div class="parallax-inner">
      <div class="container">
        <div class="row section-form">
          <div class="col-lg-6 col-sm-12">
            <div class="login-form">
              <?php if (!empty($this->session->flashdata('success_message'))) { ?>
                <label class="alert alert-success"><?php echo $this->session->flashdata('success_message'); ?></label>
              <?php } ?>
              <?php if(isset($error_message['pesan_eror'])) { ?>
                <div class="alert alert-danger"><?= $error_message['pesan_eror']; ?></div>
              <?php } ?>
              <h2 class="al-center" id="form">Daftar Sekarang</h2>

              <form method="post" action="<?= base_url() ?>member/member/register">

                <div class="form-group form-box">
                  <div class="col-md-3">
                    <label for="Nama Lengkap">Nama Lengkap</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control form-inbox" name="nama" required>
                  </div>
                </div>
                <?php if(isset($error_message['eror_email'])) { ?>
                  <div class="alert alert-danger"><?= $error_message['eror_email']; ?></div>
                <?php } ?>
                <div class="form-group form-box">
                  <div class="col-md-3">
                    <label for="Email">Email</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control form-inbox" name="email" required>
                  </div>
                </div>
                <div class="form-group form-box">
                  <div class="col-md-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                  </div>
                  <div class="col-md-9">
                    <label class="radio-inline">
                      <input type="radio" class="" name="jenis_kelamin" value="Laki-laki" checked>Laki-laki
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="" name="jenis_kelamin" value="Perempuan">Perempuan
                    </label>
                  </div>
                </div>
                <div class="form-group form-box">
                  <div class="col-md-3">
                    <label for="alamat">Alamat</label>
                  </div>
                  <div class="col-md-9">
                    <textarea name="alamat" rows="2" class="form-control form-inbox" cols="76"></textarea>
                  </div>
                </div>
                <br><br>
                <div class="form-group form-box">
                  <div class="col-md-3">
                    <label for="nohp">Nomor HP</label>
                  </div>
                  <div class="col-md-9">
                    <input type="number" class="form-control form-inbox" name="nohp" required>
                  </div>
                </div>
                <div class="form-group form-box">
                  <div class="col-md-3">
                    <label for="Program Studi">Program Studi</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" name="prodi">
                      <option selected disabled>Pilih Program Studi</option>
                      <option value="D4 Teknik Informatika">D4 Teknik Informatika</option>
                      <option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
                    </select>
                  </div>
                </div>
                <div class="form-group form-box">
                  <div class="col-md-3">
                    <label for="password">Password</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" class="form-control form-inbox" name="password" required>
                  </div>
                </div>
                <div class="form-group form-box">
                  <div class="col-md-3">
                    <label for="Akses">Akses</label>
                  </div>
                  <div class="col-md-9">
                    <label class="radio-inline">
                      <input type="radio" class="" name="akses" value="Mahasiswa" checked>Mahasiswa
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="" name="akses" value="Dosen">Dosen / Panitia
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-main-form col-md-12">Kirim</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="login-form">
              <h2 class="al-center">Masuk ke Sistem</h2>
              <?php if(isset($error_message['invalid_user'])) { ?>
                <div class="alert"><?= $error_message['invalid_user']; ?></div>
              <?php } ?>
              <form method="post" action="<?= base_url() ?>login/process_login">
                <!-- Field Password -->
                <?php if(isset($error_message['email'])) { ?>
                  <div class="alert"><?= $error_message['email']; ?></div>
                <?php } ?>
                <div class="form-group form-box">
                  <div class="col-md-3">
                    <label for="Email">Email</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control form-inbox" name="email">
                  </div>
                </div>

                <!-- Field Password -->
                <?php if(isset($error_message['password'])) { ?>
                  <div class="alert"><?= $error_message['password']; ?></div>
                <?php } ?>
                <div class="form-group form-box log-status">
                  <div class="col-md-3">
                    <label for="Password">Password</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" class="form-control form-inbox" name="password">
                  </div>
                </div>

                <div class="form-group form-box">
                  <button type="submit" class="btn btn-main-form col-lg-12" >Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="footer">
  <div class="container">
    <div class="row section-text text-center">
      <div class="col-lg-4 col-sm-12 col-xs-12">

      </div>
      <div class="col-lg-4 col-sm-12 col-xs-12">
        <p>&copy; Imam Nawawi</p>
        <p>Powered by <a href="https://www.codeigniter.com/" target="_blank">Codeigniter</a> | Picture by <a href="https://unsplash.com" target="_blank">Unsplash</a></p>
      </div>
      <div class="col-lg-4 col-sm-12 col-xs-12">

      </div>
    </div>
  </div>
</section>

<script src="<?= base_url() ?>assets/admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/admin/js/scrollnav.min.umd.js"></script>
</body>
</html>
