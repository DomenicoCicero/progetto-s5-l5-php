<?php
session_start();

include_once 'User.php';
include_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    try {
        $success = $stmt->execute([
    "username" => $_POST['username'],
    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
]);
header("Location: http://localhost/progetto-s5-l5-php/");
exit();
} catch (\PDOException $e) {
$errorMessage = "Errore durante l'esecuzione della query: " . $e->getMessage();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registation</title>
</head>
<body>
    <h2>Registrati</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <a href="http://localhost/progetto-s5-l5-php/">Registrati</a>

</body>
</html>
