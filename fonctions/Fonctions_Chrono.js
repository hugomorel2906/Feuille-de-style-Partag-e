/* Nils Hocquemiller */
/* Ce code est en Javascript */
/* Il permet de créer un chronomètre, et a aussi les fonctions start, stop et reset du chrono */
/*Source : www.exelib.net*/

  /*la fonction getElementByTagName renvoie une liste des éléments portant le nom de balise donné ici "span".*/
  /* "span" correspond au div dans le body de l'autre page */
  var sp = document.getElementsByTagName("span");
  var t;
  var ms=0,s=0,mn=0,h=0;
   
   /*La fonction "start" démarre un appel répétitive de la fonction update_chrono par une cadence de 100 milliseconde en utilisant setInterval et désactive le bouton start, ici je l'ai changé en variable */
  function Start_chrono(){
   t =setInterval(Update_chrono,100);
   var_start.disabled=true;
  
  }
  /*La fonction update_chrono incrémente le nombre de millisecondes par 1 <==> 1*cadence = 100 */
  function Update_chrono(){
    ms+=1;
    /*si ms=10 <==> ms*cadence = 1000ms <==> 1s alors on incrémente le nombre de secondes*/
       if(ms==10){
        ms=1;
        s+=1;
       }
       /*on teste si s=60 pour incrémenter le nombre de minute*/
       if(s==60){
        s=0;
        mn+=1;
       }
       if(mn==60){
        mn=0;
        h+=1;
       }
       /*afficher les nouvelle valeurs*/
       sp[0].innerHTML=h+" h";
       sp[1].innerHTML=mn+" min";
       sp[2].innerHTML=s+" s";
       sp[3].innerHTML=ms+" ms";

  }
  
	/*on arrête le "timer" par clearInterval ,on réactive le bouton start */
	function Stop_chrono(){
    clearInterval(t);
    var_start.disabled=false;
		
	}
  /*dans cette fonction on arrête le "timer" ,on réactive le bouton "start" et on initialise les variables à zéro */
  function Reset_chrono(){
   clearInterval(t);
    var_start.disabled=false;
    ms=0,s=0,mn=0,h=0;
    /*on accède aux différents span par leurs indice*/
    sp[0].innerHTML=h+" h";
    sp[1].innerHTML=mn+" min";
    sp[2].innerHTML=s+" s";
    sp[3].innerHTML=ms+" ms";
      }


