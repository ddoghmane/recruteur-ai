<?php
require_once "includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $stmt = $conn->prepare(
            "INSERT INTO users (username, password)
             VALUES (?, ?)"
        );

        $stmt->bind_param(
            "ss",
            $username,
            $hashedPassword
        );

        if ($stmt->execute()) {
            $message = "Compte créé avec succès ✅";
        } else {
            $message = "Erreur : utilisateur déjà existant";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Inscription</h1>

<form method="POST">

    <input
        type="text"
        name="username"
        placeholder="Nom d'utilisateur"
        required
    >

    <br><br>

    <input
        type="password"
        name="password"
        placeholder="Mot de passe"
        required
    >

    <br><br>

    <button type="submit">
        S'inscrire
    </button>

</form>

<p><?= $message ?></p>

<p>
    <a href="index.php">
        Retour accueil
    </a>
</p>

</body>
</html>
