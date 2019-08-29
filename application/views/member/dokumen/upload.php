<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/jquery.tagsinput.min.css">
<script src="<?= base_url() ?>assets/admin/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#tags-input').tagsInput({width:'auto'});
});
</script>
<div class="row">
  <div class="col-lg-12">
    <?php if (!empty($this->session->flashdata('success_message'))) { ?>
      <label class="alert alert-success"><?php echo $this->session->flashdata('success_message'); ?></label>
    <?php } ?>
    <form role="form" action="<?= base_url() ?>dokumen/upload" method="post" enctype="multipart/form-data">
      <?php if (!empty($this->session->flashdata('error_message'))) { ?>
        <label class="alert alert-success"><?php echo $this->session->flashdata('error_message'); ?></label>
      <?php } ?>
      <div class="form-group">
        <label class="col-lg-2">Judul Penelitian</label>
        <div class="col-lg-10">
          <textarea name="judul" rows="3" cols="80" class="form-control" required></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2">Ringkasan / Abstrak</label>
        <div class="col-lg-10">
          <textarea name="ringkasan" rows="5" cols="80" class="form-control"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2">Kata Kunci</label>
        <div id="tags" class="col-lg-10">
          <input type="text" name="keyword" value="" id="tags-input" class="form-control" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2">Tahun</label>
        <div class="col-lg-10">
          <input type="number" name="tahun" class="form-control" value="<?= $tahun->tahun; ?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2">Program Studi</label>
        <div class="col-lg-10">
          <input type="text" name="prodi" class="form-control" value="<?= $this->session->userdata('logged_in')['prodi']; ?>" readonly>
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2">Pilih File</label>
        <div class="col-lg-10">
          <input type="file" name="filedoc" class="form-control">
          <p class="help-block">Pilih file PDF atau Word.</p>
        </div>
      </div>

      <div class="col-lg-12 text-center">
        <input type="submit" class="btn btn-primary btn-upload" value="Submit">
        <button type="reset" class="btn btn-warning btn-upload">Reset</button>
      </div>

    </form>

  </div>

</div>
<!-- /.row -->
