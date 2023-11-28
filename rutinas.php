<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutinas de Ejercicio</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1a1a1a;
            color: #fff;
        }
        header {
            background-color: #333;
            padding: 15px;
            text-align: center;
        }
        h1 {
            margin: 0;
            font-size: 2em;
        }
        nav {
            display: flex;
            justify-content: space-around;
            background-color: #333;
            padding: 10px 0;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1.2em;
            cursor: pointer;
        }
        nav a:hover {
            background-color: #555;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>

    <header>
        <h1>Rutinas de Ejercicio</h1>
    </header>

    <nav>
        <a href="#" onclick="mostrarTab('hombros')">Hombros</a>
        <a href="#" onclick="mostrarTab('pecho')">Pecho</a>
        <a href="#" onclick="mostrarTab('espalda')">Espalda</a>
        <a href="#" onclick="mostrarTab('triceps')">Tríceps</a>
        <a href="#" onclick="mostrarTab('piernas')">Piernas</a>
        <a href="#" onclick="mostrarTab('biceps')">Bíceps</a>
    </nav>

    <main>
        <div id="hombros" class="tab-content active">
            <h2>Rutinas para Hombros</h2>
            <!-- Videos para Hombros -->
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/faCpU9krYw0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/F_Nm010vVIE" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/tZWJAbWnAyI" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/-DQs4NFB8bI" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Puedes agregar más videos para Hombros según sea necesario -->
        </div>

        <div id="pecho" class="tab-content">
            <h2>Rutinas para Pecho</h2>
            <!-- Videos para Pecho -->
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/69qw9cqK1II" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/6N5SznlYoaY" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/7Ldd3gDAeuo" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ne9J3uBTWjI" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Puedes agregar más videos para Pecho según sea necesario -->
        </div>
        <div id="espalda" class="tab-content active">
            <h2>Rutinas para Hombros</h2>
            <!-- Videos para Hombros -->
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/RyBbL1ei_8w" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/eHs24ANXvqU" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ewrlrcNuoQc" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/mz-Fi2PI9h0" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Puedes agregar más videos para Hombros según sea necesario -->
        </div>

        <div id="triceps" class="tab-content">
            <h2>Rutinas para Pecho</h2>
            <!-- Videos para Pecho -->
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/1yn11YljFf0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Kb5uwcWiySs" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/-7KWZ0hpdII" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/smLEQsRMnc8" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Puedes agregar más videos para Pecho según sea necesario -->
        </div>
        <div id="piernas" class="tab-content active">
            <h2>Rutinas para Hombros</h2>
            <!-- Videos para Hombros -->
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/G6kfeXoHYWY" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/PaBk57-k5KU" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/6I5dBo7vNh4" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/b_-dV41fyYI" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Puedes agregar más videos para Hombros según sea necesario -->
        </div>

        <div id="biceps" class="tab-content">
            <h2>Rutinas para Pecho</h2>
            <!-- Videos para Pecho -->
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/I5BWvYRuN-0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/LQcQNJiVY24" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/bbukB64aiUU" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/YhmI3zYtzzA" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Puedes agregar más videos para Pecho según sea necesario -->
        </div>

        <!-- Repite la estructura para las otras categorías de ejercicio (Espalda, Tríceps, Piernas, Bíceps) -->

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            mostrarTab('hombros'); // Mostrar el tab 'Hombros' al cargar la página
        });
        function mostrarTab(tabId) {
            // Oculta todos los contenidos de las pestañas
            var tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(function (tab) {
                tab.classList.remove('active');
            });

            // Muestra el contenido de la pestaña seleccionada
            var selectedTabContent = document.getElementById(tabId);
            if (selectedTabContent) {
                selectedTabContent.classList.add('active');
            }
        }
    </script>

</body>
</html>
