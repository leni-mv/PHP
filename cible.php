<p>
    <?php
        echo "Enchanté " . htmlspecialchars($_POST['pseudo']) . ' !';
    ?>
</p>

<p>
    <?php
        echo "Ton message :  " . htmlspecialchars($_POST['message']);
    ?>
</p>
<p>
<?php
        echo "Tu parles en " . htmlspecialchars($_POST['choix']) . ' !';
    ?>
</p>
<p>

<p>Si tu veux modifier tes informations, <a href="index.php">clique ici</a> pour revenir à la page formulaire.php.</p>
</p>