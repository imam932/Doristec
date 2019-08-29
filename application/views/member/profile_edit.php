<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <!-- panel left -->
    <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>
    <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <b>Edit Profile</b>
          </div>

          <form class="form-horizontal" action="<?= base_url().'member/setting/editProfile/'.$user[0]['id_user'] ?>" method="post">
            <div class="form-group">
              <label for="inputNama" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" value="<?= $user[0]['nama'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control" value="<?= $user[0]['email'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputJenisKelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <label class="radio-inline">
                  <input type="radio" class="" name="jenis_kelamin" value="Laki-laki" <?= ($user[0]['jenis_kelamin'] == 'Laki-laki')? 'checked' : '' ?>>Laki-laki
                </label>
                <label class="radio-inline">
                  <input type="radio" class="" name="jenis_kelamin" value="Perempuan" <?= ($user[0]['jenis_kelamin'] == 'Perempuan')? 'checked' : '' ?>>Perempuan
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggalLahir" class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                  <input class="form-control" size="16" type="text" value="<?= $user[0]['tgl_lahir'] ?>" name="tgl_lahir">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <textarea name="alamat" rows="2" class="form-control form-inbox" cols="76"><?= $user[0]['alamat'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputNomorHP" class="col-sm-2 control-label">Nomor HP</label>
              <div class="col-sm-10">
                <input type="number" class="form-control form-inbox" name="nohp" value="<?= $user[0]['nohp'] ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                <input type="submit" value="Simpan" class="btn btn-primary">
              </div>
            </div>
          </form>

      </div>
    </div>
  </div>
</div>
</div>
