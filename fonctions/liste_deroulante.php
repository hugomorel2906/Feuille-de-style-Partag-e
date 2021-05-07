<?php
// Charlotte, Mailys & Mathilde
// 27/04/2021
// PROCEDURE QUI CREE UNE LISTE HTML à partir d'un tableau php 
// ex : creer_liste_HTML($name,$tab)
// paramètres à saisir : 
    // $name : le nom de la liste
    // $tab : tableau à 2 colonnes contenant : 
        // le value (l'identifiant pour le système)
        // le texte à afficher dans la liste pour l'utilisateur


function creer_liste_HTML($name,$tab) // Cette liste affichera les aliments 
{
	echo "<select class='form-select form-select-sm' aria-label='.form-select-sm example' id='' name='".$name."'value=''>";
	
    echo PHP_EOL; // crée un retour de ligne dans le code HTML
    for ($i=0; $i < count($tab); $i++)
    {
        echo "<option value= '" . $tab[$i][0] . "'>". $tab[$i][1] . "</option>";

        echo PHP_EOL;
    }
    echo "</select>";
}



// PROCEDURE QUI CREE UNE LISTE HTML à partir d'une liste php 
// ex : creer_liste_HTML_2($name,$tab)
// paramètres à saisir : 
    // $name : le nom de la liste
    // $tab : liste à 1 colonnes contenant : 
        // les valeurs à afficher dans la liste pour l'utilisateur
		
		
function creer_liste_HTML_2($name,$liste,$id_selected)  // Cette liste servira pour la taille par exemple
{
	echo "<select class='form-select form-select-sm' aria-label='.form-select-sm example' id='' name='".$name."'value=''>";
	echo PHP_EOL; // crée un retour de ligne dans le code HTML, utile en debogage 
	for ($i=0; $i < count($liste); $i++){
		if ($id_selected==$liste[$i]){
			echo "<option value= '".$liste[$i]."' selected> ".$liste[$i]."</option>"; // met en valeur l'indice du trimestre dans la liste et affiche le trimestre
		}
		else {
			echo "<option value= '".$liste[$i]."'> ".$liste[$i]."</option>";
		}
		echo PHP_EOL;
		}
	echo "</select>";
}


// fonction avec case vide pour non sélection
function creer_liste_HTML_3($name,$tab) // Cette liste affichera les aliments 
{
	echo "<select class='form-select form-select-sm' aria-label='.form-select-sm example' id='' name='".$name."'value=''>
	<option selected value=''><em>Choisis un aliment déjà consommé</em></option>";
	
    echo PHP_EOL; // crée un retour de ligne dans le code HTML
    for ($i=0; $i < count($tab); $i++)
    {
        echo "<option value= '" . $tab[$i][0] . "'>". $tab[$i][1] . "</option>";

        echo PHP_EOL;
    }
    echo "</select>";
}


//fct avec  
function creer_liste_HTML_4($name,$tab) // Cette liste affichera les aliments 
{
	echo "<select class='form-select form-select-sm' aria-label='.form-select-sm example' id='' name='".$name."'value=''>";
	
    echo PHP_EOL; // crée un retour de ligne dans le code HTML
    for ($i=0; $i < count($tab); $i++)
    {
        echo "<option value= '" . $tab[$i][0] . "'>". $tab[$i][1],' ',$tab[$i][2] . "</option>";

        echo PHP_EOL;
    }
    echo "</select>";
}
?>
