<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  </head>
  <body>

    <div class="container">

<h2><?= $title ?></h2>






<?php if (! empty($geo_dist) && is_array($geo_dist)) : ?>

        <?php foreach ($geo_dist as $news_item): ?>
          <div class="card text-center">
          <div class="card-header">
          <h3> Wordl result</h3>
          </div>
          <div class="card-body">
            <h5 class="card-title">  <h3>Cases: <?= $news_item['cases'] ?></h3></h5>
            <h5 class="card-title">  <h3>deaths: <?= $news_item['deaths'] ?></h3></h5>
              <a href="covid" class="btn btn-primary">Go back to general result</a>
              <a href="covid" class="btn btn-primary">Go back to word result</a>
          </div>
    <div class="card-footer text-muted">
    2 days ago
    </div>
    </div>





        <?php endforeach; ?>

<?php else : ?>

        <h3>No News</h3>

        <p>Unable to find any news for you.</p>

<?php endif ?>

    </div>



  </body>
</html>
