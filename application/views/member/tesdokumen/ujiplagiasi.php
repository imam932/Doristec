<div class="row">
  <div class="col-lg-12">

    <form role="form" action="<?= base_url() ?>member/tesdokumen/prosesFilter" method="post">
      <div class="form-group">
        <label>Pilih Skripsi</label>
        <select class="form-control" name="id_dokumen_user">
          <?php foreach ($uji as $value) {?>
            <option value="<?= $value['id_dokumen_user']; ?>"><?= $value['judul']; ?></option>
          <?php } ?>
        </select>
      </div>

      <button type="button" onclick="window.history.back()" class="btn btn-warning">Batal</button>
      <input type="submit" class="btn btn-primary" value="Proses" name="submit">
    </form>
  </div>
</div>
<!-- /.row -->
