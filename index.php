<?php

require_once 'classes/Movie.php';
require_once 'includes/functions.php';
$movies = new Movie();
$movies = $movies->getAllMovies();

?>

<?php include 'layout/_header.php' ?>
<?php include 'layout/_navbar.php' ?>

<div class="container">
  <div class="row">
    <form class="row row-cols-lg-auto g-3 align-items-center" action="includes/tmdb-api.php" method="post">
      <div class="col-md-6 col-lg-5">
        <div class="input-group">
          <input type="text" name="movie_id" class="form-control" placeholder="TMDB film id giriniz">
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <button type="submit" class="btn btn-success">Ekle</button>
      </div>

    </form>
  </div>
  <div class="row mt-2">
    <a class="h5 text-danger" href="doc.php">Nasıl Çalışır?</a>
  </div>
</div>
<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center">
      <h1 class="display-4">Filmler</h1>
    </div>

    <?php
    foreach ($movies as $movie) : ?>
      <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
          <img style="" src="https://image.tmdb.org/t/p/w500/<?php echo $movie['poster_path']; ?>" class="card-img-top" alt="$movie['title']">
          <div class="card-body">
            <h5 class="card-title"><?php echo "{$movie['title']} ({$movie['release_date']})" ?></h5>
            <p class="card-text">

              <?php
              echo shorten_overview($movie['overview']) . " (. . .)";
              ?>

            </p>
            <div class="card-footer text-end bg-transparent border-success">
              <a href="movie-detail.php?id=<?php echo $movie['id'] ?>" class="btn btn-warning">Detay</a>
            </div>

          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>

<?php include 'layout/_footer.php' ?>