<?php

if (isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['repeter']))
{
    $_GET['repeter'] == (int) $_GET['repeter'];
    if ($_GET['repeter'] >= 1 AND $_GET['repeter'] <= 100)
    {
        for ($i = 0 ; $i < $_GET['repeter'] ; $i++)
        {
            echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . '<br>';
        }
    }
    else{
        echo 'Le nombre de répétitions ne peut pas être inférieur à 1 ou supérieur à 100 !';
    }
}

else
{
    echo 'Il faut renseigner un nom, un prénom et un nombre de répétitons !';
}

?>

<!-- echo 'Bonjour' . $_GET['prenom'] . ' ' . $_GET['nom'] . '<br>'; -->