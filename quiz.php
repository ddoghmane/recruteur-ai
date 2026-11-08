<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>RecruteurAI - Quiz</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-black text-white min-h-screen">

<div class="fixed inset-0 bg-gradient-to-br from-cyan-900 via-black to-purple-900 -z-10"></div>

<nav class="flex justify-between items-center p-6">

<h1 class="text-3xl font-bold text-cyan-400">
🤖 RecruteurAI
</h1>

<a
href="logout.php"
class="bg-red-500 px-5 py-2 rounded-lg hover:bg-red-400 transition"
>
Déconnexion
</a>

</nav>

<div class="max-w-6xl mx-auto px-6 py-12">

<div class="bg-gray-900 rounded-2xl p-8 mb-10 shadow-lg">

<h2 class="text-4xl font-bold mb-4">
Bienvenue
<span class="text-cyan-400">
<?= htmlspecialchars($_SESSION["username"]) ?>
</span>
👋
</h2>

<p class="text-gray-300 text-lg">
Choisis une catégorie et commence ton entraînement technique.
</p>

</div>

<div class="grid md:grid-cols-3 gap-8">

<!-- HTML -->

<div class="bg-gray-900 rounded-2xl p-8 hover:scale-105 transition">

<div class="text-5xl mb-4">
🌐
</div>

<h3 class="text-2xl font-bold text-cyan-400 mb-3">
HTML / CSS
</h3>

<p class="text-gray-400 mb-6">
Questions HTML5, CSS3,
Flexbox et Responsive Design.
</p>

<a
href="play_quiz.php?category=HTML"
class="inline-block bg-cyan-500 px-5 py-3 rounded-lg hover:bg-cyan-400"
>
Commencer
</a>

</div>

<!-- JAVASCRIPT -->

<div class="bg-gray-900 rounded-2xl p-8 hover:scale-105 transition">

<div class="text-5xl mb-4">
⚡
</div>

<h3 class="text-2xl font-bold text-yellow-400 mb-3">
JavaScript
</h3>

<p class="text-gray-400 mb-6">
Variables, fonctions,
DOM et ES6.
</p>

<a
href="play_quiz.php?category=JavaScript"
class="inline-block bg-yellow-500 px-5 py-3 rounded-lg hover:bg-yellow-400"
>
Commencer
</a>

</div>

<!-- PHP -->

<div class="bg-gray-900 rounded-2xl p-8 hover:scale-105 transition">

<div class="text-5xl mb-4">
🐘
</div>

<h3 class="text-2xl font-bold text-purple-400 mb-3">
PHP / SQL
</h3>

<p class="text-gray-400 mb-6">
Backend, bases de données,
sessions et sécurité.
</p>

<a
href="play_quiz.php?category=PHP"
class="inline-block bg-purple-500 px-5 py-3 rounded-lg hover:bg-purple-400"
>
Commencer
</a>

</div>

</div>

<div class="mt-12 bg-gray-900 rounded-2xl p-8">

<h3 class="text-2xl font-bold mb-4 text-green-400">
📈 Progression
</h3>

<p class="text-gray-400">
Score actuel : 0 point
</p>

<p class="text-gray-500 mt-4">
Le classement et les statistiques arriveront dans une prochaine version.
</p>

</div>

</div>

</body>

</html>
