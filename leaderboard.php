<?php

require_once "includes/db.php";

$result = $conn->query("
SELECT
u.username,
MAX(s.score) as best_score,
MAX(s.badge) as badge
FROM scores s
JOIN users u ON u.id = s.user_id
GROUP BY u.id
ORDER BY best_score DESC
");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Classement</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white p-10">

<h1 class="text-5xl text-yellow-400 mb-10">
🏆 Classement RecruteurAI
</h1>

<table class="w-full bg-gray-900 rounded-xl overflow-hidden">

<tr class="bg-gray-800">
<th class="p-4">#</th>
<th class="p-4">Utilisateur</th>
<th class="p-4">Score</th>
<th class="p-4">Badge</th>
</tr>

<?php $rank = 1; ?>

<?php while($row = $result->fetch_assoc()): ?>

<tr class="border-t border-gray-700">
<td class="p-4"><?= $rank++ ?></td>
<td class="p-4"><?= htmlspecialchars($row["username"]) ?></td>
<td class="p-4"><?= $row["best_score"] ?></td>
<td class="p-4"><?= htmlspecialchars($row["badge"]) ?></td>
</tr>

<?php endwhile; ?>

</table>

<div class="mt-8">
<a
href="quiz.php"
class="bg-cyan-500 px-6 py-3 rounded-lg"
>
Retour
</a>
</div>

</body>
</html>
