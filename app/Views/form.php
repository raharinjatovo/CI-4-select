
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
        <a href="../../index2.html"><b>Covid</b>engine</a>

      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo site_url('CI/public/home/way'); ?>" method="post">
          <div class="form-group has-feedback">

              <div id="countryList">
            <input type="email" id="country" name="pseudo" <?php if($validation->getError('pseudo')!=''){
              echo 'class="form-control is-invalid"';
            }
            else {
              echo 'class="form-control is-valid"';

            } ?> placeholder="Email">



          </div>
            <?php if($validation->getError('pseudo')!='')
            {
              echo '  '.$validation->getError('pseudo').'

            ';

            }
             ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password"  name="password" <?php if($validation->getError('password')!=''){
              echo 'class="form-control is-invalid"';
            }
            else {
              echo 'class="form-control"';

            } ?> placeholder="Password">
            <?php if($validation->getError('password')!='')
            {
              echo '  '.$validation->getError('password').'


          ';

            } ?>


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

        <!-- /.social-auth-links -->

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
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>


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
       }else {
          $('#countryList').fadeOut();
       }
   });
   $(document).on('click','li',function(){
     $('#country').val($(this).text());
     $('#countryList').fadeOut();
   })
 });
</script>
</html>
