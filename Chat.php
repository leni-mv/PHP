<?php
session_start();
session_destroy();
?>

<!Doctype html>
<html>
    <head>
        <title>Ceci est une page de test</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <h2>Bienvenu dans ce mini chat !</h2> <br>
        <form method="post" action="Chat.php">
            <p>Entrez votre pseudo : 
                <input type="text" name="pseudo"> <br>
                <textarea name="texte" id="" cols="30" rows="10"></textarea> <br>
                <input type="submit" value="Envoyer"> <br>
            </p>
            <?php
                
                //vérifier et enregistrer la variable dans $_SESSION
                if (isset($_POST['pseudo']) AND isset($_POST['texte']))
                {
                    $_SESSION['pseudo'] = htmlspecialchars($_POST['pseudo']);
                    $_SESSION['texte'] = htmlspecialchars($_POST['texte']);
                }
                //ouvrir la bdd mini_chat (ID, pseudo, message)
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');

                //Ajout des données à la BDD
                $req = $bdd->prepare('INSERT INTO mini_chat(pseudo, messages) VALUES(:pseudo, :messages)');
                $req->execute(array(
                    'pseudo' => $_SESSION['pseudo'],
                    'messages' => $_SESSION['texte']
                ));

                // et les renvoyer à Chat en affichant que les dix dernière du tableau (ORDER BY ID DESC)
                $reponse = $bdd->query('SELECT pseudo, messages FROM mini_chat ORDER BY ID DESC LIMIT 0, 10');
                
                while ($donnees = $reponse->fetch())
                {
                    echo '<strong>' . $donnees['pseudo'] . '</strong> : ' . $donnees['messages'] . '</p>';
                }

                $reponse->closeCursor();
            ?>
            <p>
                <!-- Endroit où apparaitront les messages -->
            </p>

        </form>
    </body>
    
</html>