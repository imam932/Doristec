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
          <form class="" action="<?= base_url().'admin/User/Edituser/'.$user[0]->id_user ?>" method="post">
            <div class="panel-body">
              <div class="form-group">
                <input type="text" name="name" class="form-control" value="<?= $user[0]->name ?>">
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="gender" value="1" <?php if($user[0]->gender == 1) echo 'checked' ?>> Male
                </label>
                <label>
                  <input type="radio" name="gender" value="0" <?php if($user[0]->gender == 0) echo 'checked' ?>> Female
                </label>
              </div>
              <div class="form-group">
                <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                  <input class="form-control" size="16" type="text" value="<?= $user[0]->birth ?>" name="birth">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>
              <div class="form-group">
                <textarea name="address" rows="2" class="form-control"><?= $user[0]->address ?></textarea>
              </div>

              <div class="radio">
                Admin &nbsp;
                <label>
                  <input type="radio" name="admin"  value="1" <?php if($user[0]->admin == 1) echo "checked" ?>> Yes
                </label>
                <label>
                  <input type="radio" name="admin"  value="0" <?php if($user[0]->admin == 0) echo "checked" ?>> No
                </label>
              </div>

              <div class="form-group">
                <input type="text" name="phone" class="form-control" value="<?= $user[0]->phone ?>">
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
