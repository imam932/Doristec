<?php
// menghitung hasil dari dataset
$totalkata = 0;
$totalangka = 0;
$angka = array();
foreach ($dataset as $value) {
  array_push($angka, $value['similarity_angka']);
  $pecah_kata = explode("###",$value['similarity_text']);
  $hit_total_kata = 0;
  foreach ($pecah_kata as $value_kata) {
    // var_dump($value_kata);
    $hitungkata = str_word_count($value_kata, 1); //1 untuk membuat array dan mengatur index array, [Ketika returnformat diatur ke 1, itu akan mengembalikan array], [Ketika returnformat diatur ke 2, itu akan mengembalikan array asosiatif]
    $hit_total_kata += count($hitungkata);
  }
  $totalkata += $hit_total_kata;
  // var_dump($totalkata);
  $totalangka += $value['similarity_angka'];
}

$ordered_angka = $angka;
rsort($ordered_angka); //pembuatan ranking pada dataset nilai 'similarity_angka'
$dataset_ranking = array();

foreach ($ordered_angka as $key_angka => $value_angka) {
  foreach ($dataset as $key => $value) {
    if ($value['similarity_angka'] == $value_angka) { //penyesuaian dataset yang akan di tampilkan sesuai ranking tertinggi
      array_push($dataset_ranking, $value);
    }
  }
}
?>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info panel-split col-lg-6">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Detail Dokumen</h3>
      </div>
      <table class="table">
        <tr>
          <th>Judul</th>
          <td><p><?= $detail[0]['judul']; ?></p></td>
        </tr>
        <tr>
          <th>Tahun</th>
          <td><p><?= $detail[0]['tahun']; ?></p></td>
        </tr>
        <tr>
          <th>Kata Kunci</th>
          <td><?php
          $array = explode(",", $detail[0]['keyword']);
          foreach ($array as $value) {?>
            <label class="label label-info"><?= $value; ?></label>
          <?php } ?></td>
        </tr>
      </table>
    </div>

    <div class="panel panel-success panel-split col-lg-6">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Keterangan</h3>
      </div>
      <div class="panel-body col-lg-12 text-center">
        <div class="col-lg-12">
          <h1><?php
          $totalkata_datauji = count(str_word_count($detail[0]['penelitian'], 1));
          echo round(($totalkata*100)/$totalkata_datauji, 0);
          ?> %</h1>
          <p class="help-block">Total Plagiarisme Pada Dokumen Anda</p>
        </div>
        <div class="col-lg-6">
          <h1><?= round(max($ordered_angka), 2); ?> %</h1>
          <p class="help-block">Plagiarisme Tertinggi</p>
        </div>
        <div class="col-lg-6">
          <h1><?= round(min($ordered_angka),2); ?> %</h1>
          <p class="help-block">Plagiarisme Terendah</p>
        </div>
        <div class="col-lg-6">
          <h3><?= $totalkata; ?></h3>
          <p class="help-block">Total Analisa Kata</p>
        </div>
        <div class="col-lg-6">
          <h3><?= count($dataset); ?></h3>
          <p class="help-block">Total Datasheet Kandidat</p>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</div>

<div class="row">
  <div class="col-lg-12">

    <div class="panel panel-warning">
      <div class="panel-body">
        <h3 class="text-center">Tampilkan</h3>
        <hr>
        <div class="col-lg-7" style="overflow-y: scroll; height:800px;">
          <p><?= $detail[0]['penelitian']; ?></p>
        </div>
        <div class="col-lg-5" style="overflow-y: scroll; height:800px;">
          <?php

          foreach ($dataset_ranking as $value) {

            ?>
            <div class="poin-similarity" onclick='onDatasetView(<?= json_encode($value) ?>)'>
              <p style="text-transform: uppercase;"><?= $value['judul'] ?></p>
              <div class="">
                <label class="prosentasi"><?= round($value['similarity_angka'],2); ?>%</label>
                <label for="kata" class="hitung-kata">
                  <?php
                  $total_pecahkata = 0;
                  $pecah_kata = explode("###",$value['similarity_text']);
                  foreach ($pecah_kata as $val_kata) {
                    $hkata = str_word_count($val_kata, 2);
                    $total_pecahkata += count($hkata);
                  }
                  echo $total_pecahkata;
                  ?> Kata
                </label>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalDataset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><b id="judul"></b></h3>
      </div>
      <div class="modal-body">
        <table border="0" class="table table-striped">
          <tr>
            <td>Hasil Angka :</td>
            <td><h4 id="angka"></h4></td>
          </tr>
          <tr>
            <td>Hasil Teks :</td>
            <td id="text">
            </td>
          </tr>
          <tr>
            <td>Tahun :</td>
            <td><p id="tahun"></p></td>
          </tr>
          <tr>
            <td>Program Studi :</td>
            <td><p id="prodi"></p></td>
          </tr>
          <tr>
            <td>Kata Kunci : </td>
            <td>
              <p id="keyword"></p>
            </td>
          </tr>
          <tr>
            <td>Waktu : </td>
            <td><p id="waktu"></p></td>
          </tr>
        </table>

      </div>

    </div>
  </div>
</div>
<!-- /.container-fluid -->
<script type="text/javascript">
function onDatasetView(dataset) {
  // console.log(dataset);
  document.getElementById("judul").innerHTML = dataset.judul;
  document.getElementById("angka").innerHTML = Math.round(dataset.similarity_angka)+'%';
  document.getElementById("tahun").innerHTML = dataset.tahun;
  document.getElementById("prodi").innerHTML = dataset.prodi;
  document.getElementById("waktu").innerHTML = dataset.created_at;

  var pisah_hasil_text = dataset.similarity_text.split("###");
  document.getElementById("text").innerHTML = "";
  pisah_hasil_text.forEach(function (value){
    if (value === "") {
    }else {
      document.getElementById("text").innerHTML +=`
      <p class="hasil_text">${value}</p>
      `
    }
  })

  var keyword = dataset.keyword.split(",");
  document.getElementById("keyword").innerHTML = "";
  keyword.forEach(function (value) {
    document.getElementById("keyword").innerHTML += `
    <span class="label label-info">${value}</span>
    `
  })
  $('#ModalDataset').modal('show');
}
</script>
