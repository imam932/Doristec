<div class="row">
  <div class="col-lg-12">
    <form role="form" action="<?= base_url().'member/dokumen/editfile/'.$view[0]['id_dokumen_user'] ?>" method="post" enctype="multipart/form-data">
      <?php if (!empty($this->session->flashdata('error_message'))) { ?>
        <label class="alert alert-success"><?php echo $this->session->flashdata('error_message'); ?></label>
      <?php } ?>

      <div class="form-group">
        <label class="col-lg-2">Pilih File</label>
        <div class="col-lg-10">
          <input type="file" name="filedoc" class="form-control">
          <p class="help-block">Pilih file PDF atau Word.</p>
        </div>
      </div>

      <div class="col-lg-12 text-center">
        <button type="button" onclick="window.history.back()" class="btn btn-warning btn-upload">Kembali</button>
        <input type="submit" name="submit" class="btn btn-primary btn-upload" value="Submit">
      </div>

    </form>
    <hr>

  </div>

  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"><?= $view[0]['judul'] ?></h3>
      </div>
      <div class="panel-body" style="overflow-y: scroll; height:800px;">
        <p><?= $view[0]['penelitian'] ?></p>
      </div>
    </div>
  </div>

</div>
<!-- /.row -->
