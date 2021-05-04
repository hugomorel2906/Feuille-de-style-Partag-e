
<?php

//machine hôte de la base (localhost ou numéro IP), login( root), password (absent ici - ce n'est pas bien)
$link = mysqli_connect('localhost', 'root', '');

// prise en compte du jeu de caractère de la base appelée
// utf8 convient pour les exos 
// mais utf8mb4 est nécessaire pour utilisation de jpgraph dans le projet.
mysqli_set_charset($link, "utf8mb4");

// Choix d'une BDD et message d'erreur si connexion impossible
mysqli_select_db($link, 'base_copie_copie') or die('Impossible de sélectionner la base de données'. mysqli_error($link));

?>

<br>


<!--include "../fonctions/connexion_bdd.php";-->