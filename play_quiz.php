<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

require_once "includes/db.php";

$category = $_GET["category"] ?? "HTML";

$stmt = $conn->prepare("
    SELECT *
    FROM questions
    WHERE category = ?
");

$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz <?= htmlspecialchars($category) ?></title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen">

<div class="absolute inset-0 bg-gradient-to-br from-cyan-900 via-black to-purple-900"></div>

<div class="relative z-10 max-w-4xl mx-auto p-10">

<h1 class="text-5xl font-bold text-cyan-400 mb-10">
Quiz <?= htmlspecialchars($category) ?>
</h1>

<form action="result.php" method="POST">

<input type="hidden" name="category" value="<?= htmlspecialchars($category) ?>">

<?php while($q = $result->fetch_assoc()): ?>

<div class="bg-gray-900 rounded-xl p-6 mb-8">

<h2 class="text-xl font-bold mb-5">
<?= htmlspecialchars($q["question"]) ?>
</h2>

<div class="space-y-3">

<label class="block bg-gray-800 p-3 rounded cursor-pointer">
<input
type="radio"
name="question_<?= $q["id"] ?>"
value="A"
required
>
<?= htmlspecialchars($q["answer_a"]) ?>
</label>

<label class="block bg-gray-800 p-3 rounded cursor-pointer">
<input
type="radio"
name="question_<?= $q["id"] ?>"
value="B"
>
<?= htmlspecialchars($q["answer_b"]) ?>
</label>

<label class="block bg-gray-800 p-3 rounded cursor-pointer">
<input
type="radio"
name="question_<?= $q["id"] ?>"
value="C"
>
<?= htmlspecialchars($q["answer_c"]) ?>
</label>

</div>

</div>

<?php endwhile; ?>

<button
type="submit"
class="bg-green-500 hover:bg-green-400 px-8 py-4 rounded-xl text-lg font-bold"
>
✅ Valider le Quiz
</button>

</form>

</div>

</body>
</html>
