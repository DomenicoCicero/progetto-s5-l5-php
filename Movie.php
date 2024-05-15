<?php

require_once('Database.php');

class Movie {
    public $id;
    public $title;
    public $cover_image_url;
    public $director;

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create() {
        $query = "INSERT INTO movies SET title = :title, cover_image_url = :cover_image_url, director = :director";

        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->cover_image_url = htmlspecialchars(strip_tags($this->cover_image_url));
        $this->director = htmlspecialchars(strip_tags($this->director));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':cover_image_url', $this->cover_image_url);
        $stmt->bindParam(':director', $this->director);

        if ($stmt->execute()) {
            return true;
        }


        return false;
    }

    public function read($id) {
        $query = "SELECT * FROM movies WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt;
    }

    public function readAll() {
        $query = "SELECT * FROM movies";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

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

        return false;
    }

    public function delete() {
        $query = "DELETE FROM movies WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

?>
