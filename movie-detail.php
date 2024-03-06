<?php
$id = $_GET["id"];
require_once 'classes/Movie.php';
$movie = new Movie();
$movie = $movie->getMovieObject($id);
$movieArray = new Movie();
$movieArray = $movieArray->getMovieArray($id);
?>

<?php include 'layout/_header.php' ?>
<?php include 'layout/_navbar.php' ?>


<div class="container mt-2">
  <div class="grid gap-3">
    <div class="row">
      <div class="card mb-3 me-5" style="max-width: 540px;">
        <p class="text-success fw-bold">Object</p>
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->poster_path; ?>" class="img-fluid rounded-start" alt="...">
            <div class="mt-2">
              <p><i class="fa fa-star text-warning" aria-hidden="true"> </i> <?php echo $movie->vote_average; ?></p>
              <p> <span class="text-secondary">Tür:</span> <?php echo $movie->genres; ?> </p>
              <p> <span class="text-secondary">Yıl:</span> <?php echo $movie->release_date; ?> </p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo "{$movie->title} ({$movie->original_title})" ?></h5>
              <p class="card-text"><?php echo $movie->overview ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 540px;">
        <p class="text-danger fw-bold">Array</p>
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://image.tmdb.org/t/p/w500/<?php echo $movieArray['poster_path']; ?>" class="img-fluid rounded-start" alt="...">
            <div class="mt-2">
              <p><i class="fa fa-star text-warning" aria-hidden="true"> </i> <?php echo $movieArray['vote_average']; ?></p>
              <p> <span class="text-secondary">Tür:</span> <?php echo $movieArray['genres']; ?> </p>
              <p> <span class="text-secondary">Yıl:</span> <?php echo $movieArray['release_date']; ?> </p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo "{$movieArray['title']} ({$movieArray['original_title']})" ?></h5>
              <p class="card-text"><?php echo $movieArray['overview'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'layout/_footer.php' ?>