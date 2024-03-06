<?php


class Movie
{
  public function __construct()
  {
    $this->conn = new PDO("mysql:host=localhost;dbname=movie", "root", "");
  }

  public function getAllMovies()
  {
    $query = "SELECT * FROM movies";
    $movies = $this->conn->query($query);
    return $movies;
  }

  public function getMovieObject($id)
  {
    $sql = "SELECT * FROM movies WHERE id = :id";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function getMovieArray($id)
  {
    $sql = "SELECT * FROM movies WHERE id = :id";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $movieArray = $stmt->fetch(PDO::FETCH_ASSOC);

    return $movieArray;
  }
}
