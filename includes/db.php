<?php

$host = "localhost";
$user = "recruteur";
$password = "recruteur123";
$database = "recruteur_ai";

$conn = new mysqli(
    $host,
    $user,
    $password,
    $database
);

if ($conn->connect_error) {
    die(
        "Erreur connexion : " .
        $conn->connect_error
    );
}
