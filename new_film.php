<?php
session_start();
require_once __DIR__ . '/Movie.php';
if(isset($_SESSION["user_id"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie = new Movie();

    $movie->title = $_POST['title'];
    $movie->cover_image_url = $_POST['cover_image_url'];
    $movie->director = $_POST['director'];

    if ($movie->create()) {
        header("Location: http://localhost/progetto-s5-l5-php/homepage.php");
        exit();
    } else {
        echo "Si è verificato un errore durante l'aggiunta del film.";
    }
}
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
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <div class="container">
        <div class="row text-center">

        <h1 class="text-center text-primary my-4">Aggiungi Nuovo Film</h1>
    <form action="" method="POST">
        <label for="title">Titolo:</label><br>
        <input type="text" id="title" name="title" required>
        <br><br>

        <label for="cover_image_url">Immagine:</label><br>
        <input type="text" id="cover_image_url" name="cover_image_url" required ><br><br>

        <label for="director">Regista:</label><br>
        <input type="text" id="director" name="director" required>
        <br>

        <button type="submit" class="btn btn-primary my-4">Add</button>

    </form>

    <a href="http://localhost/progetto-s5-l5-php/homepage.php">&lt;&lt;Torna alla Homepage</a>
  
    </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
</body>
</html>