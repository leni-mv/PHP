<?php
    // création de variables qui vont permettre de vérifier le mot de passe

    $mot_de_passe_utilisateur = htmlspecialchars($_POST["mot_de_passe_utilisateur"]);
    $mot_de_passe_utilisateur = isset($mot_de_passe_utilisateur);
    $vrai_mot_de_passe = "Kangourou";


    //vérification que le mot de passe utilisateur est identique à celui attendu

    if (strlen($mot_de_passe_utilisateur) == strlen($vrai_mot_de_passe))
    {
        for ($i = 0 ; $i < 9 ; $i++)
        {
            if ($mot_de_passe_utilisateur[$i] == $vrai_mot_de_passe[$i])
            {
                if ($i == 8)
                {
                    echo "Ton mot de passe est correct ! Tu es autorisé à entrer : <br>";
                    ?>
                    <a href="secret.php"> Entrez ici >>> </a></p>
                    <?php
                }
            }
            else
            {
                echo "Le mot de passe est incorrect !";
                break;
            }
        }
    }
    else
    {
        echo "Le mot de passe est incorrect !";
    }
?>


