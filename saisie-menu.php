<?php
/*
session_start() //accède àla session
$login = $_SESSION["login"] //récupère le login stocké dans la session
*/
$id_utilisateur=1;
?>

<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">

    <title> Saisie menu  </title>
  </head>

<body>

  <!-- header-->
  <?php include "header.php"?>

    <!-- content-->
  <div class="container-fluid">

    <h2 class="mt-4 mb-4 text-center"> TD n°2 : Alimentation et Santé de l'Homme
    <br> "Calcul du besoin et analyse d'une ration alimentaire" </h2>
      
		<div class="text-center">
      <FORM>
        <?php
        include "../bdd/connexion_bdd.php";
        include "..//fonctions/bouton jour.php";
        if (isset($_GET["jour"]))
          $id_jour=$_GET['jour'];
        else 
          $id_jour=1;
              
        $query_type_jour  ="SELECT id_jour, lib_jour FROM Jour";
        $result_type_jour = mysqli_query($link,$query_type_jour);		                                             // CREATION DES BOUTONS NOMS JO
        $tab_type_jour = mysqli_fetch_all($result_type_jour);                                                       // NOM JOUR
        
        $name_type_jour="jour";				
        Jours_semaine($name_type_jour,$tab_type_jour,$id_jour);	
        
        ?>
      </FORM>
			
	  </div>


    <p style="text-align:right"><a href="" >Besoin d'aide pour estimer les quantités ?</a></p> <!-- lien à ajouter une fois al base de données créée-->
          <br>
    <div class="alert alert-danger mb-5" role="alert" id="" value=""> <!-- faire apparaître si tout bon -->
            ATTENTION : Pensez à saisir vos boissons (eau du robinet, eau minérale, alcool etc..). <br>
            Toutes les quantités sont à saisir en grammes (pour rappel : 33 cl = 330 g)
    </div>
      
    
	  <?php include "../fonctions/Verif_Nombre_qte.html";?>
	  
    <FORM  method="GET" name="form_selec_alim" onsubmit="return Verif_Nombre_Qte()">
	
	
      <?php
        echo "<input type='hidden' name='jour' value=".$id_jour.">";
        if (isset($_GET["bt_valider_alim"]))
          $selected_type_repas=$_GET['repas'];
        else 
          $selected_type_repas=1;
          
          
        $query_type_repas  ="SELECT id_repas_etudiant, type_repas FROM Type_repas, Repas_etudiant  
        WHERE Repas_etudiant.id_type_repas=Type_repas.id_type_repas and id_utilisateur=".$id_utilisateur." 
        ORDER BY Repas_etudiant.id_type_repas";
        $result_type_repas = mysqli_query($link,$query_type_repas);                                                   // NOM REPAS 	
        $tab_type_repas = mysqli_fetch_all($result_type_repas);
        
        
        include "../fonctions/fct_radio.php";
        $name_type_repas="repas";
          
        Case_A_Cocher($name_type_repas,$tab_type_repas,$selected_type_repas);
      ?>

		
    
      <div class="row vertical-align-center mt-5">

        <div class="col-3 cadre_droite">
          <p>Choix de l'aliment ou de la boisson</p>
          <?php
              include "../fonctions/liste_deroulante_autocompletion.php";
                
              $query_liste_alim ="SELECT alim_code, alim_nom_fr FROM Aliment ORDER BY alim_nom_fr";
              $result_liste_alim = mysqli_query($link,$query_liste_alim);		
              $tab_liste_alim = mysqli_fetch_all($result_liste_alim);                                                       // LISTE CIQUAL
              $name_liste_alim= "liste_alim";
              
              creer_liste_HTML_auto($name_liste_alim,$tab_liste_alim);
            ?>
        </div>


        <div class="col-3 text-center">
          <p class="fs-6 text-center" style="color:#4B75F9"> <em> Saisir la quantité en grammes, à l'unité</em></p>
          <p class="text-center">Quantité :<input type="" name="quantite" value=""> g </p>
			
			    <button type="submit" class="btn btn-lg text-center btn-custom-valider" name="bt_valider_alim"> Valider </button>
        </div>
  
	  </FORM>
			
			

        <div class="col-6 text-center">
		
		      <?php // ouverture balise PHP
			
						
          if (isset($_GET["bt_valider_alim"]))                                     //affichage si le bouton validé a été enclanché 
          {
            //echo $_GET['jour'];
            $id_repas=$_GET['repas'];
            //echo $id_repas;
            echo "<br>";
            $nom_alim=$_GET['liste_alim'];
            echo $nom_alim;
            $query_nom_alim ="SELECT alim_code,alim_nom_fr FROM Aliment WHERE alim_nom_fr='".$nom_alim."'";
            echo $query_nom_alim;
            $result_nom_alim = mysqli_query($link,$query_nom_alim);		
            $tab_nom_alim = mysqli_fetch_all($result_nom_alim);
            $id_alim=$tab_nom_alim[0][0];
            echo $id_alim;
            
            //echo $id_alim;
            echo "<br>";
            $id_quantite=$_GET['quantite'];
            //echo $id_quantite;
            echo "<br>";
            
          
            
            $query_add_alim=" INSERT INTO Quantite (id_repas_etudiant, alim_code,quantite)
                      VALUES ('".$id_repas."','".$id_alim."','".$id_quantite."')";
            //echo $query_add_alim;
            mysqli_query($link,$query_add_alim)or die('Impossible de sélectionner la base de données'. mysqli_error($link));	
            
              
          }
          
          if (isset ($_GET["bt_suppr"]))
              {
                
                
                $id_quantite=$_GET['id_quantit'];
                $query_del_alim=" DELETE FROM Quantite 
                      WHERE id_quantite=".$id_quantite;
                
                mysqli_query($link,$query_del_alim)or die('Impossible de sélectionner la base de données'. mysqli_error($link));	
              }
              
              
          
            
            $query_tab_repas="SELECT type_repas as Repas,alim_nom_fr, quantite, id_quantite 
            FROM Aliment, Quantite,Type_repas, Repas_etudiant 
            WHERE Quantite.alim_code=Aliment.alim_code and Quantite.id_repas_etudiant=Repas_etudiant.id_repas_etudiant 
            and Type_repas.id_type_repas=Repas_etudiant.id_type_repas 
            and id_utilisateur=".$id_utilisateur." and id_jour=".$id_jour."
            ORDER BY Type_repas.id_type_repas";
            //echo $query_tab_repas;
            $result_tab_repas = mysqli_query($link,$query_tab_repas);	
            $tab_tab_repas = mysqli_fetch_all($result_tab_repas);
            $name_tab_repas= "liste_alim";	
            
            $nbligne_tab_repas = mysqli_num_rows($result_tab_repas);
            $nbcol_tab_repas = mysqli_num_fields($result_tab_repas) ;
            $t=array("Repas","aliment","quantité","");
            
            
            
            include "../fonctions/tableau_repas.php";
            Creer_tab_html($tab_tab_repas,$nbcol_tab_repas,$nbligne_tab_repas,$t,$id_jour);
            
              
          
          ?>
				
				</div>
      </div> 

      
        <div class="text-center mt-4 mb-5">
          <a class="btn btn-lg text-center btn-custom" href="./menu-saisies-donnees.php"> Retour</a>
          <a class="btn btn-lg text-center btn-custom" href="./page-accueil.php">Accueil </a>
        </div>
      
  </div>

      <!-- Section "Pied de page général" à insérer sur chacune des pages-->
      <?php include "Evolution_TD.php"; 
        include "PiedDePageTD.php"?>

    </body>
  </html>
