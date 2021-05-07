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
include ("../bdd/connexion_bdd.php") ;


function Creer_tab_html($tab,$nbcol,$nblig,$t)
{
    echo "<CENTER><TABLE BORDER = 1>";                // début du tableau

    if (isset($t)==TRUE)                              // on teste l'existence de $t (le titre)
    {
        echo "<THEAD>";                               // crée l'en-tête du tableau avce les noms des champs de la requête
        echo "<TR>";
        for ($i=0; $i < $nbcol; $i++)                 // boucle parcourant chaque colonne du recordset, 
        {
            echo "<TH>" . $t[$i] . "</TH>";           // affichage de la ligne d'entête
        } 
        echo "</TR>";
        echo "</THEAD>";
    }

    echo "<TBODY>";                                          // crée le corps du tableau
        for ($i=0; $i < $nblig; $i++)                        //boucle parcourant chaque colonne du recordset, 
        {
            echo ("<TR>");
            for ($j=0; $j < $nbcol; $j++)                    //boucle parcourant chaque colonne du recordset
            {
                    echo "<TD>" . $tab[$i][$j]  . "</TD>";   // affichage des valeurs du tableau
            }
            echo "</TR>";
        }
    echo "</TBODY>";
    echo "</TABLE></CENTER>";
}


function Creer_tab_partie4($name,$tab,$nbcol,$nblig,$t,$rand,$login, $link){
	    echo "<CENTER><TABLE BORDER = 1>";                // début du tableau

    if (isset($t)==TRUE)                              // on teste l'existence de $t (le titre)
    {
        echo "<THEAD>";                               // crée l'en-tête du tableau avce les noms des champs de la requête
        echo "<TR>";
        for ($i=0; $i < $nbcol; $i++)                 // boucle parcourant chaque colonne du recordset, 
        {
            echo "<TH>" . $t[$i] . "</TH>";           // affichage de la ligne d'entête
        } 
        echo "</TR>";
        echo "</THEAD>";
    }

    echo "<TBODY>"; 	// crée le corps du tableau
        for ($i=0; $i < $nblig; $i++)                        //boucle parcourant chaque colonne du recordset, 
        {
			echo ("<TR>");
			echo "<TH>" . $tab[$i][0] . "</TH>";			//1er colonne
			
			if($i==$rand){ 									//Ligne aléatoire avec les inputs
				for ($j=1; $j < $nbcol; $j++)                    //boucle parcourant chaque colonne du recordset
					{
					$q=$j+2	 ;  // !!!!!!ATTENTION cette formule risque de changer avec l'importation des autres questions!!!!!!!				
					$valeur=rechdom ($link,"reponse_libre", "reponse_etudiant JOIN examen_etudiant","id_question=".$q." AND id_utilisateur=$login");  // récupération de la donnée
					echo " <td><input name='".$name."".$q."' type='int' value='".$valeur."'></td> ";   // affichage des valeurs à remplir
				}
			}
				
			else {
				for ($j=1; $j < $nbcol; $j++)  {
					echo "<TD>" .'     '. "</TD>";   						// affichage des valeurs du à ne pas remplir
				}
			}
            
            echo "</TR>";
        }
    echo "</TBODY>";
    echo "</TABLE></CENTER>";
	
	
}

function Creer_tab_partie4_rempli($name,$tab,$nbcol,$nblig,$t,$rand,$login, $link){
	    echo "<CENTER><TABLE BORDER = 1>";                // début du tableau

    if (isset($t)==TRUE)                              // on teste l'existence de $t (le titre)
    {
        echo "<THEAD>";                               // crée l'en-tête du tableau avce les noms des champs de la requête
        echo "<TR>";
        for ($i=0; $i < $nbcol; $i++)                 // boucle parcourant chaque colonne du recordset, 
        {
            echo "<TH>" . $t[$i] . "</TH>";           // affichage de la ligne d'entête
        } 
        echo "</TR>";
        echo "</THEAD>";
    }

    echo "<TBODY>"; 	// crée le corps du tableau
        for ($i=0; $i < $nblig; $i++)                        //boucle parcourant chaque colonne du recordset, 
        {
			echo ("<TR>");
			echo "<TH>" . $tab[$i][0] . "</TH>";			//1er colonne
			
			if($i==$rand){ 				//Ligne aléatoire avec les inputs
				for ($j=1; $j < $nbcol-1; $j++)  {
					echo "<TD>" . $tab[$i][$j]  . "</TD>";   // affichage des valeurs du tableau   
				}
				//dernière colonne
				$q=7	 ;  // !!!!!!ATTENTION cette formule risque de changer avec l'importation des autres questions!!!!!!!				
				$valeur=rechdom ($link,"reponse_libre", "reponse_etudiant JOIN examen_etudiant","id_question=".$q." AND id_utilisateur=$login");  // récupération de la donnée
				echo " <td><input name='".$name."".$q."' type='int' value='".$valeur."'></td> ";   // affichage des valeurs à remplir

			}
				
			else {
				for ($j=1; $j < $nbcol-1; $j++)  {
					echo "<TD>" . $tab[$i][$j]  . "</TD>";   // affichage des valeurs du tableau
				}
				//dernière colonne
				echo "<TD>" .'     '. "</TD>";   						// affichage des valeurs du à ne pas remplir
			}
            
            echo "</TR>";
        }
    echo "</TBODY>";
    echo "</TABLE></CENTER>";
	
	
}

function Creer_tab_partie4_AET($name,$tab,$nbcol,$nblig,$t,$ligneAET,$login, $link){
	    echo "<CENTER><TABLE BORDER = 1>";                // début du tableau

    if (isset($t)==TRUE)                              // on teste l'existence de $t (le titre)
    {
        echo "<THEAD>";                               // crée l'en-tête du tableau avce les noms des champs de la requête
        echo "<TR>";
        for ($i=0; $i < $nbcol; $i++)                 // boucle parcourant chaque colonne du recordset, 
        {
            echo "<TH>" . $t[$i] . "</TH>";           // affichage de la ligne d'entête
        } 
        echo "</TR>";
        echo "</THEAD>";
    }

    echo "<TBODY>"; 	// crée le corps du tableau
        for ($i=0; $i < $nblig; $i++)                        //boucle parcourant chaque colonne du recordset, 
        {
			echo ("<TR>");
			echo "<TH>" . $tab[$i][0] . "</TH>";			//1er colonne
			
			if($i==$ligneAET){ 				//Ligne aléatoire avec les inputs
				for ($j=1; $j < $nbcol-2; $j++)  {
					$q= $j+7 ;// !!!!!!ATTENTION $q cette formule risque de changer avec l'importation des autres questions!!!!!!!				
					$valeur=rechdom ($link,"reponse_libre", "reponse_etudiant JOIN examen_etudiant","id_question=".$q." AND id_utilisateur=$login");  // récupération de la donnée
					echo " <td><input name='".$name."".$q."' type='int' value='".$valeur."'></td> ";   // affichage des valeurs à remplir

				}
				//Deux dernières colonnes
				echo "<TD>" . $tab[$i][$j]  . "</TD>";   // affichage des valeurs du tableau
				echo "<TD>   X   </TD>";   // affichage des valeurs du tableau
				
			}
				
			else {
				for ($j=1; $j < $nbcol; $j++)  {
					echo "<TD>" . $tab[$i][$j]  . "</TD>";   // affichage des valeurs du tableau
				}
			}
            
            echo "</TR>";
        }
    echo "</TBODY>";
    echo "</TABLE></CENTER>";
	
	
}

?>
