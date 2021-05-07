<?php 

// Charlotte, Mailys, Mathilde
// 27/04/2021
// CREATION CAMEMBERT
// content="text/plain; charset=utf-8"
//ATTENTION IL NE DOIT PAS Y AVOIR D'HTML DANS CE FICHIER ET LES FICHIERS APPELEs
// paramètres d'entrée : $tab - un tableau avec les donnees et les legendes (resultat de la requete), $titre - le titre, $nb_lignes - le nombre de lignes du tableau 
// A ECRIRE SUR LE FICHIER APPELANT LA FONCTION dans un formulaire : echo "<IMG src='test_camembert.php?titre=".$titre."&tab=".$tab."&nb_lignes=".$nb_lignes."'>";

include "connexion_BDD.php"; // fichier de connexion à la bbd peut-être nom à changer
require_once ('jpgraph-4.2.6\src\jpgraph.php');//chemin à modifier en fonction de l'architecture finale de tous les codes
require_once ('jpgraph-4.2.6\src\jpgraph_pie.php');//chemin à modifier en fonction de l'architecture finale de tous les codes

//récupération des données
$titre=$_GET["titre"];
$tab=$_GET["tab"];
$nb_lignes=$_GET["nb_lignes"]

//Création des listes de données et de légendes
$donnees=array();
$legendes=array();
for ($i=0; $i < $nb_lignes; $i++){
	$donnees[]=$tab[$i][1];
	$legendes[]=$tab[$i][0];
}

// A new pie graph
$graph = new PieGraph(550,300); // Choix de la taille du cadre du graphique 
$graph->clearTheme();

// Title setup
$graph->title->Set("$titre"); // Titre du graphique
$graph->title->SetFont(FF_ARIAL,FS_BOLD,12);

// Setup the pie plot, cree le camembert à l'aide de la liste de valeurs , les pourcentages sont calculés automatiquement
$p1 = new PiePlot($donnees);

//Ajout des légendes
$p1->setLegends($legendes);

// Adjust size and position of plot (position du camembert le cadre du graphique, utile pour que les légendes et le camembert ne se supperposent pas par exemple)
$p1->SetSize(0.35); // 
$p1->SetCenter(0.35,0.55);

// Setup slice labels and move them into the plot
$p1->value->SetFont(FF_ARIAL,FS_NORMAL,9);
$p1->value->SetColor("darkred");

// Finally add the plot
$graph->Add($p1);

// ... and stroke it
$graph->Stroke();

?>
