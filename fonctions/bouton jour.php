<?php
//Oriane BURTSCHER et Agathe PICAVET

//PROCEDURE QUI CREE des boutons HTML A PARTIR d'un tableau php 
// ex : Jours_semaine($name,$tab)
// paramètres à saisir : 
    // $name : le nom de la liste
    // $tab : tableau à 2 colonnes contenant : 
        // le value (l'identifiant pour le système)
        // le texte à afficher dans la liste pour l'utilisateur
function Jours_semaine($name,$tab,$selected)
{
    echo PHP_EOL; // crée un retour de ligne dans le code HTML, utile en debogage / à tester en l'oubliant !
    for ($i=0; $i < count($tab); $i++)
    {
        if($selected == $tab[$i][0])
		{
			echo "<button type='submit' class='btn btn-outline-success m-3 active' id='' name='".$name."' value='".$tab[$i][0]."'>".$tab[$i][1]."</button>";
		}
		else
		{		
			echo "<button type='submit' class='btn btn-outline-success m-3' id='' name='".$name."' value='".$tab[$i][0]."'>".$tab[$i][1]."</button>";
		}
        echo PHP_EOL;
    }   
}
?>