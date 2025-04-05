<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF Énigme 1 - Le Manuscrit Cryptique</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f5e9d9;
            background-image: url('https://www.transparenttextures.com/patterns/parchment.png');
            color: #3a2c1a;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: rgba(245, 233, 217, 0.85);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            border: 1px solid #b38e6a;
            position: relative;
        }
        
        h1 {
            color: #5d3a1a;
            text-align: center;
            border-bottom: 2px solid #b38e6a;
            padding-bottom: 10px;
            font-family: 'Palatino Linotype', 'Book Antiqua', serif;
        }
        
        .manuscript {
            background-color: #f8f1e3;
            padding: 25px;
            border: 1px dashed #b38e6a;
            margin: 30px 0;
            position: relative;
            font-size: 18px;
            text-align: justify;
        }
        
        .number-clue {
            color: #8b4513;
            font-weight: bold;
            font-size: 20px;
        }
        
        .form-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8f1e3;
            border: 1px solid #b38e6a;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #b38e6a;
            background: #fff;
            font-family: 'Times New Roman', serif;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        button {
            background-color: #8b4513;
            color: white;
            border: none;
            padding: 12px 25px;
            margin-top: 10px;
            cursor: pointer;
            font-family: 'Palatino Linotype', serif;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }
        
        button:hover {
            background-color: #5d3a1a;
        }
        
        .message {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            display: none;
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
        <h1>Le Manuscrit Cryptique</h1>
        
        <div class="manuscript">
            <p>Au cœur de l'antique bibliothèque, un vieux manuscrit reposait sur une étagère poussiéreuse. Le titre de ce livre mystérieux était inscrit de manière étrange, chaque mot semblant être une combinaison de nombres :</p>
            
            <p>"Le chemin vers la connaissance est pavé de symboles anciens. Un nombre, comme <span class="number-clue">6e</span>, peut signifier le début d'un voyage. Chaque pas que tu fais, chaque chiffre que tu rencontres, te guide vers la vérité. Cherche les <span class="number-clue">6f</span>, qui sont liés à une sagesse oubliée. Là, tu découvriras un <span class="number-clue">73</span>, un chiffre qui symbolise l'équilibre. Ensuite, regarde le <span class="number-clue">72</span>, qui représente la force de la nature, et comprends qu'<span class="number-clue">65</span> ne peut être ignoré, il porte une promesse.</p>
            
            <p>Lorsque tu combines tout cela, tu trouveras un indice caché dans un vieux grimoire. L'<span class="number-clue">69</span> te permettra de franchir la première porte, et lorsque tu atteindras le <span class="number-clue">70</span>, un grand secret t'attendra. Mais n'oublie pas de faire une pause au <span class="number-clue">20</span>, là où tout est silencieux, avant de poursuivre avec <span class="number-clue">73</span>, le signe qui te rappellera ce que tu cherches.</p>
            
            <p>L'indice suivant, <span class="number-clue">61</span>, est tout près de l'endroit où l'on se rassemble, et <span class="number-clue">6d</span> te guidera vers la destination finale. Ne sois pas distrait par le <span class="number-clue">6f</span>, car <span class="number-clue">68</span> est la clé du dernier défi. Enfin, tout cela te conduira au <span class="number-clue">54</span>, le symbole ultime de la sagesse retrouvée."</p>
            
            <p style="text-align: right; font-style: italic;">J'espère que tu as bien écouté en cours !</p>
        </div>
        
        <div class="form-container">
            <form id="ctfForm" method="POST" action="traitemement_reponse.php">
                <input type="hidden" name="enigme_id" value="1">
                
                <div class="form-group">
                    <label for="reponse">Votre réponse :</label>
                    <input type="text" id="reponse" name="reponse" required placeholder="Entrez la solution...">
                </div>
            
                
                <button type="submit">Valider la réponse</button>
            </form>
            
            <div id="messageBox" class="message"></div>
        </div>
    </div>

    <script>
        document.getElementById('ctfForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const messageBox = document.getElementById('messageBox');
            messageBox.style.display = 'none';
            
            // Récupérer les données du formulaire
            const formData = new FormData(this);
            
            // Envoyer à votre script PHP
            fetch('verifier_reponse.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                messageBox.textContent = data.message;
                messageBox.className = 'message ' + (data.success ? 'success' : 'error');
                messageBox.style.display = 'block';
                
                if(data.success && data.redirect) {
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1500);
                }
            })
            .catch(error => {
                messageBox.textContent = "Erreur de connexion au serveur";
                messageBox.className = 'message error';
                messageBox.style.display = 'block';
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>