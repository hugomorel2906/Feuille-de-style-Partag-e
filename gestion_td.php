<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banque de Questions</title>

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">
    
    <!-- Affichage de l'entête -->
      <?php include "header.php"; ?> 

    <!-- Connexion à la BDD -->
      <?php include "./connexion_BDD.php"; ?> 
  </head>

  <body>
    <div class="container-fluid">
    <!-- MENU -->
    <div id="menu">
            <div class="mx-2 mt-2">
                <div class="element_menu">
                  <ul>
                    <li><A HREF="Pageenseignant.html">Accueil</A></li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
      </svg>
                    <li><A HREF=#>Gestion du TD</A></li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
      </svg>
                    <li><A HREF=#>Banque de questions</A></li><!-- insérer à la place de # et banque de questions, l'onglet ouvert-->
                  </ul>
                </div>
              </div>
            </div>
          </div>
      <!-- Fin de MENU -->

      <!-- Entête Enseignant - mettre un "include" de l'entête enseignant -->
        <div class="container-fluid">
          <div class="card py-2">
            <h2 class="card-title text-center"> Gestion de TD </h2>
            <div class="d-grid gap-2 d-md-block text-center boutons">
              <button type="button" class="btn btn-lg text-center btn-custom mx-2"> <a href=#> Date et durée du TD </a></button>
              <button type="button" class="btn btn-lg text-center btn-custom mx-2"> <a href=#> Banque de questions </a></button>
              <button type="button" class="btn btn-lg text-center btn-custom mx-2"> <a href=#> Paramétrage du test </a></button>
            </div>
          </div>
        </div>
        <br><br>
      <!-- Fin de Entête Enseignant - mettre un "include" de l'entête enseignant -->

  <?php
  //Cette section permet de mettre à jour les données dans la base de donnée
  //Elle s'exécute seulement si le bouton submit du premier cadre est cliqué 
  
  if(isset($_GET["test"])){  //Condition sur l'existence du bouton submit 
    
    $cat=$_GET["categorie"]; 	//on récupère la catégorie de la question qui a été transmise par le bouton submit
    $quest_selec=$_GET['bouton1']; //on récupère le numero de la question transmis par le bouton submit
    $SQL_id_cat="SELECT id_categorie FROM categorie WHERE categorie.lib_categorie='$cat'";  //requète SQL pour récupérer id_catégorie correspondant a la catégorie de la question à modifier 
    $typeques=$_GET["typequestion"]; //on récupère le type de la question transmis par le bouton submit
    $SQL_id_type_question="SELECT id_type_question FROM type_question WHERE type_question='$typeques'"; //requète SQL pour récupérer type_question correspondant a la question à modifier 

    $result_cat= mysqli_query($link, $SQL_id_cat); //envois de la requete au serveur 
    $tab_cat= mysqli_fetch_all($result_cat);  //Mise en forme tableau du résultat
    $val_id_cat=$tab_cat[0][0]; //on récupère la valeur dans une variable 
    
    $result_type= mysqli_query($link, $SQL_id_type_question); //envois de la requete au serveur 
    $tab_type= mysqli_fetch_all($result_type);  //Mise en forme tableau du résultat
    $val_id_type=$tab_type[0][0]; //on récupère la valeur dans une variable 

    $queryinput="UPDATE question SET id_type_question='$val_id_type' WHERE id_question='$quest_selec'";
    $queryinput2="UPDATE question SET id_categorie= '$val_id_cat' WHERE id_question='$quest_selec'";
    
    $envois= mysqli_query($link, $queryinput);
    $envois2=mysqli_query($link, $queryinput2);
  }?>

  
  <?php
  // IFISSET BOUTON 2 POUR OUVRIR LE CADRE ETIQUETTE
  if(isset($_GET["cadre2"])){  //Condition sur l'existence du bouton submit 
    $bouton=$_GET['bouton1'];
    $nom_quest_modif=$_GET["nom_question"]; 	//on récupère le nom de la question modifiée qui a été transmis par le bouton submit
    $tentative_modif=$_GET['tentatives'];
    $consigne_modif=$_GET['consigne'];
    $lien_modif=$_GET['lien'];
    $intitule_modif=$_GET['intitule'];
    $colonne_modif=$_GET['colonne'];
    $ligne_modif=$_GET['ligne'];	
    
    $queryinput3="UPDATE question SET numero_question='$nom_quest_modif', 
    nombre_tentatives='$tentative_modif', consigne_question='$consigne_modif',
    lien='$lien_modif' , cplmt='$intitule_modif', nb_colonnes='$colonne_modif', nb_lignes='$ligne_modif' WHERE numero_question='$bouton'";
    $envois3= mysqli_query($link, $queryinput3);}

  if(isset($_GET["bt_valider_nouv_categorie"])){
    $value=$_GET["bouton1"];
    $nouvelle_categorie=$_GET["nouv_categorie"];
          if($nouvelle_categorie!="Entrer une nouvelle catégorie..."){
            $querynew="INSERT INTO categorie (lib_categorie) VALUES ('".$nouvelle_categorie."')";
            $envoisnew= mysqli_query($link, $querynew);
            $querymaj="UPDATE categorie SET categorie.lib_categorie='".$nouvelle_categorie."' WHERE categorie.id_question='$value'";
            $envoismaj= mysqli_query($link, $querymaj);
          }
        }
  // BOUUTON ENREGISTRER FIN 				
          
  if(isset($_GET["enregistre"])){  //Condition sur l'existence du bouton submit 
    $n_etiquette_fausses=$_GET["nb_réponse_fausse"]; 
      $id_etiquette=$_GET['id_etiquette_cache'];
      $nom_quest_modif2=$_GET['bouton1'];     //on récupère le nom de la question modifiée qui a été transmis par le bouton submit
      $pourcentge=$_GET['pourcentage']; //
      $etiq_juste_modif=$_GET['reponse']; //
      $info_bullr_modif=$_GET['nom_info_bulle'];
      $info_bullech=$_GET['nom_info_bulle_echec'];
    if ($n_etiquette_fausses!='0'){
      $etiq_fausse_modif=$_GET['reponse_vrai'];//
      $queryinput4="UPDATE etiquette_prof,question SET ponderation_etiquette='$pourcentge', contenu_etiquette='$etiq_juste_modif', aide_bon='$info_bullr_modif',aide_mauvais='$info_bullech'
      WHERE etiquette_prof.id_question=question.id_question AND question.numero_question='$nom_quest_modif2'AND id_etiquette_prof='$id_etiquette' AND etat_etiquette=TRUE ";

      $queryinput5="UPDATE etiquette_prof,question SET ponderation_etiquette='$pourcentge', contenu_etiquette='$etiq_juste_modif'
      WHERE etiquette_prof.id_question=question.id_question AND question.numero_question='$nom_quest_modif2'AND etiquette_prof.id_etiquette_prof='$id_etiquette' AND etiquette_prof.etat_etiquette=FALSE "; 
    $envois4= mysqli_query($link, $queryinput4);
    $envois5= mysqli_query($link, $queryinput5);
    }
      else { 
    $queryinput4="UPDATE etiquette_prof,question SET ponderation_etiquette='$pourcentge', contenu_etiquette='$etiq_juste_modif', aide_bon='$info_bullr_modif',aide_mauvais='$info_bullech'
      WHERE etiquette_prof.id_question=question.id_question AND question.numero_question='$nom_quest_modif2'AND id_etiquette_prof='$id_etiquette' AND etat_etiquette=TRUE ";
    $envois4= mysqli_query($link, $queryinput4);
    }
    
    /*   $queryinput3="UPDATE etiquette_prof,question SET ponderation_etiquette='$pourcentge', contenu_etiquette='$etiq_juste_modif', aide_bon='$info_bullr_modif',aide_mauvais='$info_bullech'
      WHERE etiquette_prof.id_question=question.id_question AND question.numero_question='$nom_quest_modif2'AND id_etiquette_prof='$id_etiquette' AND etat_etiquette=TRUE "/
  */
  $envois4= mysqli_query($link, $queryinput4);

  }


  if(isset($_POST["bt_ajouter_question"])){
                  $querynewq="INSERT INTO question (id_page,id_type_question,id_categorie,numero_question,consigne_question,note_question,nombre_tentatives,nb_colonnes,nb_lignes,lien,nom_question,cplmt,reonse_question) VALUES ('1','1','1','QUESTION', '0', '10', '1', '0', '0', '0', '','','')";
                  $envoisnewq= mysqli_query($link, $querynewq);
          }

  if(isset($_GET["bt_supprimer_question"])){
                  $val=$_GET["bt_supprimer_question"];
                /* $query200= "SELECT id_question FROM question WHERE id_question='$val'"; 
                  $result200= mysqli_query($link,$query200);
                  $tab200=mysqli_fetch_all($result200); 
                  $id= $tab200[0][0] ;*/
                  $querysuppr="DELETE FROM question
                  WHERE id_question='".$val."'";
                  $envoissuppr= mysqli_query($link, $querysuppr);
                  }
  ?> 
      <?php
      //Sébastien
      //NAVIGATION QUESTION
      // on selectionne le texte de toutes les questions et on les met dans un tableau 
        $query_liste= "SELECT id_question FROM question";
        $result_liste= mysqli_query($link, $query_liste);
        $tab_liste= mysqli_fetch_all($result_liste);  


        // on compte le nombre de question dans la table
        $query_n= "SELECT COUNT(id_question) FROM question";
        $result_n= mysqli_query($link, $query_n);
        $tab_n= mysqli_fetch_all($result_n);  
      ?>
      
    <div class="card py-2">
      <div class="d-md-block text-center boutons">
              <?php
              for($i=0 ; $i<$tab_n[0][0] ; $i=$i+1){
              $j=$i+1;
              echo '<a class="btn btn-lg text-center btn-custom mx-2 my-1" href="gestion_td.php?bouton1='.$tab_liste[$i][0].'" role="button">Question '.$j.' </a>';
              }?>
            <!-- Bouton permettant de créer une question -->
      <div class="d-inline-flex justify-content-center">
        <form action="gestion_td.php" method="POST">
          <button type="submit" class="btn text-center btn-primary" name="bt_ajouter_question">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
          </button>
        </form>
      </div>
      <!-- Bouton permettant de supprimer une question -->
      <?php
      if(isset($_GET["bouton1"])){?>
      <div class="d-inline-flex justify-content-center">
      <form action="gestion_td.php" method="GET">
        <?php $val=$_GET["bouton1"];?>
        <button type="button" class="btn btn-danger text-center" data-bs-toggle="modal" data-bs-target="#Supprimer_activites">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg>
        </button>
            <!-- Modal, permet d'afficher une fenetre js pour confirmer le choix-->
            <div class="modal fade" id="Supprimer_activites" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Supprimer_activitesLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="Supprimer_activitesLabel">Attention !</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-center">
                    Etes-vous vraiment certains de vouloir supprimer cette question ? 
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" value ='<?php echo $val;?>' class="btn text-center btn-danger" name="bt_supprimer_question">
                    Supprimer la question 
                    </button>
                  </div>
                </div>
              </div>
            </div> 
      </form>
      </div>
      </div>
      <?php } ?>
    </div>
  </div>

  <!--PREMIER CADRE-->

  <?php if(isset($_GET['bouton1'])){ ?>
  <div class="card card-custom-text">
  <form action="gestion_td.php" method="GET">
        <?php $val=$_GET['bouton1']; ?>
        
        Identifiant : 

        <?php $query= "SELECT id_question FROM question WHERE id_question='$val'";

          $result= mysqli_query($link, $query);
          $tab= mysqli_fetch_all($result);     
          $nbligne = mysqli_num_rows($result);         
          $nbcol = mysqli_num_fields($result) ;          
          $i=0;     
          while ($i< $nbligne)         {     
          $j=0;         
          while ($j< $nbcol)         {            
          echo $tab[$i][$j];                           
          $j++;         }    
          $i++;
          }
        ?>
      <br>
  <div class="row align-items-center">
    <div class="col-md-1"> 
      <label class="form-label">Catégorie:</label> 
    </div>

    <?php	// Requète SQL pour récupérer toutes les catégories existantes dans une liste //
      $nom_quest=$_GET["bouton1"]; //on recupère la valeur de bouton 1 (question que l'on veut modifier)//
      $query2="	SELECT categorie.lib_categorie, question.id_categorie, categorie.id_categorie, question.numero_question 
            FROM categorie, question 
            WHERE question.id_question='$nom_quest' 
            AND question.id_categorie= categorie.id_categorie"; //on fait une requête SQL pour récupérer le nom de la ctégorie correspondant à la question choisi//
      $result2= mysqli_query($link, $query2);
      $tab_categorie_question_selec= mysqli_fetch_all($result2); //résultat de la première requête sous forme de tableau 
      $query3="SELECT COUNT(*) FROM categorie"; //on compte le nb de catégories existantes // 
      $result3= mysqli_query($link, $query3);
      $tab_nb_categories= mysqli_fetch_all($result3); //résultat de la seconde requête 
      $query4="SELECT lib_categorie FROM categorie"; //on récupère toute les catégories existantes dans la table catégorie//
      $result4= mysqli_query($link, $query4);
      $tab_toutes_categories= mysqli_fetch_all($result4);
      $categorie_question_selec=$tab_categorie_question_selec[0][0];
      $nb_categorie=$tab_nb_categories[0][0]; ?>
    
    <div class="col-md-4">
    <select class="form-select" aria-label="Default select example" name="categorie">
      <?php for    ($i=0; $i<$nb_categorie; $i=$i+1){
            if(isset($_GET["bt_valider_nouv_categorie"])){
                  if ($nouvelle_categorie==$tab_toutes_categories[$i][0]){
                echo '<option value="'.$tab_toutes_categories[$i][0].'" selected>'.$nouvelle_categorie.'</option>' ; 
            }
            else{
                echo '<option value="'.$tab_toutes_categories[$i][0].'"> '.$tab_toutes_categories[$i][0].' </option>' ;
            }
            }
            else {
            if ($categorie_question_selec==$tab_toutes_categories[$i][0]){
                echo '<option value="'.$tab_toutes_categories[$i][0].'" selected>'.$categorie_question_selec.'</option>' ; 
            }
            else{
                echo '<option value="'.$tab_toutes_categories[$i][0].'"> '.$tab_toutes_categories[$i][0].' </option>' ;
            }
            }
            } ?>
    </select>
  </div>
  <div class="col-md-1 text-center">
    <!--  BOUTON AJOUT CATEGORIE -->
    <FORM method='GET'>
              <?php $value=$_GET["bouton1"];
              // Bouton pour ajouter une catégorie
              
              echo " <input type='hidden' bouton1='".$value."'>";
              echo "<INPUT type='submit' value='+' name='bt_ajouter_categorie'>";
              ?>
    </div>



    <div class="col-md-7 text-center">
    <?php


  
                //Formulaire d'ajout
                if(isset($_GET["bt_ajouter_categorie"])){
                    Echo '<input type="text" name="nouv_categorie" size="30" value="Entrer une nouvelle catégorie...">';
                    echo '<input type="hidden" name="bouton1" value="'.$value.'" >' ;
                    echo '<INPUT type="submit" value="Valider" name="bt_valider_nouv_categorie">';

                    /* if(isset($_GET["bt_valider_nouv_categorie"])){
                    $nouvelle_categorie=$_GET["nouv_categorie"];
                    $querynew="INSERT INTO categorie (lib_categorie) VALUES ('".$nouvelle_categorie."')";
                    $envoisnew= mysqli_query($link, $querynew);
                    } */
                    echo "</form>"; 
                    echo "<br>";
                }
              
    ?>
    </div>
    </div>
    <br><br>	

    <?php // TYPE DE QUESTION

    echo "Type de question :";


      $query2bis="SELECT question.id_type_question, type_question.id_type_question, question.numero_question,type_question.type_question
          FROM type_question, question 
          WHERE question.id_type_question= type_question.id_type_question
          AND question.id_question='$nom_quest' ";

      $result2bis= mysqli_query($link, $query2bis);
      $tab2bis= mysqli_fetch_all($result2bis);

      $query3bis="SELECT COUNT(*) FROM type_question"; 
      $result3bis= mysqli_query($link, $query3bis);
      $tab3bis= mysqli_fetch_all($result3bis);


      $query4bis="SELECT type_question FROM type_question";
      $result4bis= mysqli_query($link, $query4bis);
      $tab4bis= mysqli_fetch_all($result4bis);


      $type_question_selec_bis=$tab2bis[0][3];
      $nb_catégorie_bis=$tab3bis[0][0]; 
      echo '<select name="typequestion">' ;
      for	($i=0; $i<$nb_catégorie_bis; $i=$i+1){
        if ($type_question_selec_bis==$tab4bis[$i][0]){
          echo '<option value="'.$tab4bis[$i][0].'" selected>'.$type_question_selec_bis.'</option>' ; 
        }
        else{
          echo '<option value="'.$tab4bis[$i][0].'"> '.$tab4bis[$i][0].' </option>' ;
        }
      }

      echo '</select>';
      echo "<input type='hidden' name='bouton1' value='".$_GET['bouton1']."'>" ;
      echo "<input type='submit' name= 'test' value='valider' >";
      echo "</form>"; 
    ?>
  </div>

  <?php

  //DEUXIEME CADRE
  if(isset($_GET["test"])){ 
    echo'<div class="card card-custom-text">';
    echo'<form method="GET" action="gestion_td.php">';
      //Code nom question 
    
  $val=$_GET['bouton1'];


  $query5= "SELECT numero_question FROM question WHERE id_question='$val'"; // il faudra changer dans la bdd le numero_question par le nom_question
        $result5= mysqli_query($link, $query5);
        $tab5= mysqli_fetch_all($result5);
    

        echo "Nom de la question : ";
        echo '<input type="text" name="nom_question" size="100" value="'.$tab5[0][0].'"> <br>' ;
    
    
    
  //Code nombre de tentatives
  // affichage du nombre de tentatives autorisées sous forme de liste déroulante
            
        echo "Nombre de tentatives autorisées:";

              // Récupération de la valeur de la question sélectionnée
              $val=$_GET["bouton1"]; 

              // Requête pour afficher le nombrede tentatives pour la question sélectionnée 
              $querytenta="SELECT question.nombre_tentatives,question.numero_question 
              FROM question 
              WHERE question.id_question='$val'";
              $resulttenta= mysqli_query($link, $querytenta);
              $tabtenta= mysqli_fetch_all($resulttenta);
              $nb_tentatives_selec= array('0','1','2','3','4','5','6');
              echo '<select name="tentatives">' ;
              for    ($i=0; $i<count($nb_tentatives_selec) ; $i=$i+1){
                  if ($nb_tentatives_selec[$i][0]==$tabtenta[0][0]){
                      echo '<option value="'.$nb_tentatives_selec[$i][0].'" selected>'.$nb_tentatives_selec[$i][0].'</option>' ; 
              }
                  else{
                      echo '<option value="'.$nb_tentatives_selec[$i][0].'"> '.$nb_tentatives_selec[$i][0].' </option>' ;
        }}
              echo "</select><br>"; 
        
        // La liste déroulante contient les différents nombre de tentatives différents
              // Le nombre de tentatives de la question sélectionnée est affiché

        
        
  //Code consigne de la question

  $val=$_GET['bouton1'];
  $query6= "SELECT consigne_question FROM question WHERE id_question='$val'";
        $result6= mysqli_query($link, $query6);
        $tab6= mysqli_fetch_all($result6);
    

    
        echo 'Consigne de la question :';
        echo '<input type="text" name="consigne" size="100" value="'.$tab6[0][0].'"> <br>';
    
    

  //Code insérez un lien

  $val=$_GET['bouton1'];
  $query7= "SELECT lien FROM question WHERE id_question='$val'";
        $result7= mysqli_query($link, $query7);
        $tab7= mysqli_fetch_all($result7);
      


      echo 'Insérez un lien :';
      echo   '<input type="text" name="lien" size="100" value="'.$tab7[0][0].'"> <br>';
      

  //Code intitulé de la question

  $val=$_GET['bouton1'];
  $query8= "SELECT cplmt FROM question WHERE id_question='$val'";
        $result8= mysqli_query($link, $query8);
        $tab8= mysqli_fetch_all($result8);
      

      echo   'Intitulé de la question :';
          echo '<input type="text" name="intitule" size="100" value="'.$tab8[0][0].'"> <br>';


          $value=$_GET["bouton1"];
          $choix_type_question=$_GET["typequestion"];
    if($choix_type_question=="tableau"){

          // TABLEAU COL ET LIGNES	
            
            
            echo "Insérer un tableau: ";
            echo "<br>";
            
            // affichage du nombre de colonne du tableau sous forme de liste déroulante
            echo "Nombre de colonnes:";
            
            // Récupération de la valeur de la question sélectionnée
            $val=$_GET["bouton1"]; 
            
            // Requête pour afficher le nb de colonnes du tableau de la question sélectionnée 
            $querycolonnes2="SELECT question.nb_colonnes
            FROM question 
            WHERE question.id_question='$val'";
            $resultcolonnes2= mysqli_query($link, $querycolonnes2);
            $tabcolonnes2= mysqli_fetch_all($resultcolonnes2);
            $nb_colonnes_selec= array('0','1','2','3','4','5','6');
            echo '<select name="colonne">' ;
            for	($i=0; $i<count($nb_colonnes_selec) ; $i=$i+1){
              if ($nb_colonnes_selec[$i][0]==$tabcolonnes2[0][0]){
                echo '<option value="'.$nb_colonnes_selec[$i][0].'" selected>'.$nb_colonnes_selec[$i][0].'</option>' ; 
              }
              else{
                echo '<option value="'.$nb_colonnes_selec[$i][0].'"> '.$nb_colonnes_selec[$i][0].' </option>' ;
                // La liste déroulante contient les différents nb de colonnes différents 
                // Le nb de colonnes de la question sélectionnée est affiché 
              }
            }
            
            // Affichage du nombre de ligne du tableau sous forme de liste déroulante
            echo "<br>";
            echo "</select>"; 
            echo "Nombre de lignes:";
            
            
            $queryligne2="SELECT question.nb_lignes,question.numero_question 
              FROM question 
              WHERE question.id_question='$val'";
              $resultligne2= mysqli_query($link, $queryligne2);
              $tabligne2= mysqli_fetch_all($resultligne2);
              $nb_ligne_selec= array('0','1','2','3','4','5','6');
              echo '<select name="ligne">' ;
              for    ($i=0; $i<count($nb_ligne_selec) ; $i=$i+1){
                  if ($nb_ligne_selec[$i][0]==$tabligne2[0][0]){
                      echo '<option value="'.$nb_ligne_selec[$i][0].'" selected>'.$nb_ligne_selec[$i][0].'</option>' ; 
                  }
                  else{
                      echo '<option value="'.$nb_ligne_selec[$i][0].'"> '.$nb_ligne_selec[$i][0].' </option>' ;
                      // La liste déroulante contient les différents nb de colonnes différents 
                      // Le nb de colonnes de la question sélectionnée est affiché 
                  }
              }
            echo "</select>";
            echo "</form>"; 
            
          }	
          
  
  else{
    echo'type étiquette : partie encore non réalisée, a compléter';
  }
  echo "<input type='hidden' name='bouton1' value='".$_GET['bouton1']."'>" ;
  echo "<input type='submit' name= 'cadre2' value='valider' >";
  }}
      ?>

  <br><br>
  </div>

  <?php		


  // CODAGE ETIQUETTE 


  // BOUTON ETIQUETTE 
  $val=$_GET['bouton1'];
  $query_liste_etiquette= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
                              FROM etiquette_prof,question 
                              WHERE etiquette_prof.id_question=question.id_question 
                              AND etat_etiquette=TRUE AND question.numero_question='$val'";
      $result_liste_etiquette= mysqli_query($link, $query_liste_etiquette);
      $tab_liste_etiquette= mysqli_fetch_all($result_liste_etiquette);
    
      $n_etiquette=count($tab_liste_etiquette);
    
      // on compte le nombre de question dans la table
      /*$query_n= "SELECT COUNT(numero_question) FROM etiquette";
      $result_n= mysqli_query($link, $query_n);
      $tab_n= mysqli_fetch_all($result_n); */ 


      // on créé autant de bouton qu'il y a de question en leur donnant le nom de la question à laquelle ils correspondent 
    
      for($i=0 ; $i<$n_etiquette ; $i=$i+1){ 
          echo '<form method="GET" action="gestion_td.php">' ;
              
    echo '<input type="hidden" name="bouton1" value= "'.$val.'">';
        echo '<input type="hidden" name="id_etiquette_cache" value= "'.$tab_liste_etiquette[$i][0].'">';
        echo '<input type="submit" name="bouton_etiquette" value="etiquette '.$tab_liste_etiquette[$i][0].'" >' ;
          echo '</form>' ;
      }
    
  if( isset($_GET['bouton_etiquette'])){	
  //Code Pourcentage du barème
    echo '<form method="GET" action="gestion_td.php">' ;

        $id_etiquette_recup=$_GET["id_etiquette_cache"]; 
              $val=$_GET['bouton1'];
        $query_id_val="SELECT id_question FROM question WHERE numero_question='$val' "; 
        $envois_id_val=mysqli_query($link, $query_id_val); 
        $tab_id_val=mysqli_fetch_all($envois_id_val); 
        $id_quest_selec_val = $tab_id_val[0][0]; 
              $query15= "SELECT etiquette_prof.ponderation_etiquette 
              FROM etiquette_prof, question
              WHERE question.numero_question='$val'
              AND etiquette_prof.id_question= '$id_quest_selec_val' 
        AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";
              $result15= mysqli_query($link, $query15);
              $tab15= mysqli_fetch_all($result15);
        
        
            
              echo 'Pourcentage du barème :';
              echo '<input type="text" name="pourcentage" size="10" value="'.$tab15[0][0].'"> <br>';
              

        
    
        
        // REPONSE ATTENDUE ET REPONSE PROPOSEE
        


  $id_etiquette_recup=$_GET["id_etiquette_cache"]; // on récupère l'id de l'etiquette 


  // on récupere les infos de l'etiquete vrai pour la reponse 
    $query_rep_vrai= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
                        FROM etiquette_prof,question 
                        WHERE etiquette_prof.id_question=question.id_question 
                        AND etat_etiquette=TRUE AND question.numero_question='$val'
              AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";

      $result_rep_vrai= mysqli_query($link, $query_rep_vrai);
      $tab_rep_vrai= mysqli_fetch_all($result_rep_vrai);
      $n_etiquette_vrai=count($tab_rep_vrai); 

    $query_rep_faux= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
                        FROM etiquette_prof,question 
                        WHERE etiquette_prof.id_question=question.id_question 
                        AND etat_etiquette=FALSE AND question.numero_question='$val'";
  //AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'
    /*   $query_rep_faux= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
                              FROM etiquette_prof,question 
                              WHERE etiquette_prof.id_question=question.id_question 
                              AND etat_etiquette=FALSE
                              AND question.numero_question='$val'"; */
                
      $result_rep_faux= mysqli_query($link, $query_rep_faux);
      $tab_rep_faux= mysqli_fetch_all($result_rep_faux);
      $n_etiquette_fausse=count($tab_rep_faux);

      
    
    
  echo "Etiquette juste : "; 


    for($i=0 ; $i<$n_etiquette_vrai ; $i=$i+1){ 

        echo '<input type="input" name="reponse" value="'.$tab_rep_vrai[$i][1].'" >' ;
    }

      echo '<br>';
      echo '<br>';

  echo "Etiquette fausse :  "; 	
  echo $n_etiquette_fausse;
  echo '<br>';
    
  for($i=0 ; $i<$n_etiquette_fausse ; $i=$i+1){ 
      
              echo '<input type="input" name="reponse_vrai" value="'.$tab_rep_faux[$i][1].'" >' ;
      
      }
    
  echo "<br><br>"; 

  //Code infobulle réussite
  $id_etiquette_recup=$_GET["id_etiquette_cache"]; 
  $val=$_GET['bouton1'];
              $query_id_val="SELECT id_question FROM question WHERE numero_question='$val' "; 
              $envois_id_val=mysqli_query($link, $query_id_val); 
              $tab_id_val=mysqli_fetch_all($envois_id_val); 
              $id_quest_selec_val = $tab_id_val[0][0]; 
              $query17= "SELECT etiquette_prof.aide_bon
              FROM etiquette_prof, question
              WHERE question.numero_question='$val'
              AND etiquette_prof.id_question= '$id_quest_selec_val' 
              AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";
              $result17= mysqli_query($link, $query17);
              $tab17= mysqli_fetch_all($result17);


            
              echo 'Infobulle réussite :';
              echo   '<input type="text" name="nom_info_bulle" size="100" value="'.$tab17[0][0].'"> <br>';
            


  //Code infobulle echec 

  $id_etiquette_recup=$_GET["id_etiquette_cache"]; 
  $val=$_GET['bouton1'];
              $query_id_val="SELECT id_question FROM question WHERE numero_question='$val' "; 
              $envois_id_val=mysqli_query($link, $query_id_val); 
              $tab_id_val=mysqli_fetch_all($envois_id_val); 
              $id_quest_selec_val = $tab_id_val[0][0]; 
              $query18= "SELECT etiquette_prof.aide_mauvais
              FROM etiquette_prof, question
              WHERE question.numero_question='$val'
              AND etiquette_prof.id_question= '$id_quest_selec_val' 
              AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";
              $result18= mysqli_query($link, $query18);
              $tab18= mysqli_fetch_all($result18);


            
              echo 'Infobulle échec :';
              echo   '<input type="text" name="nom_info_bulle_echec" size="100" value="'.$tab18[0][0].'"> <br>';
                  
              $id_etiq_cah=$_GET['id_etiquette_cache'];
        $val=$_GET['bouton1'];
        
    echo '<input type= "hidden" name="nb_réponse_fausse" value="'.$n_etiquette_fausse.'">';
    echo '<input type= "hidden" name="id_etiquette_cache" value="'.$id_etiq_cah.'">';
    echo '<input type= "hidden" name="bouton1" value="'.$val.'">';
    echo '<input type="submit" name="enregistre" value="enregistrer les modification" >' ;
    echo '</form>' ;

        }
  ?>		



    <!-- Appel des feuilles de style js (ne pas déplacer dans /head) -->
      <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
      <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js"></script>		
  </body>
</html>