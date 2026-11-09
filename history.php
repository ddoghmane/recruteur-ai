<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

require_once "includes/db.php";

$stmt = $conn->prepare("
SELECT *
FROM scores
WHERE user_id = ?
ORDER BY created_at DESC
");

$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Historique</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-black text-white min-h-screen">

<div class="fixed inset-0 bg-gradient-to-br from-cyan-900 via-black to-purple-900 -z-10"></div>

<div class="max-w-6xl mx-auto p-10">

<h1 class="text-5xl font-bold text-cyan-400 mb-8">
📚 Historique des Quiz
</h1>

<div class="bg-gray-900 rounded-2xl overflow-hidden shadow-xl">

<table class="w-full">

<thead>

<tr class="bg-gray-800 text-cyan-400">

<th class="p-4 text-left">Catégorie</th>
<th class="p-4 text-left">Score</th>
<th class="p-4 text-left">Badge</th>
<th class="p-4 text-left">Date</th>

</tr>

</thead>

<tbody>

<?php while($row = $result->fetch_assoc()): ?>

<tr class="border-t border-gray-700 hover:bg-gray-800">

<td class="p-4">
<?= htmlspecialchars($row["category"]) ?>
</td>

<td class="p-4">
<?= $row["score"] ?>/<?= $row["total"] ?>
</td>

<td class="p-4">

<?php

$badgeColor = "text-red-400";

if ($row["badge"] === "Confirmé") {
    $badgeColor = "text-yellow-400";
}

if ($row["badge"] === "Expert") {
    $badgeColor = "text-green-400";
}

?>

<span class="<?= $badgeColor ?> font-bold">
<?= htmlspecialchars($row["badge"]) ?>
</span>

</td>

<td class="p-4">
<?= $row["created_at"] ?>
</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

<div class="mt-8 flex gap-4">

<a
href="quiz.php"
class="bg-cyan-500 hover:bg-cyan-400 px-6 py-3 rounded-lg"
>
🎯 Quiz
</a>

<a
href="leaderboard.php"
class="bg-yellow-500 hover:bg-yellow-400 px-6 py-3 rounded-lg"
>
🏆 Classement
</a>

</div>

</div>

</body>
</html>
