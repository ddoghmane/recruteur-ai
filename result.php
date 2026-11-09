<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

require_once "includes/db.php";

$category = $_POST["category"] ?? "HTML";

$stmt = $conn->prepare("
SELECT *
FROM questions
WHERE category = ?
");

$stmt->bind_param("s", $category);
$stmt->execute();

$questions = $stmt->get_result();

$score = 0;
$total = 0;

while ($q = $questions->fetch_assoc()) {

    $total++;

    $userAnswer =
        $_POST["question_" . $q["id"]]
        ?? "";

    if ($userAnswer === $q["correct_answer"]) {
        $score++;
    }
}

$pourcentage = ($score / $total) * 100;

if ($pourcentage < 50) {
    $badge = "Junior";
    $badgeColor = "text-red-400";
}
elseif ($pourcentage < 80) {
    $badge = "Confirmé";
    $badgeColor = "text-yellow-400";
}
else {
    $badge = "Expert";
    $badgeColor = "text-green-400";
}

$save = $conn->prepare("
INSERT INTO scores
(user_id, score, category, total, badge)
VALUES (?, ?, ?, ?, ?)
");

$save->bind_param(
    "iisis",
    $_SESSION["user_id"],
    $score,
    $category,
    $total,
    $badge
);

$save->execute();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Résultat</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen flex items-center justify-center">

<div class="bg-gray-900 p-10 rounded-2xl text-center shadow-xl">

<h1 class="text-6xl mb-6">
🏆
</h1>

<h2 class="text-4xl font-bold text-cyan-400 mb-4">
Résultat
</h2>

<p class="text-xl mb-3">
Catégorie : <?= htmlspecialchars($category) ?>
</p>

<p class="text-3xl mb-5">
<?= $score ?> / <?= $total ?>
</p>

<p class="text-2xl font-bold <?= $badgeColor ?> mb-8">
<?= $badge ?>
</p>

<div class="flex justify-center gap-4">

<a
href="quiz.php"
class="bg-cyan-500 hover:bg-cyan-400 px-6 py-3 rounded-lg"
>
Nouveau Quiz
</a>

<a
href="leaderboard.php"
class="bg-yellow-500 hover:bg-yellow-400 px-6 py-3 rounded-lg"
>
Classement
</a>

</div>

</div>

</body>
</html>
