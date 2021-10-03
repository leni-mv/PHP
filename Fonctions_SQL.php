<?php
    //Test des fonction scalaires et d'agrégat MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $reponse = $bdd->query('SELECT UPPER(nom) AS nom_majuscule FROM jeux_video WHERE possesseur=\'Patrick\' ORDER BY nom LIMIT 0, 5');
    echo "Voici la fonction scalaire UPPER : <br> <br>";
    while ($donnee = $reponse->fetch())
    {
        echo $donnee['nom_majuscule'] . "<br>";
    }
    echo "<br>";

    $reponse = $bdd->query('SELECT LOWER(nom) AS nom_min FROM jeux_video WHERE possesseur=\'Patrick\' ORDER BY nom LIMIT 0, 5');
    echo "Voici la fonction scalaire LOWER : <br> <br>";
    while ($donnee = $reponse->fetch())
    {
        echo $donnee['nom_min'] . "<br>";
    }
    echo "<br>";

    $reponse = $bdd->query('SELECT LENGTH(nom) AS nom_L FROM jeux_video WHERE possesseur=\'Patrick\' ORDER BY nom LIMIT 0, 5');
    echo "Voici la fonction scalaire LENGTH : <br> <br>";
    while ($donnee = $reponse->fetch())
    {
        echo $donnee['nom_L'] . "<br>";
    }
    echo "<br>";
    
    //Fonction d'agrégat maintenant

    $reponse = $bdd->query('SELECT AVG(prix) AS prix_moy, console FROM jeux_video WHERE possesseur=\'Michel\' GROUP BY console HAVING prix_moy <= 10');
    echo "Voici la fonction d'agrégat AVG avec les fonctions GROUP BY et HAVING : <br> <br>";
    while ($donnee = $reponse->fetch())
    {
        echo $donnee['prix_moy'] . " pour la console " . $donnee['console'] . "<br>";
    }
    echo "<br>";

    $reponse = $bdd->query('SELECT SUM(prix) AS prix_total FROM jeux_video WHERE possesseur=\'Michel\' ORDER BY nom LIMIT 0, 5');
    echo "Voici la fonction d'agrégat SUM : <br> <br>";
    while ($donnee = $reponse->fetch())
    {
        echo "Michel a au total " . $donnee['prix_total'] . "euros de jeux sur ce site !" . "<br>";
    }
    echo "<br>";

    $reponse = $bdd->query('SELECT MIN(prix) AS prix_min FROM jeux_video WHERE possesseur=\'Michel\' ORDER BY nom LIMIT 0, 5');
    echo "Voici la fonction d'agrégat MIN : <br> <br>";
    while ($donnee = $reponse->fetch())
    {
        echo "Son jeu le moins cher est à " . $donnee['prix_min'] . "euros et le plus cher est à .. <br>";
    }
    echo "<br>";

    $reponse = $bdd->query('SELECT MAX(prix) AS prix_max FROM jeux_video WHERE possesseur=\'Michel\' ORDER BY nom LIMIT 0, 5');
    echo "Voici la fonction d'agrégat MAX : <br> <br>";
    while ($donnee = $reponse->fetch())
    {
        echo "... " . $donnee['prix_max'] . "euros ! ";
    }

    $reponse->closeCursor();
?>
