<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Covidengine | Create</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo site_url('CI/public/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo site_url('CI/public/dist/css/AdminLTE.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('CI/public/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo site_url('CI/public/dist/css/skins/_all-skins.min.css'); ?>">
  <script  src="<?php echo site_url('CI/public/js/jquery.min.js'); ?>"></script>
  <script  src="<?php echo site_url('CI/public/js/bootstrap.min.js'); ?>"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Covid</b>Engine</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <?php
          if(isset($_GET['mail']))
          {
            echo '<h4><i class="fa fa-warning text-red"></i> Mail already used please choose Another one</h4>';
          }
         ?>
        <form action="<?= site_url('CI/public/home/create'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group has-feedback">
            <input type="text"  name="first_name" class="form-control" placeholder="First Name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <?php if($validation->getError('first_name')!='')
          {
            echo '  '.$validation->getError('first_name').'

          ';

          }
           ?>
          <div class="form-group has-feedback">
            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <?php if($validation->getError('last_name')!='')
          {
            echo '  '.$validation->getError('last_name').'

          ';

          }
           ?>
          <div class="form-group has-feedback">
            <input type="email" name="mail" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <?php if($validation->getError('mail')!='')
          {
            echo '  '.$validation->getError('mail').'

          ';

          }
           ?>

          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <?php if($validation->getError('password')!='')
          {
            echo '  '.$validation->getError('password').'

          ';

          }
           ?>
           <div class="form-group has-feedback">
             <input type="file" name="images" class="form-control" placeholder="Retype password" required>
             <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
           </div>
           <?php if($validation->getError('file')!='')
           {
             echo '  '.$validation->getError('file').'

           ';

           }
            ?>
          <div class="row">
            <div class="col-xs-8">
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div> -->
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div>

        <a href="<?php echo site_url('CI/public/home'); ?>" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
