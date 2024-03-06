<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $movie_id = $_POST['movie_id'];
}
$api_key = '';
$url = "https://api.themoviedb.org/3/movie/{$movie_id}?api_key={$api_key}&language=tr";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$data = json_decode($result, true);
try {
  require_once 'database-handler.php';
  $title = $data['title'];
  $original_title = $data['original_title'];
  $poster = $data['poster_path'];
  $release_date = date("Y", strtotime($data['release_date']));
  $genres = implode(", ", array_column($data['genres'], 'name'));
  $vote_average = $data['vote_average'];
  $overview = $data['overview'];
  $query = "INSERT INTO movies (title, original_title, poster_path, release_date, genres, vote_average, overview) VALUES (:title, :original_title, :poster_path, :release_date, :genres, :vote_average, :overview);";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":title", $title);
  $stmt->bindParam(":original_title", $original_title);
  $stmt->bindParam(":poster_path", $poster);
  $stmt->bindParam(":release_date", $release_date);
  $stmt->bindParam(":genres", $genres);
  $stmt->bindParam(":vote_average", $vote_average);
  $stmt->bindParam(":overview", $overview);

  $stmt->execute();

  $pdo = null;
  $stmt = null;
  header("Location: ../index.php");
  die();
} catch (PDOException $e) {
  die('Veritabanı kaydı başarısız: ' . $e->getMessage());
}
