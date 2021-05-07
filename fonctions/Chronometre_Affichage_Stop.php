<!doctype html>
<html>
<?php
//Nils Hocquemiller
//Affichage d'un chronomètre et stop
//Ce code php importe un code javascript qui crée un chronomètre
//Le code javascript a aussi les fonctions pour Start, Stop et Reset
//Ici, le code n'utilise que la fonction Stop, il faudra avoir lancé le chronomètre dans une page antérieure
//Source : www.exelib.net

?>
<head>
	<title>Chronomètre</title>
	<meta charset="utf-8">
	<!-- on importe le code javascript ayant toutes les fonctions -->
	<script src="Fonctions_Chrono.js"></script>
	
	<!-- on défini le style du chronomètre, on peut le modifier -->
<style type="text/css">
      .chronometre{
        margin: auto ;
        width: 300px;
        text-align: center;
        
      }

      .tim{
      	margin: auto;
      	width: 300px;
      	border: 1px solid rgba(0,0,0,0.5);
      	padding:5px 0;
      	text-align: center;
      	font-size: 1.5em;
      	font-family: digital;
      	margin-bottom: 10px;

      }   

	</style>
</head>

<!-- Le body va directement executé la fonction Stop_chrono qui se trouve ds le fichier javascript -->
<body onload='Stop_chrono()'>
<!-- on affiche le chrnomètre -->
<div class="tim">
  	<span >0 h</span> :
  	<span >0 min</span> :
  	<span >0 s</span> :
  	<span >0 ms</span>

  </div>


</body>
</html>