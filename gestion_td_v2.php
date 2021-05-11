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
      <?php include "./connexion_bdd_hugo.php"; ?> 
  </head>

  <body>
    <div class="container-fluid">
      <!-- MENU -->
      <div class="row">
        <div class="mx-2 mt-2">
          <div class="element_menu">
            <ul>
              <A HREF="Pageenseignant.html">Accueil</A>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg>
              <A HREF=#>Gestion du TD</A>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg>
              <A HREF=#>Banque de questions</A> <!-- insérer à la place de # et banque de questions, l'onglet ouvert-->
            </ul>
          </div>
        </div>
      </div>
      <!-- Fin de MENU -->

      <!-- Entête Enseignant - mettre un "include" de l'entête enseignant -->
          <div class="card card-custom-text py-2 my-2">
            <h2 class="card-title text-center"> Gestion de TD </h2>
            <div class="d-grid gap-2 d-md-block text-center boutons">
              <button type="button" class="btn btn-lg text-center btn-custom mx-2"> <a href=#> Date et durée du TD </a></button>
              <button type="button" class="btn btn-lg text-center btn-custom mx-2"> <a href=#> Banque de questions </a></button>
              <button type="button" class="btn btn-lg text-center btn-custom mx-2"> <a href=#> Paramétrage du test </a></button>
            </div>
          </div>
      <!-- Fin de Entête Enseignant - mettre un "include" de l'entête enseignant -->

      <?php
        //Cette section permet de mettre à jour les données dans la base de donnée
        //Elle s'exécute seulement si le bouton submit du premier cadre est cliqué 
        
        if(isset($_POST["test"])){  //Condition sur l'existence du bouton submit 
          $cat=$_POST["categorie"]; 	//on récupère la catégorie de la question qui a été transmise par le bouton submit
          $quest_selec=$_POST['bouton1']; //on récupère le numero de la question transmis par le bouton submit
          $SQL_id_cat="SELECT id_categorie FROM categorie WHERE categorie.lib_categorie='$cat'";  //requète SQL pour récupérer id_catégorie correspondant a la catégorie de la question à modifier 
          $typeques=$_POST["typequestion"]; //on récupère le type de la question transmis par le bouton submit
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
        }

        // IFISSET BOUTON 2 POUR OUVRIR LE CADRE ETIQUETTE

        if(isset($_POST["cadre2"])){  //Condition sur l'existence du bouton submit 
          $bouton=$_POST['bouton1'];
          $nom_quest_modif=$_POST["nom_question"]; 	//on récupère le nom de la question modifiée qui a été transmis par le bouton submit
          $tentative_modif=$_POST['tentatives'];
          $consigne_modif=$_POST['consigne'];
          echo $consigne_modif;
          $lien_modif=$_POST['lien'];
          $intitule_modif=$_POST['intitule'];
          $choix_type_question=$_POST['typequestion'];
          if($choix_type_question=='tableau'){
            $colonne_modif=$_POST['colonne'];
            $ligne_modif=$_POST['ligne'];	
          
            $queryinput3="UPDATE question SET numero_question='$nom_quest_modif', 
            nombre_tentatives='$tentative_modif', consigne_question='$consigne_modif',
            lien='$lien_modif' , cplmt='$intitule_modif', nb_colonnes='$colonne_modif', nb_lignes='$ligne_modif' WHERE id_question='$bouton'";
            $envois3= mysqli_query($link, $queryinput3);
          }
          else{
            $queryinput3="UPDATE question SET numero_question='$nom_quest_modif', 
            nombre_tentatives='$tentative_modif', consigne_question='$consigne_modif',
            lien='$lien_modif' , cplmt='$intitule_modif' WHERE id_question='$bouton'";
            $envois3= mysqli_query($link, $queryinput3);
          }
        }

        
        if(isset($_POST["bt_valider_nouv_categorie"])){
          $value=$_POST["bouton1"];
          $nouvelle_categorie=$_POST["nouv_categorie"];
          $categorie=$_POST["categorie"];
            if($nouvelle_categorie!="" & $nouvelle_categorie!=$categorie){
              $querynew="INSERT INTO categorie (lib_categorie) VALUES ('".$nouvelle_categorie."')";
              $envoisnew= mysqli_query($link, $querynew);
              $querymaj="UPDATE categorie SET categorie.lib_categorie='".$nouvelle_categorie."' WHERE categorie.id_question='$value'";
              $envoismaj= mysqli_query($link, $querymaj);
            }
        }
        
        // INSERT DES NOUVELLES ETIQUETTES 

        if(isset($_POST['cadre2'])){
          $new_etiq= $_POST['nb_etiq_rep']; 
          
          $value=$_POST["bouton1"]; // on récupère le numéro de la question 
          
          $query888="SELECT COUNT(*) FROM etiquette_prof WHERE id_question=$value" ;
          $resultat888= mysqli_query($link,$query888);
          $tab888= mysqli_fetch_all($resultat888);
          $count888=$tab888[0][0];
          $diff=$new_etiq-$count888;
          
          
          for($i=0; $i<$diff; $i++){
          $nouvelle_etiq="INSERT INTO etiquette_prof (id_question,ponderation_etiquette,contenu_etiquette,etat_etiquette, aide) VALUES ('$value', '15','', '1', '' )"; 
          $resultat=mysqli_query($link, $nouvelle_etiq);
          }
          
          $SQL_reonse="SELECT reonse_question FROM question WHERE id_question=$value";
          $envois_reonse= mysqli_query($link, $SQL_reonse); 
          $tab_reonse=mysqli_fetch_all($envois_reonse);
          $tab_reonse[0][0] = str_replace("'", "\'",$tab_reonse[0][0]) ; 
          $pieces = explode(" / ", $tab_reonse[0][0]);
          $nb_segment= count($pieces); 
          
          $liste_etiquette_juste = "SELECT * FROM etiquette_prof WHERE etiquette_prof.id_question= $value AND etat_etiquette=1"; 
          $result_liste_juste= mysqli_query($link, $liste_etiquette_juste) ; 
          $tab_liste_juste=mysqli_fetch_all($result_liste_juste) ; 
          if( $count888==0){
          
          $j=0 ;
          for($k=0 ; $k<$nb_segment ;$k++){
              if($pieces[$k]=="etiquette"){
                  $pieces[$k] = "etiquette ".$tab_liste_juste[$j][0]; 
                  $j++; 
              }
          }
          $reonse = implode(" ", $pieces) ; 
          $querymaj_reonse="UPDATE question SET reonse_question='$reonse' WHERE id_question= '$value' ";// requete de MAJ de la catégorie avec son nouveau nom
          $envoismaj_reonse=mysqli_query($link,$querymaj_reonse) ;
          
          
          }else {
          
            $j=$count888 ;
          for($k=0 ; $k<$nb_segment ;$k++){
              if($pieces[$k]=="etiquette"){
                  $pieces[$k] = "etiquette ".$tab_liste_juste[$j][0]; 
                  $j++; 
              }
          }
          $reonse = implode(" ", $pieces) ; 
          echo $reonse;
          $querymaj_reonse="UPDATE question SET reonse_question='$reonse' WHERE id_question= '$value' ";// requete de MAJ de la catégorie avec son nouveau nom
          $envoismaj_reonse=mysqli_query($link,$querymaj_reonse) ;
          
          }
          }

                    //BOUTON SUPPRIMER LA REONSE ET LES ETIUQETTE ASSOCIER 


          if(isset($_POST['suppr_etiquette_rep'])){
            
            $value=$_POST["bouton1"]; // on récupère le numéro de la question 
            
            $query_suppr_all="DELETE FROM `etiquette_prof`
            WHERE `id_question` = $value " ; 
            $envois_suppr_all=mysqli_query($link, $query_suppr_all) ; 
            
            $query_suppr_reonse=" UPDATE question SET reonse_question='' WHERE id_question=$value" ;
            $result_reonse=mysqli_query($link,$query_suppr_reonse);
            }


          // BOUTON AJOUT ETIQUETTE FAUSSE
          // on regarde si on a cliqué sur le bouton 
          if(isset($_POST['etiquette_+_fausse']) /*or $_POST['exist_etiq']==0*/ ){

          $val=$_POST['bouton1']; // on récupère le numéro de la question 

          $querynewetiquettef="INSERT INTO etiquette_prof (	
          id_question,
          ponderation_etiquette,
          contenu_etiquette,
          etat_etiquette,
          aide) VALUES ('$val','1','','0','')"; // requete pour créer une etiquette fausse pour la question selectionnee 
                          $envoisnewq= mysqli_query($link, $querynewetiquettef); // envois de la requete a la bdd
            
          }


          // BOUTON SUPPRIMER UNE ETIQUETTE FAUSSE

          if (isset($_POST['nombre_etiq_faus'])) {
          for	($i=0; $i<$_POST['nombre_etiq_faus']; $i=$i+1){
          if(isset($_POST['etiquette_-_fausse'.$i.''])){
            $val=$_POST['bouton1'];
            // on récupère le numéro de la question 

          echo"<br>";
          $query_etiq_fausse= "SELECT etiquette_prof.id_etiquette_prof,etiquette_prof.contenu_etiquette /* on selectionne l'id de toutes les itequette fausse correspondant à la question sélectionné*/ 
                    FROM etiquette_prof,question 
                    WHERE  etiquette_prof.id_question='$val' AND etat_etiquette=0 ";
          $result_etique_fausse=mysqli_query($link,$query_etiq_fausse);
          $tab_etique_fausse=mysqli_fetch_all($result_etique_fausse);
          $etiq_supr=$tab_etique_fausse[$i][0];
          echo"nb etiquette fausses: ";
          echo $_POST['nombre_etiq_faus'];
          echo"<br>";
          echo"num de l'etiquette suppr: ";
          echo $etiq_supr;

          $querysuppretiq="DELETE FROM etiquette_prof
                      WHERE id_question='$val' AND id_etiquette_prof='$etiq_supr' AND etat_etiquette='0'"; // on supprime le la dernière etiquette fausse pour la question selectionnee 
          echo"<br>";
          echo $querysuppretiq;
          $envoissuppretiq= mysqli_query($link, $querysuppretiq);
            } // envois de la requete à la bdd 
                  

          }
          }

                  // BOUTON ENREGISTRER FIN 				
          // l'enregistrement des etiquette fausse 

            

          if(isset($_POST["enregistre"]) || isset($_POST['etiquette_+_fausse']) ){  //Condition sur l'existence du bouton submit 
            $n_etiquette_fausses=$_POST["nb_réponse_fausse"];  // on récupère le nombre  de fausse de réponse 
            $id_etiquette=$_POST['id_etiquette_cache']; // on récupre l'id de l'étiquette selectionnée (c'est l'id de l'etiquette juste)
              $id_quest_modif2=$_POST['bouton1'];     //on récupère le nom de la question modifiée qui a été transmis par le bouton submit
              $pourcentge=$_POST['pourcentage']; // on récupère la pondération de l'étiquette juste 
              $etiq_juste_modif=$_POST['reponse']; // on récupère l'intitulé de l'étiquette juste 
              $info_bullr_modif=$_POST['nom_info_bulle'];// on récupère l'infobulle pour une réponse juste 
            if ($n_etiquette_fausses!='0'){ // on vérifie l'existance d'étiuett fausse 
              $queryinput4="UPDATE etiquette_prof,question SET ponderation_etiquette='$pourcentge', contenu_etiquette='$etiq_juste_modif', aide='$info_bullr_modif'
              WHERE etiquette_prof.id_question=question.id_question AND question.id_question='$id_quest_modif2'AND id_etiquette_prof='$id_etiquette' AND etat_etiquette=TRUE "; // requete de MAJ des informations d'une etiquette juste 


          // il faut l'id question / l'id etiqutte fausse 
              for ($i=0; $i<$n_etiquette_fausses; $i++){ 
                $num_etiquette="reponse_vrai_".$i ; 
                $id_etiq_fa="id_etiqette_fausse_".$i ;  
                $etiq_fausse_modif=$_POST[$num_etiquette];// on récupère le contenu de l'etiquette fausse 
                $id_eti_f=$_POST[$id_etiq_fa]; // on récupere l'id de l'etiquette fausse 
                  $queryinput5="UPDATE etiquette_prof,question SET contenu_etiquette='$etiq_fausse_modif'
                  WHERE etiquette_prof.id_question=question.id_question AND question.id_question='$id_quest_modif2'AND etiquette_prof.id_etiquette_prof='$id_eti_f' AND etiquette_prof.etat_etiquette=FALSE"; // requete de MAJ de l'etiquette fausse ==> ne fonctionne pas pour l'instant 
                $envois4= mysqli_query($link, $queryinput4); // envois de la requete de MAJ de l'etiquette juste 
                $envois5= mysqli_query($link, $queryinput5); // envois de la requete de MAJ de l'etiquette fausse 
              }
            }
              else {		// s'il n'y a pas d'etiquette fausse alors on MAJ que les etiquette juste 
            $queryinput4="UPDATE etiquette_prof,question SET ponderation_etiquette='$pourcentge', contenu_etiquette='$etiq_juste_modif', aide='$info_bullr_modif'
              WHERE etiquette_prof.id_question=question.id_question AND question.id_question='$id_quest_modif2'AND id_etiquette_prof='$id_etiquette' AND etat_etiquette=TRUE ";// requete de MAJ des informations d'une etiquette juste 
            $envois4= mysqli_query($link, $queryinput4); // envois de la requete de MAJ de l'etiquette juste 
            }
            }

        if(isset($_POST["bt_ajouter_question"])){
          $querynewq="INSERT INTO question (id_page,id_type_question,id_categorie,numero_question,consigne_question,note_question,nombre_tentatives,nb_colonnes,nb_lignes,lien,nom_question,cplmt,reonse_question) VALUES ('1','1','1','', '', '10', '3', '0', '0', '', '','','')";
          $envoisnewq= mysqli_query($link, $querynewq);
        }

        if(isset($_POST["bt_supprimer_question"])){
          $val=$_POST["bt_supprimer_question"];
          echo $val;
          $querysuppr="DELETE FROM question
          WHERE id_question='".$val."'";
          $envoissuppr= mysqli_query($link, $querysuppr);
        }

        // REQUETE POUR AJOUTER NOM ET CHEMIN D'UNE NOUVELLE IMAGE 
        // le update ne se fait pas quand on appuie sur envoyer 


        if(isset($_POST["image"]) and isset($_POST["nom_photo"])){
          $val=$_POST["bouton1"];

          $nom_image=$_POST["nom_photo"];
          $query_ajout_image="INSERT INTO Image ( id_question, chemin_acces, nom_image) 
                    VALUES ( '$val', 'C:\\laragon\\www\\Numag\\Feuille-de-style', '$nom_image')";
          $envoi_image=mysqli_query($link, $query_ajout_image);
        }

        // BOUTON SUPPRESSION  DE L'IMAGE
        if(isset($_POST['nb_im'])){
          $nombre_im=$_POST['nb_im'];
          for($i=0;$i<$nombre_im;$i++){
            if(isset($_POST['image_supr'.$i.''])) {
              $val=$_POST["bouton1"];
              $id_im_supr=$_POST['id_image_supprime'.$i.'']; 
              $query_supr_im="DELETE FROM image WHERE image.id_question='$val' AND id_image='$id_im_supr'";
              $envoi_suppression_image=mysqli_query($link, $query_supr_im);
            }
          }
        }
      
        //NAVIGATION QUESTION
        // on selectionne le texte de toutes les questions et on les met dans un tableau 
          $query_liste= "SELECT id_question FROM question ORDER BY id_question";
          $result_liste= mysqli_query($link, $query_liste);
          $tab_liste= mysqli_fetch_all($result_liste);  
          
          // on compte le nombre de question dans la table
          $query_n= "SELECT COUNT(id_question) FROM question";
          $result_n= mysqli_query($link, $query_n);
          $tab_n= mysqli_fetch_all($result_n);  
      ?>
      <!-- Appel des feuilles de style js (ne pas déplacer dans /head) -->
        <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js"></script>	

      <div class="card card-custom-text py-2">
        <div class="d-md-block text-center">
          <?php
            if(isset($_POST["bouton1"])){ // Si on a déja séléctionné une question on affiche cette boucle if
              $val=$_POST["bouton1"];
              for($i=0 ; $i<$tab_n[0][0] ; $i=$i+1){
                echo'<form action="gestion_td_v2.php" method="POST" class="d-inline-flex">';
                $j=$i+1;
                if($val == $tab_liste[$i][0]){
                  echo'<input type="submit" class="btn btn-outline-success text-center mx-2 my-1 active" name="bouton" value="Question '.$j.'">';
                  echo'<input type="hidden" name="bouton1" value="'.$tab_liste[$i][0].'">';
                } //Si la question est sélectionné on affiche le bouton active
                else{
                  echo'<input type="submit" class="btn btn-outline-success text-center mx-2 my-1" name="bouton" value="Question '.$j.'">';
                  echo'<input type="hidden" name="bouton1" value="'.$tab_liste[$i][0].'">';
                }  // Si aucune question n'est sélectionnée on met les boutons normaux
                echo'</form>';
              }
            } 
            else{
              for($i=0 ; $i<$tab_n[0][0] ; $i=$i+1){
                echo'<form action="gestion_td_v2.php" method="POST" class="d-inline-flex">';
                $j=$i+1;
                echo'<input type="submit" class="btn btn-outline-success text-center mx-2 my-1" name="bouton" value="Question '.$j.'">';
                echo'<input type="hidden" name="bouton1" value="'.$tab_liste[$i][0].'">';
                echo'</form>';
              } // Si aucune question n'est sélectionnée quand on arrive dans le site on affiche quand même les questions avec la boucle for
            }
            
            ?>
          <!-- Bouton permettant de créer une question -->
            <div class="d-inline-flex justify-content-center">
              <form action="gestion_td_v2.php" method="POST">
                <button type="submit" class="btn text-center btn-primary" name="bt_ajouter_question">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                </button>
              </form>
            </div>



          <!-- Bouton permettant de supprimer une question -->
            <?php if(isset($_POST["bouton1"])){?>
              <div class="d-inline-flex justify-content-center">
                <form action="gestion_td_v2.php" method="POST">
                  <?php $val=$_POST["bouton1"]?>
                  <button type="button" class="btn btn-danger text-center" data-bs-toggle="modal" data-bs-target="#Supprimer_activite">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                  </button>
                   <!-- Modal, permet d'afficher une fenetre js pour confirmer le choix-->
                   <div class="modal fade" id="Supprimer_activite" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Supprimer_activitesLabel" aria-hidden="true">
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
                          <button type="submit" value ='<?php echo $val;?>' class="btn text-center btn-danger" name="bt_supprimer_question">Supprimer la question </button>
                        </div>
                      </div>
                    </div>
                  </div> 
                </form>
              </div>
            <?php } ?>
        </div>
      </div>

      <!--PREMIER CADRE-->
      <?php if(isset($_POST['bouton1'])){ ?>
        <div class="card card-custom-text">
          <form action="gestion_td_v2.php" method="POST">
            <?php $val=$_POST['bouton1']; ?>
            <div class="row mb-2 g-3 align-items-center">
              <div class="col-md-2"> 
                <label >Catégorie:</label> 
              </div>

              <?php	// Requète SQL pour récupérer toutes les catégories existantes dans une liste //
                $nom_quest=$_POST["bouton1"]; //on recupère la valeur de bouton 1 (question que l'on veut modifier)//
                $query2="	SELECT categorie.lib_categorie, question.id_categorie, categorie.id_categorie, question.id_question 
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
                $nb_categorie=$tab_nb_categories[0][0]; 
              ?>

              <div class="col-md-4 d-inline-flex">
                <select class="form-select mx-3" aria-label="Default select example" name="categorie">
                  <?php 
                    for    ($i=0; $i<$nb_categorie; $i=$i+1){
                      if(isset($_POST["bt_valider_nouv_categorie"])){
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
                    } 
                  ?>
                </select>
             
                <!--  BOUTON AJOUT CATEGORIE -->          
                  <?php 
                    $value=$_POST["bouton1"]; 
                    echo " <input type='hidden' bouton1='".$value."'>" 
                  ?>
                  <button type="submit" class="btn text-center btn-primary" name="bt_ajouter_categorie">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                  </button>
              </div>
                <!-- FIN DE BOUTON AJOUT CATEGORIE -->
          
              <div class="col-md-5 d-inline-flex">
                
                <!-- Formulaire d'ajout -->
                    <?php if(isset($_POST["bt_ajouter_categorie"])){ ?>
                      <input type="text" class="form-control mx-3" placeholder="Entrez une nouvelle catégorie..." name="nouv_categorie" >
                      <?php echo '<input type="hidden" name="bouton1" value="'.$value.'" >'?>
                      <input type="submit" class="btn btn-success text-center" name="bt_valider_nouv_categorie" value="Valider"></input>
                    <?php } ?>
                <!-- Fin de Formulaire d'ajout -->
              </div>
            </div>

            <!-- TYPE DE QUESTION -->
              <div class="row g-3 align-items-center">
                <div class="col-md-2"> 
                  <label >Type de question :</label> 
                </div>
                <?php 
                  $query2bis="SELECT question.id_type_question, type_question.id_type_question, question.id_question,type_question.type_question
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
                ?>
                <div class="col-md-4 d-inline-flex">
                  <select class="form-select mx-3" aria-label="Default select example" name="typequestion">
                    <?php
                      for	($i=0; $i<$nb_catégorie_bis; $i=$i+1){
                        if ($type_question_selec_bis==$tab4bis[$i][0]){
                          echo '<option value="'.$tab4bis[$i][0].'" selected>'.$type_question_selec_bis.'</option>' ; 
                        }
                        else{
                          echo '<option value="'.$tab4bis[$i][0].'"> '.$tab4bis[$i][0].' </option>' ;
                        }
                      }
                    ?>
                  </select> 
                  <?php echo '<input type="hidden" name="bouton1" value="'.$_POST['bouton1'].'">' ?>
                  <input type="submit" class="btn btn-success text-center" name="test" value="Valider"></input>
                </div>
              </div>
            <!-- FIN TYPE DE QUESTION -->
          </form>
        </div>
      <?php } ?>
      <!-- FIN PREMIER CADRE -->


      <!--DEUXIEME CADRE-->
        <?php if(isset($_POST["test"]) || isset($_POST["cadre2"] ) || isset($_POST["bouton1"] )){ ?>
          <div class="card card-custom-text">
            <form method="POST" action="gestion_td_v2.php" enctype="multipart/form-data">
           
              <!-- NOM QUESTION --> 
                <?php
                  $val=$_POST['bouton1'];
                  $query5= "SELECT numero_question, id_question
                    FROM question 
                    WHERE id_question='$val'"; // il faudra changer dans la bdd le numero_question par le nom_question
                  $result5= mysqli_query($link, $query5);
                  $tab5= mysqli_fetch_all($result5);
                  ?>
                <div class="row mb-2 g-3 align-items-center">
                  <div class="col-md-3"> 
                    <label >Nom de la question :</label> 
                  </div>
                  <div class="col-md-9 d-inline-flex">
                    <?php echo'<input type="text" class="form-control mx-3" placeholder="Entrez un nom de question" name="nom_question" value="'.$tab5[0][0].'">' ?> <br>
                  </div>
                </div>
                
              <!-- FIN NOM QUESTION -->

              <!-- NOMBRE TENTATIVES -->
                <!-- affichage du nombre de tentatives autorisées sous forme de liste déroulante -->
                <?php
                  $val=$_POST["bouton1"]; // Récupération de la valeur de la question sélectionnée
                  // Requête pour afficher le nombrede tentatives pour la question sélectionnée 
                  $querytenta="SELECT question.nombre_tentatives
                    FROM question 
                    WHERE question.id_question='$val'";
                  $resulttenta= mysqli_query($link, $querytenta);
                  $tabtenta= mysqli_fetch_all($resulttenta);
                  $nb_tentatives_selec= array('0','1','2','3','4','5','6');
                ?>
                <div class="row mb-2 g-3 align-items-center">
                  <div class="col-md-3"> 
                    <label >Nombre de tentatives autorisées:</label> 
                  </div>
                  <div class="col-md-2 d-inline-flex ">
                    <select class="form-select mx-3" aria-label="Default select example" name="tentatives">               
                      <?php
                        for    ($i=0; $i<count($nb_tentatives_selec) ; $i=$i+1){
                          if ($nb_tentatives_selec[$i][0]==$tabtenta[0][0]){
                            echo '<option value="'.$nb_tentatives_selec[$i][0].'" selected>'.$nb_tentatives_selec[$i][0].'</option>' ; 
                          }
                          else{
                            echo '<option value="'.$nb_tentatives_selec[$i][0].'"> '.$nb_tentatives_selec[$i][0].' </option>' ;
                          }
                        }
                        // La liste déroulante contient les différents nombre de tentatives différents
                        // Le nombre de tentatives de la question sélectionnée est affiché
                      ?>
                    </select>
                  </div>
                </div>
              <!-- FIN NOMBRE TENTATIVES -->

              <!-- CONSIGNE QUESTION -->
                <?php
                  $val=$_POST['bouton1'];
                  $query6= "SELECT consigne_question FROM question WHERE id_question='$val'";
                  $result6= mysqli_query($link, $query6);
                  $tab6= mysqli_fetch_all($result6);
                ?>
                <div class="row mb-2 g-3 align-items-center">
                  <div class="col-md-3"> 
                    <label >Consigne de la question :</label> 
                  </div>
                  <div class="col-md-9 d-inline-flex">
                    <textarea class="form-control mx-3" placeholder="Entrez une consigne" rows="3" name="consigne"><?php echo $tab6[0][0]?></textarea>
                  </div>
                </div>
              <!-- FIN CONSIGNE QUESTION -->
                    
              <!-- INSERER UNE IMAGE -->
              <?php
                $val=$_POST['bouton1'];
                $query_image= "SELECT image.id_question, chemin_acces,nom_image, id_image 
                              FROM image , question 
                              WHERE image.id_question=question.id_question AND image.id_question='$val'"; // on sélectionne les images correspondant a la question séléctionnée
                $resultat_image=mysqli_query($link,$query_image);
                $tab_image=mysqli_fetch_all($resultat_image);
                $n_photo=count($tab_image);

                if($n_photo>0){ ?> <!-- si il y a des image pour cette question -->                  
                  <div class="row mb-2 g-3 align-items-center">
                    <div class="col-md-3 d-inline-flex">
                      <label for="photo" class="form-label">Image :</label>
                    </div>
                    <?php echo'<input type="hidden" name="nb_im" value="'.$n_photo.'">' ?>
                    <div class="col-md-9 d-inline-flex">
                      <input type="file" class="form-control mx-3" name="photo" id="photo">
                      <input type="submit" class="btn text-center btn-primary me-3" name="oui_image" value="Ok">
                    </div>
                    <?php echo'<input type="hidden" name="bouton1" value="'.$val.'">' ?>
                  </div>
                  <?php

                  if (isset( $_POST['oui_image'])) { ?>
                    <div class="row my-2 g-3 align-items-center">
                      <div class="col-md-3"></div>
                      <div class="col-md-8 mx-3">
                        Pour ajouter la photo appuyez sur Envoyer
                      
                      <?php
                      $retour = copy($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
                      $nom_Photo=$_FILES['photo']['name'];// j'arrive pas a récupéré cette valeur pour la requette d'upload ligne 240
                        /* echo'<input type="hidden" name="chemin" value="'.$.'">';*/
                      echo'<input type="hidden" name="nom_photo" value='.$nom_Photo.'>';
                      
                      if($retour and isset( $_POST['image'])) {
                      echo'<input type="hidden" name="nom_photo" value='.$nom_Photo.'>'; // j'arrive pas a récupéré cette valeur pour la requette d'upload ligne 240
                          echo '<p>La photo a bien été envoyée.</p>';
                          /*echo '<img src="' . $_FILES['photo']['name'] . '">';*/  
                      } ?>
                      <input type="submit" class="btn text-center btn-primary mx-3" name="image" value="Envoyer">
                      </div>
                    </div>
                  <?php }
                  echo"<br>";

                  for($i=0;$i<$n_photo;$i++){
                  echo 'Nom de l\'image : '.$tab_image[$i][2].'<br>
                            <a href="' . $tab_image[$i][1] . '"><img src="' . $tab_image[$i][2] . '" height="500" width="500"  title="Cliquez pour agrandir"></a>
                            <hr>';
                  echo"  ";

                  echo'<input type="hidden" name="id_image_supprime'.$i.'" value="'.$tab_image[$i][3].'">';
                  echo'<input type="submit" class="btn text-center btn-danger mb-3" name="image_supr'.$i.'" value="Supprimer l\'image">';
                  echo'<br>';
                  }
                }
                else{ ?>
                  <div class="row mb-2 g-3 align-items-center">
                    <div class="col-md-3 d-inline-flex">
                      <label for="photo" class="form-label">Image :</label>
                    </div>
                    <?php echo'<input type="hidden" name="nb_im" value="'.$n_photo.'">' ?>
                    <div class="col-md-9 d-inline-flex">
                      <input type="file" class="form-control mx-3" name="photo" id="photo">
                      <input type="submit" class="btn text-center btn-primary me-3" name="oui_image" value="Ok">
                    </div>
                    <?php echo'<input type="hidden" name="bouton1" value="'.$val.'">' ?>
                  </div>
                  <?php

                  if (isset( $_POST['oui_image'])) { ?>
                    <div class="row my-2 g-3 align-items-center">
                      <div class="col-md-3"></div>
                      <div class="col-md-8 mx-3">
                        Pour ajouter la photo appuyez sur Envoyer
                      
                      <?php
                      $retour = copy($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
                      $nom_Photo=$_FILES['photo']['name'];// j'arrive pas a récupéré cette valeur pour la requette d'upload ligne 240
                        /* echo'<input type="hidden" name="chemin" value="'.$.'">';*/
                      echo'<input type="hidden" name="nom_photo" value='.$nom_Photo.'>';
                      
                      if($retour and isset( $_POST['image'])) {
                      echo'<input type="hidden" name="nom_photo" value='.$nom_Photo.'>'; // j'arrive pas a récupéré cette valeur pour la requette d'upload ligne 240
                          echo '<p>La photo a bien été envoyée.</p>';
                          /*echo '<img src="' . $_FILES['photo']['name'] . '">';*/  
                      } ?>
                      <input type="submit" class="btn text-center btn-primary mx-3" name="image" value="Envoyer">
                      </div>
                    </div>
                  <?php }
                  echo"<br>";
                }
              ?>

              <!-- INSERER UN LIEN -->
                <?php
                  $val=$_POST['bouton1'];
                  $query7= "SELECT lien FROM question WHERE id_question='$val'";
                  $result7= mysqli_query($link, $query7);
                  $tab7= mysqli_fetch_all($result7);
                ?>
                <div class="row mb-2 g-3 align-items-center">
                  <div class="col-md-3"> 
                    <label>Insérez un lien :</label> 
                  </div>
                  <div class="col-md-9 d-inline-flex">             
                    <?php echo '<input type="text" class="form-control mx-3" placeholder="Insérez un lien" name="lien" size="100" value="'.$tab7[0][0].'">' ?>
                  </div>
                </div>
              <!-- FIN INSERER UN LIEN -->

              <!-- INTITULE QUESTION -->
                <?php
                  $val=$_POST['bouton1'];
                  $query8= "SELECT cplmt FROM question WHERE id_question='$val'";
                  $result8= mysqli_query($link, $query8);
                  $tab8= mysqli_fetch_all($result8);
                ?>
                <div class="row mb-2 g-3 align-items-center">
                  <div class="col-md-3"> 
                    <label>Intitulé de la question :</label> 
                  </div>
                  <div class="col-md-9 d-inline-flex">
                    <?php echo '<input type="text" class="form-control mx-3" placeholder="Entrez un intitulé de question" name="intitule" size="100" value="'.$tab8[0][0].'">'?>           
                  </div>
                </div>
              <!-- FIN INTITULE QUESTION -->
              
              <!-- AFFICHAGE DU TYPE DE QUESTION (TABLEAU OU AUTRES) -->
                <?php

                  if(isset($_POST['bouton1'])){
                     $value=$_POST["bouton1"];
                   ; $query_type= "SELECT type_question FROM question,type_question WHERE question.id_type_question=type_question.id_type_question AND question.id_question=$value";
                    $resultat_type=mysqli_query($link,$query_type);
                    $tab_typ=mysqli_fetch_all($resultat_type);                  
                  }
                  $choix_type_question=$tab_typ[0][0];;
                ?>

                <!-- TABLEAU -->
                  <?php if($choix_type_question=="tableau"){ ?>
                  <div class="row mb-2 g-3 align-items-center">
                    <div class="col-md-3"> 
                      <label>Insérer un tableau :</label> 
                    </div>
                    <div class="col-md-2 text-md-end"> 
                      <label>Nombre de colonnes :</label> 
                    </div>
                    <!-- affichage du nombre de colonne du tableau sous forme de liste déroulante-->
                    <?php
                      $val=$_POST["bouton1"]; // Récupération de la valeur de la question sélectionnée
                      // Requête pour afficher le nb de colonnes du tableau de la question sélectionnée 
                      $querycolonnes2="SELECT question.nb_colonnes
                        FROM question 
                        WHERE question.id_question='$val'";
                      $resultcolonnes2= mysqli_query($link, $querycolonnes2);
                      $tabcolonnes2= mysqli_fetch_all($resultcolonnes2);
                      $nb_colonnes_selec= array('0','1','2','3','4','5','6');
                    ?>
                    <div class="col-md-2 d-inline-flex"> 
                      <select class="form-select mx-3" aria-label="Default select example" name="colonne">
                        <?php
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
                        ?>
                      </select> 
                    </div>
                    <div class="col-md-2 text-md-end"> 
                      <label>Nombre de lignes :</label> 
                    </div>
                    <!-- Affichage du nombre de ligne du tableau sous forme de liste déroulante -->
                    <?php
                      $queryligne2="SELECT question.nb_lignes
                        FROM question
                        WHERE question.id_question='$val'";
                      $resultligne2= mysqli_query($link, $queryligne2);
                      $tabligne2= mysqli_fetch_all($resultligne2);
                      $nb_ligne_selec= array('0','1','2','3','4','5','6');
                    ?>
                    <div class="col-md-2 d-inline-flex">
                      <select class="form-select mx-3" aria-label="Default select example" name="ligne">
                          <?php
                            for ($i=0; $i<count($nb_ligne_selec) ; $i=$i+1){
                              if ($nb_ligne_selec[$i][0]==$tabligne2[0][0]){
                                echo '<option value="'.$nb_ligne_selec[$i][0].'" selected>'.$nb_ligne_selec[$i][0].'</option>' ; 
                              }
                              else{
                                  echo '<option value="'.$nb_ligne_selec[$i][0].'"> '.$nb_ligne_selec[$i][0].' </option>' ;
                                  // La liste déroulante contient les différents nb de colonnes différents 
                                  // Le nb de colonnes de la question sélectionnée est affiché 
                              }
                            }
                          ?>
                      </select>
                    </div>
                  </div>
                  <?php } 
                    // QUESTION ETIQUETTE SANS TABLEAU
                    else{
                      //echo'type étiquette : partie encore non réalisée, a compléter';
                    }
                  ?>
                <!-- FIN QUESTION ETIQUETTE SANS TABLEAU -->
                <?php
                  echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>" ;
                  echo "<input type='hidden' name='typequestion' value='$choix_type_question'>" ;
                ?>    
                  
              <!-- AFFICHAGE DU TYPE DE QUESTION (TABLEAU OU AUTRES) -->
              
              <!-- PARAMETRAGE DE LA REPONSE ATTENDUE -->
              <label class="mb-2">Paramétrage de la réponse :</label>
              <div class="row mb-2 g-3 align-items-center">
                <div class="col-md-3 d-inline-flex">
                  <?php echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>"; ?> 
                  <input type="submit" class="btn text-center btn-primary" name="adddiv" value='Entrer du texte' > 
                  <?php if(isset($_POST['adddiv'])){ ?>
                </div>
                <div class="col-md-9 d-inline-flex">
                    <input type='text' class="form-control mx-3" placeholder="Entrez un texte" name='texte'>
                    <?php echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>"; ?> 	 
                    <input type='submit' class="btn btn-success text-center" name='gaga' value='Valider' >   
                  <?php } ?>
                </div>
              </div>
              <div class="row mb-2 g-3 align-items-center">
                <div class="col-md-3 mb-3 d-inline-flex">
                  <?php echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>"; ?> 
                  <input type="submit" name="adddiv2" class="btn text-center btn-secondary" value="Insérez une étiquette">
                </div>
              </div>
              <div class="card p-2">
                <?php if(isset($_POST['gaga'])){
                  $le_bouton=$_POST['bouton1']; 
                  $val_texte=$_POST['texte'];
                  $val_texte = str_replace("'", "\'",$val_texte) ;

                  $requete_ajout_rep= "UPDATE question SET reonse_question=CONCAT(reonse_question, ' $val_texte ') WHERE id_question='$le_bouton'";
                  $envoi_ajout=mysqli_query($link, $requete_ajout_rep); 
                }
                if(isset($_POST['adddiv2'])){
                  $le_bouton=$_POST['bouton1']; 
                  $val_texte=$_POST['adddiv2']; 
                  $requete_ajout_rep= "UPDATE question SET reonse_question=CONCAT(reonse_question, ' / etiquette / ') WHERE id_question='$le_bouton'";
                  $envoi_ajout=mysqli_query($link, $requete_ajout_rep); 
                }
                $le_bouton=$_POST['bouton1']; 
                $query_etiquette_reponse="SELECT reonse_question FROM question WHERE id_question='$le_bouton'";
                $resu_etiquette_reponse= mysqli_query($link,$query_etiquette_reponse);
                $tab_etiquette_reponse=mysqli_fetch_all($resu_etiquette_reponse);
                echo $tab_etiquette_reponse[0][0];
                $needle='etiquette';
                $nb_etiquettes=substr_count ( $tab_etiquette_reponse[0][0] , $needle  );

                echo'</div>';
                echo '<input type="submit" class="btn text-center btn-danger mt-3" name="suppr_etiquette_rep" value="Supprimer la réponse">'; 
                echo "<input type='hidden' name='nb_etiq_rep' value='".$nb_etiquettes."'>" ;
                echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>" ;          
                ?>

              <div class="d-flex justify-content-center my-3">
                <input type='submit' class="btn btn-success text-center" name= 'cadre2' value='Valider' >
              </div>     
            </form>
          </div>
        <?php }  ?>	  
      <!-- FIN DEUXIEME CADRE -->
      
      <!-- TROISIEME CADRE -->
        <?php 
          if(isset($_POST['bouton1'] )){
            
            $le_bouton=$_POST['bouton1']; 
            $query_etiquette_reponse="SELECT reonse_question FROM question WHERE id_question='$le_bouton'";
            $resu_etiquette_reponse= mysqli_query($link,$query_etiquette_reponse);
            $tab_etiquette_reponse=mysqli_fetch_all($resu_etiquette_reponse);
            $needle='etiquette';
            $nb_etiquettes=substr_count ( $tab_etiquette_reponse[0][0] , $needle  );
          
          if(isset($nb_etiquettes)){
            if($nb_etiquettes!=0){ // CODAGE ETIQUETTE 
              // BOUTON ETIQUETTE 
              $val=$_POST['bouton1'];
              $val2=$_POST['id_etiquette_cache'];
              $query_liste_etiquette= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
                FROM etiquette_prof,question 
                WHERE etiquette_prof.id_question=question.id_question 
                AND etat_etiquette=TRUE AND question.id_question='$val'";
              $result_liste_etiquette= mysqli_query($link, $query_liste_etiquette);
              $tab_liste_etiquette= mysqli_fetch_all($result_liste_etiquette);
              $n_etiquette=count($tab_liste_etiquette);
                // on compte le nombre de question dans la table
                /*$query_n= "SELECT COUNT(numero_question) FROM etiquette";
                $result_n= mysqli_query($link, $query_n);
                $tab_n= mysqli_fetch_all($result_n); */ 

              // on créé autant de bouton qu'il y a de question en leur donnant le nom de la question à laquelle ils correspondent 
              ?>
              <div class="card card-custom-text">
                <div class="d-md-block text-center">
                  <?php for($i=0 ; $i<$n_etiquette ; $i=$i+1){ ?>
                    <form method="POST" class="d-inline-flex" action="gestion_td_v2.php">
                        <?php
                        if($val2 == $tab_liste_etiquette[$i][0]){
                          echo '<input type="submit" class="btn btn-outline-success text-center mx-2 my-1 active" name="bouton_etiquette" value="etiquette '.$tab_liste_etiquette[$i][0].'" >' ;
                          echo '<input type="hidden" name="bouton1" value= "'.$val.'">';
                          echo '<input type="hidden" name="id_etiquette_cache" value="'.$tab_liste_etiquette[$i][0].'">';
                        }
                        else{
                          echo '<input type="submit" class="btn btn-outline-success text-center mx-2 my-1" name="bouton_etiquette" value="etiquette '.$tab_liste_etiquette[$i][0].'" >' ;
                          echo '<input type="hidden" name="bouton1" value= "'.$val.'">';
                          echo '<input type="hidden" name="id_etiquette_cache" value="'.$tab_liste_etiquette[$i][0].'">';
                        }
                        echo '</form>' ;
                        ?>
                  <?php } ?> 
                </div>
              </div>
          <?php }
          

          if( isset($_POST['bouton_etiquette'])){//Code Pourcentage du barème
            echo'<div class="card card-custom-text">';
            echo '<form method="POST" action="gestion_td_v2.php">' ;
              $id_etiquette_recup=$_POST["id_etiquette_cache"]; 
              $val=$_POST['bouton1'];
              $query15= "SELECT etiquette_prof.ponderation_etiquette 
                FROM etiquette_prof, question
                WHERE question.id_question='$val'
                AND etiquette_prof.id_question= '$val' 
                AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";
              $result15= mysqli_query($link, $query15);
              $tab15= mysqli_fetch_all($result15);
              ?>
              <div class="row mb-2 g-3 align-items-center">
                <div class="col-md-2"> 
                  <label> Pourcentage du barème : </label>
                </div>
                <div class="col-md-2 d-inline-flex">
                <?php echo '<input type="text" class="form-control mx-3 d-flex col-md-3"  name="pourcentage" size="10" value="'.$tab15[0][0].'"> <br>'?>
                </div>
              </div>
              <?php
                // REPONSE ATTENDUE ET REPONSE PROPOSEE

              $id_etiquette_recup=$_POST["id_etiquette_cache"]; // on récupère l'id de l'etiquette 

              // on récupere les infos de l'etiquete vrai pour la reponse 
              $query_rep_vrai= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
                FROM etiquette_prof,question 
                WHERE etiquette_prof.id_question=question.id_question 
                AND etat_etiquette=TRUE AND question.id_question='$val'
                AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";

              $result_rep_vrai= mysqli_query($link, $query_rep_vrai);
              $tab_rep_vrai= mysqli_fetch_all($result_rep_vrai);
              $n_etiquette_vrai=count($tab_rep_vrai); 

              $query_rep_faux= "SELECT id_etiquette_prof,contenu_etiquette
                FROM etiquette_prof,question 
                WHERE etiquette_prof.id_question=question.id_question 
                AND etat_etiquette=FALSE AND question.id_question='$val'";        
              $result_rep_faux= mysqli_query($link, $query_rep_faux);
              $tab_rep_faux= mysqli_fetch_all($result_rep_faux);
              $n_etiquette_fausse=count($tab_rep_faux);
              echo '<input type="hidden" name="nombre_etiq_faus" value="'.$n_etiquette_fausse.'">';   ?>         
              <div class="row mb-2 g-3 align-items-center">
                <div class="col-md-2"> 
                  <label> Etiquette juste : </label>
                </div>
                <div class="col-md-10 d-inline-flex">
                  <?php for($i=0 ; $i<$n_etiquette_vrai ; $i=$i+1){ 
                    echo '<input type="input" class="form-control mx-3" placeholder="Entrez une réponse" name="reponse" value="'.$tab_rep_vrai[$i][1].'" >' ; 
                  }?>
                </div>
              </div>
              
              <?php
              //Code infobulle réussite
              $id_etiquette_recup=$_POST["id_etiquette_cache"]; 
              $val=$_POST['bouton1'];    
              $query17= "SELECT etiquette_prof.aide
                FROM etiquette_prof, question
                WHERE question.id_question='$val'
                AND etiquette_prof.id_question= '$val' 
                AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";
              $result17= mysqli_query($link, $query17);
              $tab17= mysqli_fetch_all($result17);
              ?>
              <div class="row mb-2 g-3 align-items-center">
                <div class="col-md-2"> 
                  <label> Infobulle aide : </label>
                </div>
                <div class="col-md-10 d-inline-flex">
                  <?php echo   '<input type="text" class="form-control mx-3" placeholder="Entrez un feed-back" name="nom_info_bulle" size="100" value="'.$tab17[0][0].'">' ?>
                </div>         
              </div>
              <div class="row mb-2 g-3 align-items-center">
                <div class="col-md-2"> 
                  <label> Etiquette fausse : </label>
                </div>
                <div class="col-md-1 d-inline-flex mx-3">
                  <?php echo $n_etiquette_fausse ?>
                </div>
              </div>
              
                  <?php for($i=0 ; $i<$n_etiquette_fausse ; $i=$i+1){?>
                    <div class="row mb-2 g-3 d-flex align-items-center">
                      
                        <?php echo '<input type="hidden" name="id_etiqette_fausse_'.$i.'" value="'.$tab_rep_faux[$i][0].'">'; // récupération de l'id de l'etiquette fausse ?>
                      
                      <div class="col-md-8 d-inline-flex">
                        <?php echo '<input type="text" class="form-control mx-3" placeholder="Entrez le contenu de l\'étiquette fausse" name="reponse_vrai_'.$i.'" value="'.$tab_rep_faux[$i][1].'" >' ?>
                      </div>
                      <div class="col-md-3 d-inline-flex">
                        <?php echo '<input type="submit" name="etiquette_-_fausse'.$i.'" class="btn text-center btn-danger" value="Supprimer l\'étiquette" >' ?>
                      </div>
                    </div>
                  <?php } ?>
              <?php

              // RENDU DE LA REPONSE AVEC LES VALEURS DES ETIQUETTES

              $val=$_POST['bouton1'] ;           
              $query_etiquette_contenu_rep="SELECT id_etiquette_prof,contenu_etiquette FROM etiquette_prof WHERE id_question=$val AND etat_etiquette='1'" ; 
              $envois_etiquette_contenu_rep= mysqli_query($link, $query_etiquette_contenu_rep); 
              $tab_etiquette_contenu_rep=mysqli_fetch_all($envois_etiquette_contenu_rep) ;

              $compte_etiq="SELECT COUNT(id_etiquette_prof) FROM etiquette_prof WHERE id_question=$val AND etat_etiquette=1 " ;
              $envois_compte_etiq= mysqli_query($link, $compte_etiq) ; 
              $tab_compte_etiq=mysqli_fetch_all($envois_compte_etiq) ; 

              $query_etiquette_reponse2="SELECT reonse_question FROM question WHERE id_question='$val'";
                  $resu_etiquette_reponse2= mysqli_query($link,$query_etiquette_reponse2);
                  $tab_etiquette_reponse2=mysqli_fetch_all($resu_etiquette_reponse2);
                $bodytag =$tab_etiquette_reponse2[0][0] ; 
              for($i=0 ; $i<$tab_compte_etiq[0][0] ; $i++){
                if(substr_count($tab_etiquette_reponse2[0][0], 'etiquette '.$tab_etiquette_contenu_rep[$i][0])){
                  $bodytag = str_replace('etiquette '.$tab_etiquette_contenu_rep[$i][0], $tab_etiquette_contenu_rep[$i][1], $bodytag );	
                }
              }
              
                              
              $id_etiq_cah=$_POST['id_etiquette_cache'];
              $val=$_POST['bouton1'];
              $btn_etqt=$_POST['bouton_etiquette']; 

              echo '<input type="hidden" name="bouton_etiquette" value="'.$btn_etqt.'" >' ; 
              echo '<input type= "hidden" name="bouton1" value="'.$val.'">';
              
              echo"   ";
              echo '<input type="submit" class="btn text-center btn-primary mx-3 my-3" name="etiquette_+_fausse" value="Ajouter une étiquette fausse " >' ;
              echo"   ";
              echo"<br>";
              echo '<div class="card card-custom-text">';
              echo $bodytag ;
              echo'</div>';
              echo '<input type= "hidden" name="id_etiquette_cache" value="'.$id_etiq_cah.'">';

              echo"<br>";
              echo"<br>";

              echo '<input type= "hidden" name="nb_réponse_fausse" value="'.$n_etiquette_fausse.'">' ?>
              
              <div class="d-flex justify-content-center my-3">
              <input type="submit" class="btn btn-success text-center" name="enregistre" value="Enregistrer les modifications" >
              </div>
            </form>
          <?php }
        }
        else{    
          if($nb_etiquettes!=0){ // CODAGE ETIQUETTE 
            // BOUTON ETIQUETTE 
            $val=$_POST['bouton1'];
            $val2=$_POST['id_etiquette_cache'];
            $query_liste_etiquette= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
              FROM etiquette_prof,question 
              WHERE etiquette_prof.id_question=question.id_question 
              AND etat_etiquette=TRUE AND question.id_question='$val'";
            $result_liste_etiquette= mysqli_query($link, $query_liste_etiquette);
            $tab_liste_etiquette= mysqli_fetch_all($result_liste_etiquette);
            $n_etiquette=count($tab_liste_etiquette);
          for($i=0 ; $i<$n_etiquette ; $i=$i+1){
            echo'<form method="POST" class="d-inline-flex" action="gestion_td_v2.php">';                
            echo '<input type="submit" class="btn btn-outline-success text-center mx-2 my-1 active" name="bouton_etiquette" value="etiquette '.$tab_liste_etiquette[$i][0].'" >' ;
            echo '<input type="hidden" name="bouton1" value= "'.$val.'">';
            echo '<input type="hidden" name="id_etiquette_cache" value="'.$tab_liste_etiquette[$i][0].'">';
            echo'</form>';
          }
          }     
        }
      }
      ?>
    </div>  
  </body>
</html>