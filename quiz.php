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

<title>RecruteurAI - Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-black text-white min-h-screen overflow-x-hidden">

<div class="fixed inset-0 bg-gradient-to-br from-cyan-900 via-black to-purple-900 -z-10"></div>

<nav class="flex justify-between items-center p-6 border-b border-cyan-800">

<h1 class="text-3xl font-bold text-cyan-400">
🤖 RecruteurAI
</h1>

<a
href="logout.php"
class="bg-red-500 hover:bg-red-400 px-5 py-2 rounded-lg transition"
>
Déconnexion
</a>

</nav>

<div class="max-w-7xl mx-auto px-6 py-12">

<div class="bg-gray-900 rounded-2xl p-8 shadow-xl mb-10">

<h2 class="text-4xl font-bold mb-4">
Bienvenue
<span class="text-cyan-400">
<?= htmlspecialchars($_SESSION["username"]) ?>
</span>
👋
</h2>

<p class="text-gray-300 text-lg">
Teste tes compétences techniques et améliore ton profil développeur.
</p>

<div class="flex flex-wrap gap-4 mt-6">

<a
href="leaderboard.php"
class="bg-yellow-500 hover:bg-yellow-400 px-6 py-3 rounded-lg transition"
>
🏆 Classement
</a>

<a
href="history.php"
class="bg-green-500 hover:bg-green-400 px-6 py-3 rounded-lg transition"
>
📚 Historique
</a>

</div>

</div>

<div class="grid md:grid-cols-3 gap-8">

<div class="bg-gray-900 rounded-2xl p-8 hover:scale-105 hover:shadow-cyan-500/30 shadow-xl transition duration-300">

<div class="text-5xl mb-4">
🌐
</div>

<h3 class="text-2xl font-bold text-cyan-400 mb-3">
HTML
</h3>

<p class="text-gray-400 mb-6">
Balises, formulaires, sémantique et structure des pages web.
</p>

<a
href="play_quiz.php?category=HTML"
class="inline-block bg-cyan-500 px-5 py-3 rounded-lg hover:bg-cyan-400"
>
Commencer
</a>

</div>

<div class="bg-gray-900 rounded-2xl p-8 hover:scale-105 hover:shadow-blue-500/30 shadow-xl transition duration-300">

<div class="text-5xl mb-4">
🎨
</div>

<h3 class="text-2xl font-bold text-blue-400 mb-3">
CSS
</h3>

<p class="text-gray-400 mb-6">
Flexbox, Grid, Responsive Design, animations et styles.
</p>

<a
href="play_quiz.php?category=CSS"
class="inline-block bg-blue-500 px-5 py-3 rounded-lg hover:bg-blue-400"
>
Commencer
</a>

</div>

<div class="bg-gray-900 rounded-2xl p-8 hover:scale-105 hover:shadow-yellow-500/30 shadow-xl transition duration-300">

<div class="text-5xl mb-4">
⚡
</div>

<h3 class="text-2xl font-bold text-yellow-400 mb-3">
JavaScript
</h3>

<p class="text-gray-400 mb-6">
Variables, fonctions, DOM, objets et ES6.
</p>

<a
href="play_quiz.php?category=JavaScript"
class="inline-block bg-yellow-500 px-5 py-3 rounded-lg hover:bg-yellow-400"
>
Commencer
</a>

</div>

<div class="bg-gray-900 rounded-2xl p-8 hover:scale-105 hover:shadow-purple-500/30 shadow-xl transition duration-300">

<div class="text-5xl mb-4">
🐘
</div>

<h3 class="text-2xl font-bold text-purple-400 mb-3">
PHP
</h3>

<p class="text-gray-400 mb-6">
Sessions, formulaires, variables, sécurité et backend.
</p>

<a
href="play_quiz.php?category=PHP"
class="inline-block bg-purple-500 px-5 py-3 rounded-lg hover:bg-purple-400"
>
Commencer
</a>

</div>

<div class="bg-gray-900 rounded-2xl p-8 hover:scale-105 hover:shadow-green-500/30 shadow-xl transition duration-300">

<div class="text-5xl mb-4">
🗄️
</div>

<h3 class="text-2xl font-bold text-green-400 mb-3">
SQL
</h3>

<p class="text-gray-400 mb-6">
Requêtes, SELECT, INSERT, UPDATE et gestion de bases.
</p>

<a
href="play_quiz.php?category=SQL"
class="inline-block bg-green-500 px-5 py-3 rounded-lg hover:bg-green-400"
>
Commencer
</a>

</div>

<div class="bg-gray-900 rounded-2xl p-8 hover:scale-105 hover:shadow-orange-500/30 shadow-xl transition duration-300">

<div class="text-5xl mb-4">
🔧
</div>

<h3 class="text-2xl font-bold text-orange-400 mb-3">
Git
</h3>

<p class="text-gray-400 mb-6">
Versioning, GitHub, branches, commits et collaboration.
</p>

<a
href="play_quiz.php?category=Git"
class="inline-block bg-orange-500 px-5 py-3 rounded-lg hover:bg-orange-400"
>
Commencer
</a>

</div>

</div>

<div class="mt-12 bg-gray-900 rounded-2xl p-8 shadow-xl">

<h3 class="text-2xl font-bold text-green-400 mb-4">
📊 Progression
</h3>

<p class="text-gray-300">
Continue les quiz pour améliorer ton classement et obtenir le badge Expert.
</p>

<div class="w-full bg-gray-700 rounded-full h-4 mt-6">

<div
class="bg-cyan-500 h-4 rounded-full"
style="width: 50%;"
></div>

</div>

<p class="mt-3 text-gray-400">
Objectif : devenir Expert 🚀
</p>

</div>

</div>

</body>
</html>
