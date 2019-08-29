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
    <form role="form" action="<?= base_url().'member/dokumen/edit/'.$view[0]['id_dokumen_user']; ?>" method="post" enctype="multipart/form-data">
      <?php if (!empty($this->session->flashdata('error_message'))) { ?>
        <label class="alert alert-success"><?php echo $this->session->flashdata('error_message'); ?></label>
      <?php } ?>
      <div class="form-group">
        <label class="col-lg-2">Judul</label>
        <div class="col-lg-10">
          <textarea name="judul" rows="3" cols="80" class="form-control"><?= $view[0]['judul'] ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2">Ringkasan / Abstrak</label>
        <div class="col-lg-10">
          <textarea name="ringkasan" rows="5" cols="80" class="form-control"><?= $view[0]['ringkasan'] ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2">Kata Kunci</label>
        <div id="tags" class="col-lg-10">
          <input type="text" name="keyword" id="tags-input" class="form-control" value="<?= $view[0]['keyword'] ?>"/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2">Tahun</label>
        <div class="col-lg-10">
          <select name="tahun" class="form-control">
            <?php
            $settahun = set_value('tahun', $view[0]['tahun']);
            foreach ($tahun as $row) {
              $selected = $row->tahun == $settahun ? "selected" : "" ?>
              <option value="<?= $row->tahun ?>" <?= $selected ?>><?= $row->tahun ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2">Program Studi</label>
        <div class="col-lg-10">
          <select name="prodi" class="form-control">
            <?php if ($view[0]['prodi'] == 'D4 Teknik Informatika') {?>
              <option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
              <option value="D4 Teknik Informatika" selected>D4 Teknik Informatika</option>
            <?php }else{ ?>
              <option value="D3 Manajemen Informatika" selected>D3 Manajemen Informatika</option>
              <option value="D4 Teknik Informatika">D4 Teknik Informatika</option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2">File</label>
        <div class="col-lg-10" style="display:flex;">
          <div onclick='onShowPenelitian()' style="cursor:pointer;">
            <?php if($view[0]['file'] != null){
              echo 'Available';
            }else {
              echo 'Not Available';
            } ?>
          </div>
          <a href="<?= base_url().'member/dokumen/editfile/'.$view[0]['id_dokumen_user']; ?>" class="btn btn-info btn-sm" style="margin-left:30px">
            Edit File
          </a>
        </div>
      </div>

      <div class="col-lg-12 text-center">
        <input type="submit" name="submit" class="btn btn-primary btn-upload" value="Submit">
        <button type="button" onclick="window.history.back()" class="btn btn-warning btn-upload">Kembali</button>
      </div>

    </form>

  </div>

</div>
<!-- /.row -->
<!-- Modal -->
<div class="modal fade" id="ModalShowPenelitian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Isi File</h3>
      </div>
      <div class="modal-body">
        <p id="penelitian"></p>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
var penelitian = <?= json_encode($view[0]['penelitian']) ?>;
  function onShowPenelitian() {
    document.getElementById("penelitian").innerHTML = penelitian;

    $('#ModalShowPenelitian').modal('show');
  }
</script>
