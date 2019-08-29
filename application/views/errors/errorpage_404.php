<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Error Page</title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.css">
  <style media="screen">
  .card_w{
    border: 0;
    border-radius: 2px;
    position: relative;
    display: block;
    margin-bottom: 0.75rem;
    background-color: #fff;
    width: 70%;
    margin-top: 10%;
    margin-left: 15%;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
  }
  .text_center{
    text-align: center;
  }
  .card_blok{
    padding: 1em;
  }
  .card_title{
    margin-bottom: 1em;
    padding-bottom: 1em;
    border-bottom: 1px solid rgba(0,0,0,0.100);
  }
  span{
    font-size: 17px;
  }
  .card_isi{
    padding: .5em;
    text-transform: lowercase;
  }
  .card_footer{
    padding: 2em;
    border-top: 1px solid rgba(0,0,0,0.100);
  }
  .btn_default{
    font-size: .8em;
    padding: 1em 2.3em;
    border-radius: 2px;
    border: 0;
    color: #fff;
    margin: 6px;
    cursor: pointer;
    text-transform: uppercase;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
  }
  .btn_blue{
    background: #4285F4;
  }
  .icon{
    padding: 0 .5em;
  }
  .icon_yellow{
    color: #fbc02d;
  }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="card_w">
      <div class="card_blok text_center">
        <p>
        <i class="fa fa-warning fa-3x icon icon_yellow"></i>
        <h2 class="card_title">404 Page Not Found</h2>
        </p>
        <p class="card_isi">
          <span>Halaman yang anda cari tidak ditemukan</span>
        </p>
        <div class="card_footer">
          <button type="button" onclick="window.history.back()" class="btn_default btn_blue"><i class="fa fa-backward icon"></i>Kembali</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
