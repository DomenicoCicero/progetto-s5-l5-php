<?php
session_start();
require_once __DIR__ . '/Movie.php';

if(isset($_SESSION["user_id"])) {

    $movie = new Movie();

    $stmt = $movie->readAll();
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    header("Location: http://localhost/progetto-s5-l5-php/");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <style>
        .custom-img {
         width: 301px;
        height: 164px;
         object-fit: cover;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      </ul>
      <a class="btn btn-danger me-2" href="http://localhost/progetto-s5-l5-php/logout.php">Logout</a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <div class="container">
        <a href="http://localhost/progetto-s5-l5-php/new_film.php" class="btn btn-primary mt-3">Carica Nuovo Film</a>
        <div class="row">

    <h1 class="text-center mt-3">Films</h1>
    <?php 
    foreach ($movies as $row) {
       echo "<div class='col-12 my-3 d-flex'>
       <img class='img-fluid custom-img' src='$row[cover_image_url]' alt='movie picture' />
       <div class='ms-4'>
       <h3>$row[title]</h3>
       <h5>$row[director]</h5>
       </div>
       <div class='ms-3'>
       <a href='http://localhost/progetto-s5-l5-php/detail_film.php?id={$row['id']}' class='btn btn-success mt-3'>Dettagli</a>
       <a href='http://localhost/progetto-s5-l5-php/edit_film.php?id={$row['id']}' class='btn btn-warning mt-3'>Modifica Film</a>
       <a href='http://localhost/progetto-s5-l5-php/delete.php?id={$row['id']}' class='btn btn-danger mt-3'>Elimina Film</a>

       </div>
        </div>";
    }
    ?>
    
    </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
</body>
</html>