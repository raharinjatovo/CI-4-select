<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <div class="card"  >
        <div class="card-body">
          <div class="card text-center cart">
            <h3>Covid 19 search engine</h3>
          </div>
        <form action="covid/world" >
      <div class="row">
  <div class="col-sm">

    <select class="custom-select mr-sm-2" name="james" id="inlineFormCustomSelect">
      <option value="" selected>Choose by country</option>
      <?php if (! empty($geo_dist) && is_array($geo_dist)) : ?>

              <?php foreach ($geo_dist as $news_item): ?>


                    <option value="<?=
                        //use remove _ in fields countriesAndTerritories
                      $news_item['countriesAndTerritories'] ?>"  > <?=
                        //use remove _ in fields countriesAndTerritories
                      str_replace("_"," ", $news_item['countriesAndTerritories']) ?> </option>




              <?php endforeach; ?>

      <?php else : ?>



      <?php endif ?>
      <option value="12">December</option>
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>

    </select>
  </div>
  <div class="col-sm">
    <select class="custom-select mr-sm-2" name="filter" id="inlineFormCustomSelect">
      <option value="" selected>Choose by min or max </option>
      <option value="cases_desc">cases desc</option>
      <option value="deaths_desc">deaths desc</option>
      <option value="deaths_max">deaths max</option>
      <option value="deaths_min">deaths min</option>
      <option value="cases_min">cases min</option>
      <option value="cases_max">cases max</option>
    </select>
  </div>
  <div class="col-sm">
    <select class="custom-select mr-sm-2" name="title" id="inlineFormCustomSelect">
      <option value="" selected>Choose by continent</option>
      <option value="continent" >All continents</option>
      <option value="Africa">Africa</option>
      <option value="America">America</option>
      <option value="Asia">Asia</option>
      <option value="Europe">Europe</option>
      <option value="Oceania">Oceania</option>
      <option value="Other">Other</option>

    </select>
  </div>


  <div class="col-sm">

    <select class="custom-select mr-sm-2" name="month" id="inlineFormCustomSelect">
      <option value="" selected>Choose by month</option>
      <option value="12">December</option>
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>

    </select>
  </div>
    <div class="col-sm">
      <div class="form-group row">



    <div class="col-sm">
    <input class="form-control" type="date" name="date" min="2019-12-31" max="2020-04-28" id="example-date-input">
    </div>
    </div>
    </div>
    <div class="col-sm">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
  <div class="card text-center cart">
    Allow empty unusefull fiedls
  </div>

</div></form>

</div>
  </head>
  <body>


    <div class="container">




      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <canvas id="myChart" style="max-width: 500px;"></canvas>
                      </div>
                  </div>
              </div>
           </div>
      </div>
<h2><?= $title ?></h2>






<?php if (! empty($geo_dist) && is_array($geo_dist)) : ?>

        <?php foreach ($geo_dist as $news_item): ?>
          <div class="card text-center cart">
          <div class="card-header">
          <h3>  <?=
              //use remove _ in fields countriesAndTerritories
            str_replace("_"," ", $news_item['countriesAndTerritories']) ?></h3>

          </div>
          <div class="card-body">
            <h5 class="card-title">  <h3>Cases: <?= number_format($news_item['cases'], 0, ',', ' ') ?></h3></h5>
            <h5 class="card-title">  <h3>Deaths: <?= number_format($news_item['deaths'], 0, ',', ' ') ?></h3></h5>
              <a href="covid/wordl?title=<?= $news_item['continentExp'] ?>" class="btn btn-primary">Go to <?= $news_item['continentExp'] ?> continent global result</a>
          </div>
    <div class="card-footer text-muted">
    until April 28 th
    </div>
    </div>






        <?php endforeach; ?>

<?php else : ?>

        <h3>No Data found</h3>

        <p>Unable to find data for you <b>please verify you request</b> </p>

<?php endif ?>

    </div>
    <script type="text/javascript">
    var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
datasets: [{
label: '# of Votes',
data: [12, 19, 3, 5, 2, 3],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
    </script>
    <script  src="js/mdb.js" >

    </script>

  </body>
</html>
