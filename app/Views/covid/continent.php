<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo site_url('CI/public/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('CI/public/css/style.css'); ?>">
    <div class="card"  >
      <div class="card text-center cart">
        <h3>Covid 19 search engine</h3>
      </div>
        <div class="card-body">
        <form action="" >
      <div class="row">

  <div class="col-sm">

</div>
</div>

</nav>
  </head>
  <body>

    <div class="container">

<h2><?= $title ?></h2>






<?php if (! empty($geo_dist) && is_array($geo_dist)) : ?>

        <?php foreach ($geo_dist as $news_item): ?>
          <div class="card text-center cart">
          <div class="card-header">
          <h3>  <?php
          if ($news_item['countriesAndTerritories']!='') {


          echo  str_replace("_"," ",$news_item['countriesAndTerritories']).' ';
        }else
          if ($news_item['countriesAndTerritories']!='') {
            if ($news_item['dateRep']!='') {
            echo   $news_item['dateRep'].' ';
            }

          echo  str_replace("_"," ",$news_item['countriesAndTerritories']);
          }
          else if($news_item['continentExp']!=''){
              echo  str_replace("_"," ", $news_item['continentExp']);
          }
          else if ($news_item['month']!='') {
             echo $news_item['month'];
          }
          else {
            echo "World ";
          }
                //use remove _ in fields countriesAndTerritories
             ?></h3>
          </div>
          <div class="card-body">
            <h5 class="card-title">  <h3>Cases: <?= number_format($news_item['cases'], 0, ',', ' ') ?></h3></h5>
            <h5 class="card-title">  <h3>Deaths: <?= number_format($news_item['deaths'], 0, ',', ' ') ?></h3></h5>
              <a href="<?php echo site_url('CI/public/covid'); ?>" class="btn btn-primary">Go back to general result</a>
              <?php
              if($news_item['continentExp']=="")
              {
                echo '  <a href="'.site_url('CI/public/covid/world?title=continent').'" class="btn btn-primary">Go back to continent result</a>
            ';
              }
              else {
                echo '  <a href=" '.site_url('CI/public/covid/world?title=world').'" class="btn btn-primary">Go back to world result</a>
            ';

              }

               ?>

              </div>
    <div class="card-footer text-muted">
    <?php if ($news_item['month']!='') {

      switch ($news_item['month']) {
        case '12':
          echo "December cases";
          break;
        case '1':
          echo "January cases";
          break;
        case '2':
          echo "February cases";
          break;
       case '3':
           echo "March cases";
           break;
       case '4':
           echo "April cases";
           break;

        default:
          // code...
          break;
      }

    }elseif ($news_item['dateRep']!='') {
    echo   $news_item['dateRep'].' ';
  }else {
      echo "Until April 28th";
    }

    ?>
    </div>
    </div>





        <?php endforeach; ?>

<?php else : ?>

  <h3>No Data found</h3>

  <p>Unable to find data for you <b>please verify you request</b> </p>
  <a href="<?= site_url('CI/public/covid') ?>" class="btn btn-warning" >back to main page</a>

<?php endif ?>

    </div>



  </body>
</html>
