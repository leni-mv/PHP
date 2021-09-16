
<?php
$variable = 17;
echo "Avant j'avais ";
echo $variable;
echo " an. ";
echo "Le visiteur a $variable ans.";

//meilleure méthode pour la lisibilité et la rapidité d'exécution php
echo 'Le visiteur a ' . $variable . 'ans. ' , "<br />";
?> <br>

<?php
$calcul = 5 + 2;
$calcul2 = $calcul + 10;
$modulo = 7 % 3;
echo $calcul , $calcul2 , $modulo;
?> <br> <br>

<?php
/* symole_a_connaitre : == > < >= <= !=
('est différet de' pour le dernier) */
$age = 2;

if ($age <= 12)
{
    echo "Salut gamin !";
}

elseif ($age >=12)
{
    echo "Tu es trop grand";
}
else
{
    echo "Ce site n'est pas pour toi ";
}
?> <br> <br>

<?php
$note = 20;

switch ($note) // on indique sur quelle variable on travaille
{ 
    case 0: // dans le cas où $note vaut 0
        echo "Tu es vraiment un gros nul !!!";
    break;
    
    case 5: // dans le cas où $note vaut 5
        echo "Tu es très mauvais";
    break;
    
    case 7: // dans le cas où $note vaut 7
        echo "Tu es mauvais";
    break;
    
    case 10: // etc. etc.
        echo "Tu as pile poil la moyenne, c'est un peu juste…";
    break;
    
    case 12:
        echo "Tu es assez bon";
    break;
    
    case 16:
        echo "Tu te débrouilles très bien !";
    break;
    
    case 20:
        echo "Excellent travail, c'est parfait !";
    break;
    
    default:
        echo "Désolé, je n'ai pas de message à afficher pour cette note";
}
?>

<?php

$liste[0] = 'Mathieu';
$liste[1] = 'Marie';
$tableau = array( 'nom' => 'Adelaide' , 'age' => '36');

for ($num = 0 ; $num < 2 ; $num++ )
{
    echo '<p>' . $liste[$num] . '</p>';
}

foreach ($tableau as $case => $nawak)
{
    echo '<p>' . $case . " " . $nawak . '</p>';
}

function mafonction($prenom)
{
    echo '<p>Bonjour ' . $prenom . ' !</p>';
}
mafonction($liste[1]);
?>

