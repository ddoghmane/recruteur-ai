<?php

session_start();

require_once "includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE username = ?"
    );

    $stmt->bind_param(
        "s",
        $username
    );

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if (
            password_verify(
                $password,
                $user["password"]
            )
        ) {

            $_SESSION["user_id"] =
                $user["id"];

            $_SESSION["username"] =
                $user["username"];

            header("Location: quiz.php");
            exit();
        }

        $message =
            "Mot de passe incorrect";
    } else {

        $message =
            "Utilisateur introuvable";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">

<title>Connexion</title>

<link
    rel="stylesheet"
    href="css/style.css"
>

</head>

<body>

<h1>Connexion</h1>

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
    Connexion
</button>

</form>

<p>
    <?= $message ?>
</p>

<p>
    <a href="index.php">
        Retour accueil
    </a>
</p>

</body>
</html>
