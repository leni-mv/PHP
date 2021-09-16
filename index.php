<!DOCTYPE html>

<!-- Découverte de la méthode GET via les données contenues dans l'url -->

<a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a>

<p>Ensuite :</p>

<!-- Découverte de la méthode POST via un formulaire html -->

<form method="post" action="cible.php">
    <p>Pseudo : 
        <input type="text" name="pseudo" />
        <input type="submit" value="Valider" />
    </p>
    <p>
        Langue :
        <select name="choix" id="">
            <option value="espagnol">Spanish</option>
            <option value="français" selected="selected">Français</option>
            <option value="anglais">English</option>
        </select>
    </p>
    <p>
        <textarea name="message" id="" cols="30" rows="10"></textarea>
    </p>

</form>