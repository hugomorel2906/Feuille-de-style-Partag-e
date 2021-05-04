<?php

echo '<script language=javascript>


var tfils=new Array();
var tpere=new Array();
var tab_rep=new Array();
var tab_rep_js="<?php echo $tab_rep_php;?>";


function dragstart_handler(ev) {
 console.log("dragStart");
 // Change the source element  background color to signify drag has started
 ev.currentTarget.style.border = "dashed";
 // Add the id of the drag source element to the drag data payload so
 // it is available when the drop event is fired
 ev.dataTransfer.setData("text", ev.target.id);
 // Tell the browser both copy and move are possible
 ev.effectAllowed = "copyMove";
}
function dragover_handler(ev) {
 console.log("dragOver");
 // Change the target element s border to signify a drag over event
 // has occurred.
 ev.preventDefault();
}
function drop_handler(ev, dest_copy,iddest_copy) {
  
  var pere;
  var fils;
  console.log("Drop");
  ev.preventDefault();
  // Get the id of drag source element (that was added to the drag data
  // payload by the dragstart event handler)
  var id = ev.dataTransfer.getData("text");
  // Only Move the element if the source and destination ids are both "move"
  if (id == "src_move" && ev.target.id == "dest_move"){

    ev.target.appendChild(document.getElementById(id));}
  // Copy the element if the source and destination ids are both "copy"
  if (id.substr(0,8) == "src_copy" && ev.target.id == dest_copy) {
   var nodeCopy = document.getElementById(id).cloneNode(true);
   nodeCopy.id = "newId";
   pere=ev.target;
   fils=nodeCopy;
   ev.target.appendChild(nodeCopy);
   tfils.push(fils);
   tpere.push(pere);
   tab_rep.push(pere.id, nodeCopy.innerText);
   alert(tab_rep);
   document.getElementById(iddest_copy).value = nodeCopy.innerText;
  }
}

function dragend_handler(ev) {
  console.log("dragEnd");
  // Restore source s border
  ev.target.style.border = "solid black";
  // Remove all of the drag data
  ev.dataTransfer.clearData();
}

function remove() {
  var l = tpere.length
  for (var i = 0; i <= l; i++) {
    var pere=tpere.pop();
    var fils=tfils.pop();
    pere.removeChild(fils);
    tab_rep=new Array();}
}



</script>';
?>
