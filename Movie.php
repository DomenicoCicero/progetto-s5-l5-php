<?php

require_once('Database.php');

class Movie {
    // Proprietà della classe corrispondenti ai campi del database
    public $id;
    public $title;
    public $cover_image_url;
    public $director;

    // Connessione al database
    private $conn;

    // Costruttore
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Metodo per creare un nuovo film nel database
    public function create() {
        $query = "INSERT INTO movies SET title = :title, cover_image_url = :cover_image_url, director = :director";

        $stmt = $this->conn->prepare($query);

        // Pulizia dei dati
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->cover_image_url = htmlspecialchars(strip_tags($this->cover_image_url));
        $this->director = htmlspecialchars(strip_tags($this->director));

        // Bind dei parametri
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':cover_image_url', $this->cover_image_url);
        $stmt->bindParam(':director', $this->director);

        if ($stmt->execute()) {
            return true;
        }

        // printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Metodo per leggere un film dal database per ID
    public function read($id) {
        $query = "SELECT * FROM movies WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt;
    }
    // Metodo per leggere tutti i film
    public function readAll() {
        $query = "SELECT * FROM movies";

        $stmt = $this->conn->prepare($query);

        // $stmt->bindParam(':id', $this->id);

        $stmt->execute();

        return $stmt;
    }

    // Metodo per aggiornare le informazioni di un film nel database
    public function update($id) {
        $query = "UPDATE movies SET title = :title, cover_image_url = :cover_image_url, director = :director WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->cover_image_url = htmlspecialchars(strip_tags($this->cover_image_url));
        $this->director = htmlspecialchars(strip_tags($this->director));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':cover_image_url', $this->cover_image_url);
        $stmt->bindParam(':director', $this->director);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        // printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Metodo per eliminare un film dal database per ID
    public function delete() {
        $query = "DELETE FROM movies WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        // printf("Error: %s.\n", $stmt->error);

        return false;
    }
}

?>
