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
            <b>Edit User</b>
          </div>
          <form class="" action="<?= base_url().'admin/Users/editUsers/'.$user[0]->id ?>" method="post">
            <div class="panel-body">
              <div class="form-group">
                <input type="text" name="nama" class="form-control" value="<?= $user[0]->nama ?>">
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control" value="<?= $user[0]->email ?>">
              </div>
              
              <div class="form-group">
                <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                  <input class="form-control" size="16" type="text" value="<?= $user[0]->tgl_lahir ?>" name="tgl_lahir">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>

              <input type="submit" value="Submit" class="btn btn-primary">
              <button type="button" onclick="window.history.back()" class="btn btn-secondary">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
