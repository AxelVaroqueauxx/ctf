<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF OSINT - Accueil</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f5e9d9;
            background-image: url('https://www.transparenttextures.com/patterns/parchment.png');
            color: #3a2c1a;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            padding: 30px;
            background-color: rgba(245, 233, 217, 0.85);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            border: 1px solid #b38e6a;
            position: relative;
        }

        h1 {
            color: #5d3a1a;
            border-bottom: 2px solid #b38e6a;
            padding-bottom: 10px;
            font-family: 'Palatino Linotype', 'Book Antiqua', serif;
            margin-bottom: 40px;
        }

        .button-container {
            position: relative;
            width: 400px;
            height: 400px;
            margin: 30px auto;
        }

        .fake-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px 30px;
            background-color: #8b4513;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 0 15px rgba(139, 69, 19, 0.7);
            z-index: 10;
            transition: all 0.3s;
            font-family: 'Palatino Linotype', serif;
        }

        .fake-button:hover {
            background-color: #5d3a1a;
            transform: translate(-50%, -50%) scale(1.05);
        }

        .arrow {
            position: absolute;
            font-size: 36px;
            cursor: pointer;
            color: #8b4513;
            opacity: 0.6;
            transition: all 0.3s;
            text-shadow: 0 0 5px rgba(139, 69, 19, 0.5);
        }

        /* Positionnement des flèches */
        .arrow:nth-child(1) { top: 15%; left: 50%; transform: translateX(-50%); } /* ↓ */
        .arrow:nth-child(2) { top: 50%; left: 15%; transform: translateY(-50%); } /* → */
        .arrow:nth-child(3) { top: 50%; right: 15%; transform: translateY(-50%); } /* ← */
        .arrow:nth-child(4) { bottom: 15%; left: 50%; transform: translateX(-50%); } /* ↑ */
        .arrow:nth-child(5) { top: 25%; left: 25%; } /* ↘ */
        .arrow:nth-child(6) { top: 25%; right: 25%; } /* ↙ */
        .arrow:nth-child(7) { bottom: 25%; left: 25%; } /* ↗ */
        .arrow:nth-child(8) { bottom: 25%; right: 25%; } /* ↖ */

        .arrow:hover {
            opacity: 1;
            transform: scale(1.3);
            color: #5d3a1a;
        }

        /* Vrai bouton caché */
        .arrow:nth-child(8) {
            color: #d4a017;
        }

        .arrow:nth-child(8):hover {
            color: #ffd700;
            transform: scale(1.5);
        }

        .rules {
            margin-top: 30px;
            font-style: italic;
            color: #5d3a1a;
        }

        .burn-mark {
            position: absolute;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, transparent 60%, rgba(0,0,0,0.2) 100%);
            opacity: 0.3;
            right: 50px;
            top: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="burn-mark"></div>
        <h1>CTF OSINT - Épreuve d'Axel</h1>
        
        <p>Bienvenue dans ce challenge d'OSINT. Trouvez le vrai chemin parmi les leurres...</p>
        
        <div class="button-container">
            <!-- Faux bouton central -->
            <button class="fake-button" onclick="fakeButtonClick()">Cliquez ici pour commencer</button>
            
            <!-- Flèches directionnelles -->
            <div class="arrow">↓</div>
            <div class="arrow">→</div>
            <div class="arrow">←</div>
            <div class="arrow">↑</div>
            <div class="arrow">↘</div>
            <div class="arrow">↙</div>
            <div class="arrow">↗</div>
            <div class="arrow" onclick="realButtonClick()">↖</div>
        </div>
        
        <div class="rules">
            <p>Astuce : Les apparences sont parfois trompeuses.<br>
            Cherchez bien avant de cliquer !</p>
        </div>
    </div>

    <script>
        function fakeButtonClick() {
            window.location.href = "https://rassemblementnational.fr/";
        }
        
        function realButtonClick() {
            window.location.href = "enigme1.php";
        }

        // Protection basique
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            alert("L'inspection est désactivée pour ce CTF !");
        });
    </script>
</body>
</html>