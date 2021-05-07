<?php

// Nils, Mathilde & Charlotte
// 28/04/2021
// FONCTION DE REMPLISSAGE D'UN TABLEAU
// Paramètres à saisir: 
	// $donnees : g de sels ou de fibres. Ces données seront calculées : g de sels et de fibres divisé par les recommandations de l'RNP (en %)



function Cptetab ($link, $table, $critere)
{
 if ($critere != "")
 {
    $critere = "where $critere";
 }
  $sql = "select count(*) as nb from $table $critere";
  $r_sql = mysqli_query($link,$sql) ;
  //echo $sql;
  $tbl_ligne = mysqli_fetch_row($r_sql);
  $val = $tbl_ligne[0];
  //echo $val;
  return $val;
}

function rechdom ($link,$nom_champ, $table, $critere)
{
 if ($critere != "")
 {
    $critere = "where $critere";
 }

  $sql = "select $nom_champ from $table $critere";
  //echo $sql;
  $r_sql = mysqli_query($link,$sql) ;

  $tbl_ligne = mysqli_fetch_row($r_sql);
  $val = $tbl_ligne[0];
  return $val;
}

?>
