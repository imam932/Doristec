<div class="col-lg-12">

  <div class="panel panel-info">
    <!-- Default panel contents -->
    <div class="panel-heading">Lihat data lengkap</div>

    <!-- Table -->
    <table class="table">
      <tr>
        <th scope="row" style="width:180px;">Judul</th>
        <td><?= $view[0]['judul']; ?></td>
      </tr>
      <tr>
        <th scope="row">Keywords</th>
        <td><?php
          $array = explode(",", $view[0]['keyword']);
          foreach ($array as $value) {?>
            <label class="label label-info"><?= $value; ?></label>
          <?php } ?></td>
      </tr>
      <tr>
        <th scope="row">Tahun</th>
        <td><?= $view[0]['tahun']; ?></td>
      </tr>
      <tr>
        <th scope="row">Program Studi</th>
        <td><?= $view[0]['prodi']; ?></td>
      </tr>
      <tr>
        <th scope="row">Ringkasan / Abstrak</th>
        <td><?= $view[0]['ringkasan']; ?></td>
      </tr>
      <tr>
        <th scope="row">File</th>
        <td>
          <div>
            <?php if($view[0]['file'] != null){
              echo "<label class='label label-info' onclick='onShowPenelitian()' style='cursor:pointer;'>Available</label>";
            }else {
              echo '<label class="label label-warning">Not Available</label>';
            } ?>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Pertama Upload</th>
        <td><?php $date_create = new DateTime($view[0]['created_at']);
        echo $date_create->format('d-M-Y h:i:s') ?> WIB</td>
      </tr>
      <tr>
        <th scope="row">Terakhir di update</th>
        <td><?php if($view[0]['updated_at'] != null){
          $date_create = new DateTime($view[0]['updated_at']);
          echo $date_create->format('d-M-Y h:i:s').' WIB';
        }else {
          echo "-";
        } ?></td>
      </tr>
    </table>
  </div>
  <button type="button" onclick="window.history.back()" class="btn btn-warning">Kembali</button>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->

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
