<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecruteurAI</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen">

    <div class="absolute inset-0 bg-gradient-to-br from-cyan-900 via-black to-purple-900"></div>

    <div class="relative z-10">

        <nav class="flex justify-between items-center p-6">

            <h1 class="text-3xl font-bold text-cyan-400">
                🤖 RecruteurAI
            </h1>

            <div class="space-x-4">

                <a href="login.php"
                   class="px-5 py-2 rounded-lg bg-cyan-500 hover:bg-cyan-400 transition">
                    Connexion
                </a>

                <a href="register.php"
                   class="px-5 py-2 rounded-lg border border-cyan-400 hover:bg-cyan-400 hover:text-black transition">
                    Inscription
                </a>

            </div>
        </nav>

        <section class="flex flex-col justify-center items-center text-center mt-24 px-6">

            <div class="text-8xl mb-6">
                ⚡
            </div>

            <h2 class="text-6xl font-bold mb-6">
                Prépare tes
                <span class="text-cyan-400">
                    entretiens techniques
                </span>
            </h2>

            <p class="text-gray-300 text-xl max-w-3xl mb-10">
                RecruteurAI est une plateforme d'entraînement pour développeurs.
                Teste tes connaissances en HTML, CSS, JavaScript,
                PHP, SQL, Git et algorithmes grâce à des quiz
                inspirés de véritables entretiens techniques.
            </p>

            <div class="flex gap-5">

                <a href="register.php"
                   class="bg-cyan-500 px-8 py-4 rounded-xl text-lg font-bold hover:bg-cyan-400 transition">
                    Commencer maintenant
                </a>

                <a href="login.php"
                   class="border border-cyan-500 px-8 py-4 rounded-xl text-lg font-bold hover:bg-cyan-500 transition">
                    Se connecter
                </a>

            </div>

        </section>

        <section class="mt-32 px-10">

            <div class="grid md:grid-cols-3 gap-8">

                <div class="bg-gray-900 p-8 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-bold text-cyan-400 mb-4">
                        💻 Développement Web
                    </h3>

                    <p class="text-gray-400">
                        HTML5, CSS3, JavaScript,
                        PHP, SQL et API REST.
                    </p>
                </div>

                <div class="bg-gray-900 p-8 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-bold text-purple-400 mb-4">
                        ⚙️ Questions réelles
                    </h3>

                    <p class="text-gray-400">
                        Inspirées des entretiens
                        de développeurs juniors et confirmés.
                    </p>
                </div>

                <div class="bg-gray-900 p-8 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-bold text-green-400 mb-4">
                        📈 Progression
                    </h3>

                    <p class="text-gray-400">
                        Suivi de tes scores
                        et amélioration continue.
                    </p>
                </div>

            </div>

        </section>

    </div>

</body>

</html>
