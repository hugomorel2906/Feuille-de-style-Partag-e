<?php

//Oriane BURTSCHER et Agathe PICAVET

//PROCEDURE QUI CREE des choix radio HTML A PARTIR d'un tableau php 
// ex : Case_A_Cocher($name,$tab)
// paramètres à saisir : 
    // $name : le nom de la liste
    // $tab : tableau à 2 colonnes contenant : 
        // le value (l'identifiant pour le système)
        // le texte à afficher dans la liste pour l'utilisateur
function Case_A_Cocher($name,$tab,$selected)
{
    echo PHP_EOL; // crée un retour de ligne dans le code HTML, utile en debogage / à tester en l'oubliant !
    for ($i=0; $i < count($tab); $i++)
    {
        if($selected == $tab[$i][0])
		{
			echo "<div class='form-check form-check-inline'>
				<input class='form-check-input' type='radio' id='".$tab[$i][1]."' name='".$name."' value= '" . $tab[$i][0] . "' checked='yes' ><label class='form-check-label' for='flexCheckDefault' >"
				.$tab[$i][1]."</label></div>";
		}
		else
		{		
			echo "<div class='form-check form-check-inline'>
				<input class='form-check-input' type='radio' id='".$tab[$i][1]."' name='".$name."' value= '" . $tab[$i][0] . "' ><label class='form-check-label' for='flexCheckDefault' >"
				. $tab[$i][1] . "</label></div>";		
		}
        echo PHP_EOL;
    }   
}
?>
