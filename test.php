<?php
//Lire dans une base de donnée

// Sous MAMP appel de la BDD MySQl ainsi qu'une ligne permettant à php de mieux détailler les erreurs

$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


//Récupération des données sous forme de tableaux grâce à query(requête)
$reponse = $bdd->query(
    'SELECT * FROM jeux_video                   /*Les mots clés doivent impérativement apparaitre dans cet ordre */
    WHERE possesseur=\'Florent\' AND prix < 20  /*On peut aussi utiliser OR à la place de AND*/
    ORDER BY prix DESC                          /*Sans DESC = Croissant, avec DESC = Décroissant */
    LIMIT 0, 4');                               /*LIMIT (après), (tant de fois) */


//Afficher chaque éléments grâce à la fonction fetch() qui "va chercher".
while ($donnees = $reponse->fetch())
{
    echo $donnees['possesseur'] . ' possède ' . $donnees['nom'] . ' pour ' . $donnees['prix'] . 'euros,<br>';

}

//Quand on a fini on coupe le contact avec la BDD
$reponse->closeCursor();
?>

<?php
//Pour connaitre les erreurs SQl
$reponse = $bdd->query('SELECT nom, prix FROM jeux_video WHERE possesseur=\'Patrick\' ORDER BY nom')
or die(print_r($bdd->errorInfo()));     //On utilise print_r avant une boucle while

while ($donnees = $reponse->fetch())
{
    echo '<br>' . $donnees['nom'] . ' coûte ' . $donnees['prix'] . 'euros.';
}

$reponse->closeCursor();
?>


<?php
//Ecrire dans une base de donnée


//Appel de la BDD ainsi qu'une ligne permettant à php de mieux détailler les erreurs de code.
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


//Aouter des éléments à la BDD grâce à exec(exécuter)
$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
            VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');
            /*OR
            INSERT INTO jeux_video
            VALUES('', 'Battlefield 1942', 'Patrick', 'PC', 45, 50, '2nde guerre mondiale') */

echo '<br> <br>Le jeu Battlefield 1942 a bien été ajouté !';

/*Faire un ajout via une requête préparée
(avec cette méthode on utilise $_POST issu d'un formulaire)
"prepare" à la place d' "exec":

$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
                    VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');

$req->execute(array(
	'nom' => $nom,
	'possesseur' => $possesseur,
	'console' => $console,
	'prix' => $prix,
	'nbre_joueurs_max' => $nbre_joueurs_max,
	'commentaires' => $commentaires
	));
*/


//Modifier la BDD : UPDATE .. SET .. WHERE .. 
$bdd->exec('UPDATE jeux_video
            SET prix = 10, nbre_joueurs_max = 32
            WHERE nom = \'Battlefield 1942\'');

echo "<br> Le jeu Battlefield 1942 a bien été modifié.";


//Supprimer des entrées dans la BDD : DELETE FROM .. WHERE .. 
//Le WHERE est capital !
$bdd->exec('DELETE FROM jeux_video WHERE nom = \'Battlefield 1942\'');

echo '<br> Le jeu Battlefield 1942 a bien été supprimé.';

//Et on ferme à nouveau le contact avec la BDD
$reponse->closeCursor();
?>