<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Autocomplete</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script  src="<?php echo site_url('CI/public/js/jquery.min.js'); ?>"></script>
    <script  src="<?php echo site_url('CI/public/js/bootstrap.min.js'); ?>"></script>
<style >
  ul{
    background-color: #eee;
    cursor:pointer;
  }
  li{
    padding: 12px;

  }
</style>



  </head>
  <body>
 <div class="container">
   <h1>auto Autocomplete </h1>
    <input type="text" name="country" id="country" value="">

  <div id="countryList">

  </div>

 </div>
  </body>
  <script>
  $(document).ready(function(){
   $('#country').onckic(function(){
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
