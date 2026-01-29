<!doctype html>
<html lang="fr" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Pokemon TCG - Robin Cerisier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="../js/tailwind-config.js"></script>
</head>
<body class="font-sans text-gray-700 dark:text-gray-300 antialiased bg-gray-50 dark:bg-gray-950 flex flex-col min-h-screen transition-colors duration-300">

<nav class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 sticky top-0 z-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <a href="../" class="font-display font-bold text-gray-900 dark:text-white hover:text-brand-primary dark:hover:text-blue-400 transition">Robin Cerisier</a>
             
             <div class="flex items-center space-x-4">
                <a href="../" class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition flex items-center">
                    <svg class="w-4 h-4 mr-1" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Retour
                </a>
             </div>
        </div>
    </div>
</nav>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex-grow w-full">
    
    <header class="text-center mb-16">
        <div class="inline-block px-4 py-1.5 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-400 text-sm font-bold tracking-wide uppercase mb-4">Projet S2 - Phase 2</div>
        <h1 class="font-display text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-6">Pokemon TCG (Interface)</h1>
        <p class="text-xl text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">
            Conception et développement d'une interface graphique riche en JavaFX pour le jeu de cartes Pokémon.
        </p>
    </header>

    <div class="space-y-12">
        <section class="bg-white dark:bg-gray-900 rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100 dark:border-gray-800 transition-colors">
            <h2 class="font-display text-2xl font-bold text-gray-900 dark:text-white mb-6">Contexte et Objectifs</h2>
            <div class="prose prose-lg text-gray-600 dark:text-gray-300 max-w-none">
                <p>
                    Ce projet s'inscrit dans la SAE S2.01 et constitue la <strong>seconde phase</strong> du développement du jeu. L'objectif principal était de concevoir une interface graphique ergonomique et réactive en <strong>JavaFX</strong>, se greffant sur un backend fourni par une enseignante.
                </p>
                <div class="my-8 p-6 bg-gray-50 dark:bg-gray-800 rounded-xl border-l-4 border-brand-primary dark:border-blue-500">
                    <p class="font-semibold text-gray-900 dark:text-white m-0">Architecture MVC & Encapsulation</p>
                    <p class="m-0 text-sm mt-1">Le défi technique résidait dans l'intégration stricte avec le package <code>mecanique</code> (logique immuable) via des interfaces façades, tout en assurant une séparation nette avec le package <code>vues</code>.</p>
                </div>
            </div>
        </section>

        <section class="bg-white dark:bg-gray-900 rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100 dark:border-gray-800 transition-colors">
            <h2 class="font-display text-2xl font-bold text-gray-900 dark:text-white mb-8">Implémentation Technique</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-3 flex items-center">
                        <span class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900 text-brand-primary dark:text-blue-300 flex items-center justify-center mr-3">1</span>
                        Composants Intelligents
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-4">
                        Création de vues modulaires et réutilisables (<code>VueCarte</code>, <code>VuePokemon</code>) agissant comme leurs propres contrôleurs. Utilisation avancée de <code>StackPane</code> pour la composition des éléments visuels (carte, énergies, dégâts).
                    </p>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-3 flex items-center">
                        <span class="w-8 h-8 rounded-lg bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 flex items-center justify-center mr-3">2</span>
                        Réactivité & Performance
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-4">
                        Liaison bidirectionnelle (Bindings) pour une mise à jour temps réel de l'UI. Implémentation d'un <strong>ImageCache</strong> pour optimiser le chargement des assets et garantir la fluidité.
                    </p>
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-gray-100 dark:border-gray-800">
                 <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-4">Fonctionnalités Clés</h3>
                 <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm text-gray-600 dark:text-gray-400">
                    <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> VueAdversaire avec interactions complètes</li>
                    <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Système de Preview au survol (Zoom)</li>
                    <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Design Responsive via Bindings dynamiques</li>
                    <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Gestion visuelle de la Défausse et de la Pioche</li>
                 </ul>
            </div>
        </section>

        <section class="bg-white dark:bg-gray-900 rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100 dark:border-gray-800 transition-colors">
            <h2 class="font-display text-2xl font-bold text-gray-900 dark:text-white mb-8">Aperçu du Résultat</h2>
            <div class="bg-gray-100 dark:bg-gray-800 rounded-2xl overflow-hidden shadow-2xl relative group cursor-pointer transition-colors">
                 <img src="../img/ptcgihmJeu.png" alt="Interface du jeu Pokemon TCG en JavaFX" class="w-full h-auto object-cover transform hover:scale-[1.02] transition duration-500">
            </div>
            <p class="text-center text-sm text-gray-400 mt-4">Vue du plateau de jeu lors d'une partie active</p>
        </section>

        <section class="bg-white dark:bg-gray-900 rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100 dark:border-gray-800 transition-colors">
            <h2 class="font-display text-2xl font-bold text-gray-900 dark:text-white mb-8">Architecture IHM (UML)</h2>
            <div class="bg-gray-100 dark:bg-gray-800 rounded-2xl overflow-hidden shadow-2xl relative group cursor-pointer transition-colors">
                 <img src="../img/ptcgihmUML.png" alt="Diagramme de classes UML de l'interface graphique" class="w-full h-auto object-cover transform hover:scale-[1.02] transition duration-500">
            </div>
            <p class="text-center text-sm text-gray-400 mt-4">Organisation des vues et contrôleurs (MVC)</p>
        </section>
    </div>

    <div class="max-w-4xl mx-auto mt-16 pt-8 border-t border-gray-200 dark:border-gray-800 flex justify-between">
        <a href="../pokemon-tcg/" class="text-brand-primary dark:text-blue-400 font-bold hover:underline">&larr; Projet Précédent : Pokemon TCG (Moteur)</a>
        <a href="../demos/" class="text-brand-primary dark:text-blue-400 font-bold hover:underline">Projet Suivant : Demos &rarr;</a>
    </div>

</div>

<footer class="py-8 text-center text-gray-400 dark:text-gray-500 text-sm">
    &copy; <?= (new dateTime())->format('Y') ?> Robin Cerisier
</footer>

<script src="../js/main.js"></script>
</body>
</html>
