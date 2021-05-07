<?php

// Charlotte, Mathilde & Mailys
// 26/04/2021
// PROCEDURE QUI CREE UN TABLEAU 
    // ex: Creer_tab_HTML($tab,$nbcol,$nblig,$t)
    // paramètres à saisir:
        // $tab: tableau
        // $nbcol: nombre de colonnes du tableau
        // $nblig: nombre de lignes du tableau
        // $t: tableau de titre (1 ligne) saisir "NULL" pour ne pas afficher le titre
    // sortie: affichage tableau HTML


function Creer_tab_html($tab,$nbcol,$nblig,$t,$id_jour)
{
    echo "<CENTER><table class='table table-bordered table-custom'>";                // début du tableau

    if (isset($t)==TRUE)                              // on teste l'existence de $t (le titre)
    {
        echo "<THEAD class='thead-dark'>";                               // crée l'en-tête du tableau avce les noms des champs de la requête
        echo "<TR style='text-align:center'>";
        for ($i=0; $i < $nbcol; $i++)                 // boucle parcourant chaque colonne du recordset, 
        {
            echo "<TH scope='col'>" . $t[$i] . "</TH>";           // affichage de la ligne d'entête
        } 
        echo "</TR>";
        echo "</THEAD>";
    }
	echo "<section class='table table-bordered '>";
    echo "<TBODY>";                                          // crée le corps du tableau
        for ($i=0; $i < $nblig; $i++)                        //boucle parcourant chaque colonne du recordset, 
        {
            echo ("<TR>");
            for ($j=0; $j < $nbcol-1; $j++)                    //boucle parcourant chaque colonne du recordset
            {
                    echo "<TD>" . $tab[$i][$j]  . "</TD>";   // affichage des valeurs du tableau
            }
			echo "<TD><FORM><INPUT TYPE='submit' name='bt_suppr' value='suppr.'><INPUT TYPE='hidden' name='id_quantit' value=". $tab[$i][$j]."><input type='hidden' name='jour' value=".$id_jour."></FORM></TD>";
            echo "</TR>";
        }
    echo "</TBODY>";
	echo "</section>";
    echo "</TABLE></CENTER>";
}

?>
