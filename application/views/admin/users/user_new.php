<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>
    <div class="row">
      <!-- panel left -->
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <b>Add New User</b>
          </div>
          <form class="" action="<?= base_url().'admin/Users/New' ?>" method="post">
            <div class="panel-body">
              <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama">
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control"  placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control"  placeholder="Password">
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="jenis_kelamin"  value="1" checked> Male
                </label>
                <label>
                  <input type="radio" name="jenis_kelamin"  value="0"> Female
                </label>
              </div>

              <div class="form-group">
                <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-dd-mm" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                  <input class="form-control" size="16" type="text" name="tgl_lahir" placeholder="Birth">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>

              <div class="radio">
                Admin &nbsp;
                <label>
                  <input type="radio" name="level"  value="1" checked> Yes
                </label>
                <label>
                  <input type="radio" name="level"  value="0"> No
                </label>
              </div>

              <input type="submit" value="Submit" class="btn btn-primary">
              <a href="<?= base_url() ?>admin/User" class="btn btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
