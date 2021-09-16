<?php
//mettre name = pseudo, message dans des variables grâce à $_POST et vérifier données via isset et htmlspecialchars
if (isset($_POST['pseudo']) AND isset($_POST['texte']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $texte = htmlspecialchars($_POST['texte']);
    echo 'variables ok !' . $texte;
    //Créer la BDD "mini_chat" (ID pseudo message)
    //Ouvrir la BDD et enregistrer variables dans BDD (prepare)
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    echo '<br> BDD ouverte';
    //Ajout des données à la BDD
    $req = $bdd->prepare('INSERT INTO mini_chat(pseudo, texte) VALUES(:pseudo, :texte');
    echo '<br> Variable $req paramétrée';
    //On enregistre les données dans la BDD
    $req->execute(array('pseudo' => $pseudo, 'texte' => $texte));
    echo '<br> Inormations enregistrées dans a BDD';
}






// et les renvoyer à Chat en affichant que les dix dernière du tableau (ORDER BY ID DESC)
?>