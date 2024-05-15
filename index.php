<?php
session_start();

include_once 'User.php';
include_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([
        $username,
    ]);
    $user = $stmt->fetch();

    if($user) {
        if(password_verify($_POST['password'], $user['password'])) {
            $_SESSION["user_id"] = $user['id'];
            // echo "Login successful.";
            header("Location: http://localhost/progetto-s5-l5-php/homepage.php");
            exit();
        }  else {
            echo "Login fallito. Riprova.";
        }
    } else {
        echo "Utente non trovato";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Effettua il login</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <a href="http://localhost/progetto-s5-l5-php/registration.php">Registrati</a>

</body>
</html>
