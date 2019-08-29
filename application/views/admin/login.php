<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/login.css">


</head>

<body>
    <div class="login-form">
        <h2 class="al-center">Login Sistem</h2>

        <form method="post" action="Login/process_login">
            <!-- Field Username -->
            <?php if(isset($error_message['email'])) { ?>
            <div class="alert"><?= $error_message['email']; ?></div>
            <?php } ?>
            <div class="form-group ">
                <input type="text" class="form-control" placeholder="E-mail " id="Email" name="email">
                <i class="fa fa-user"></i>
            </div>

            <!-- Field Password -->
            <?php if(isset($error_message['password'])) { ?>
            <div class="alert"><?= $error_message['password']; ?></div>
            <?php } ?>
            <div class="form-group log-status">
                <input type="password" class="form-control" placeholder="Password" id="Passwod" name="password">
                <i class="fa fa-lock"></i>
            </div>

            <?php if(isset($error_message['invalid_user'])) { ?>
            <div class="alert"><?= $error_message['invalid_user']; ?></div>
            <?php } ?>
            <button type="submit" class="log-btn" >Log in</button>
        </form>
    </div>
    <script src="<?= base_url() ?>assets/admin/js/jquery.js"></script>
</body>
</html>
