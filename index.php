<?php 

require_once 'Controllers/ActionController.php';

if(isset($_GET['action']) && $_GET['action']=="modifier"){
    actionUpdate();
}
else if(isset($_GET['action']) && $_GET['action']=="valider"){
    update();
 }
 else if(isset($_GET['action']) && $_GET['action']=="supprimer"){
    remove();
 }
 else if(isset($_GET['action']) && $_GET['action']=="add"){
    actionAdd();
 }
 else if(isset($_GET['action']) && $_GET['action']=="ajouter"){
    add();
 }
 else if(isset($_GET['search'])){
   search();
}
else if(isset($_GET['action']) && $_GET['action']=="newtask"){
newTask();
}
else if (isset($_GET['action']) && $_GET['action']=="addtab"){
   addTab();
}
else{
    listing();
}
