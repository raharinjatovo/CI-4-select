
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo site_url('CI/public/css/bootstrap.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo site_url('CI/public/dist/css/AdminLTE.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo site_url('CI/public/plugins/iCheck/square/blue.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script  src="<?php echo site_url('CI/public/js/jquery.min.js'); ?>"></script>
    <script  src="<?php echo site_url('CI/public/js/bootstrap.min.js'); ?>"></script>

  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo site_url('CI/public/home'); ?>"><b>Covid</b>engine</a>
      </div><!-- /.login-logo -->

      <div class="login-box-body">
        <?php if(isset($_GET['session']))
        {
          echo '<div class="callout callout-danger">
              <h4>Warning!</h4>
              <p>you must log first</p>  </div>';
        } ?>

        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo site_url('CI/public/home/way'); ?>" method="post" >
          <div class="form-group has-feedback">
            <input id="country" type="email" name="pseudo" <?php if(isset($mail)){
              echo 'class="form-control is-invalid"';
            }
            else {
              echo 'class="form-control"';

            } ?> placeholder="Email">

            <?php
              switch (true) {
                case (isset($mail)):
                  echo $mail;
                  break;

                default:

                  break;
              }
           ?>


            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password"  name="password" <?php if(isset($password)){
              echo 'class="form-control is-invalid"';
            }
            else {
              echo 'class="form-control"';

            } ?>  placeholder="Password">
            <?php
              switch (true) {
                case (isset($password)):
                  echo $password;
                  break;

                default:

                  break;
              }
           ?>

            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>


          <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
              <button type="submit" class="btn btn-primary">Sign In</button>

            </div>
            <div class="col-sm">

            </div>




          </div>

        </form>

        <div class="row">
          <div class="col-sm">

          </div>
          <div class="col-sm-8">
            <a href="<?=site_url('CI/public/home/first') ?>" class="text-center">Register a new membership</a>

          </div>
          <div class="col-sm">

          </div>




        </div>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->




  </body>
  <script>
 $(document).ready(function(){
   $('#country').keyup(function(){
       var query = $(this).val();
       if(query!='')
       {
         $.ajax({
           url:"<?php echo site_url('CI/public/validate.php'); ?>",
           method:"POST",
           data:{query:query},
           success:function(data)
           {
             $('#countryList').fadeIn();
             $('#countryList').html(data);
           }

         });
       }
   });
   $(document).on('click','li',function(){
     $('#country').val($(this).text());
     $('#countryList').fadeOut();
   })
 });
</script>
</html>
