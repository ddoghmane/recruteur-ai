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

$result = $stmt->get_result();

$questions = [];

$score = 0;
$total = 0;

while ($q = $result->fetch_assoc()) {

    $total++;

    $userAnswer =
        $_POST["question_" . $q["id"]]
        ?? "";

    if ($userAnswer === $q["correct_answer"]) {
        $score++;
    }

    $q["user_answer"] = $userAnswer;

    $questions[] = $q;
}

$pourcentage = ($score / $total) * 100;

if ($pourcentage < 50) {

    $badge = "Junior";
    $badgeColor = "text-red-400";

} elseif ($pourcentage < 80) {

    $badge = "Confirmé";
    $badgeColor = "text-yellow-400";

} else {

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

<title>Résultat du Quiz</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-black text-white min-h-screen">

<div class="fixed inset-0 bg-gradient-to-br from-cyan-900 via-black to-purple-900 -z-10"></div>

<div class="max-w-5xl mx-auto p-8">

<div class="bg-gray-900 rounded-2xl p-8 mb-10 text-center shadow-2xl">

<div class="text-6xl mb-4">
🏆
</div>

<h1 class="text-4xl font-bold text-cyan-400 mb-4">
Résultat du Quiz
</h1>

<p class="text-xl mb-2">
Catégorie :
<strong><?= htmlspecialchars($category) ?></strong>
</p>

<p class="text-4xl font-bold mb-4">
<?= $score ?> / <?= $total ?>
</p>

<p class="text-3xl font-bold <?= $badgeColor ?>">
<?= $badge ?>
</p>

</div>

<?php foreach($questions as $q): ?>

<div class="bg-gray-900 rounded-2xl p-6 mb-6 shadow-xl">

<h2 class="text-xl font-bold text-cyan-400 mb-4">
<?= htmlspecialchars($q["question"]) ?>
</h2>

<?php if ($q["user_answer"] === $q["correct_answer"]): ?>

<div class="bg-green-900 border border-green-500 p-4 rounded-xl mb-4">

<p class="text-green-300 font-bold mb-2">
✅ Bonne réponse
</p>

<p>
Votre réponse :
<strong><?= $q["user_answer"] ?></strong>
</p>

</div>

<?php else: ?>

<div class="bg-red-900 border border-red-500 p-4 rounded-xl mb-4">

<p class="text-red-300 font-bold mb-2">
❌ Mauvaise réponse
</p>

<p class="mb-2">
Votre réponse :
<strong><?= $q["user_answer"] ?></strong>
</p>

<p class="text-green-300 font-bold">
✅ Bonne réponse :
<?= $q["correct_answer"] ?>
</p>

</div>

<?php endif; ?>

<?php if (!empty($q["explanation"])): ?>

<div class="bg-gray-800 p-4 rounded-xl">

<p class="text-yellow-400 font-bold mb-2">
📘 Explication
</p>

<p class="text-gray-300">
<?= htmlspecialchars($q["explanation"]) ?>
</p>

</div>

<?php endif; ?>

</div>

<?php endforeach; ?>

<div class="flex flex-wrap gap-4 justify-center mt-10">

<a
href="quiz.php"
class="bg-cyan-500 hover:bg-cyan-400 px-6 py-3 rounded-lg font-bold"
>
🎯 Nouveau Quiz
</a>

<a
href="leaderboard.php"
class="bg-yellow-500 hover:bg-yellow-400 px-6 py-3 rounded-lg font-bold"
>
🏆 Classement
</a>

<a
href="history.php"
class="bg-green-500 hover:bg-green-400 px-6 py-3 rounded-lg font-bold"
>
📚 Historique
</a>

</div>

</div>

</body>
</html>
