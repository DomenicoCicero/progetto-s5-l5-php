<?php
session_start();
require_once __DIR__ . '/Movie.php';

if(isset($_SESSION["user_id"])) {

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $movie_id = $_GET['id'];

    $movie = new Movie();

    $movie->id = $movie_id;

    if ($movie->delete()) {
        $_SESSION['success_message'] = "Il film è stato eliminato con successo.";
        header("Location: http://localhost/progetto-s5-l5-php/homepage.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Si è verificato un errore durante l'eliminazione del film.";
        header("Location: http://localhost/progetto-s5-l5-php/homepage.php");
        exit();
    }
} else {
    header("Location: http://localhost/progetto-s5-l5-php/homepage.php");
    exit();
}
} else {
    header("Location: http://localhost/progetto-s5-l5-php/");
    exit();
}
?>
