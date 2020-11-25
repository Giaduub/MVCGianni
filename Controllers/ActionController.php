<?php

require_once 'Models/models.php';

function actionUpdate(){
    require_once 'Views/updataform.php';
    
}

function actionAdd(){
    require_once 'Views/addform.php';

}

function listing(){
    $listing = new Tasks();
    $listing = $listing->show();
    require_once 'Views/listing.php';
}

function update(){
    $update = new Tasks(); // Je crée mon objet qui utilise la class Intervention
    $update->update(); // On appelle la méthode Update dans notre objet
    listing();
}

function remove(){
    $delete = new Tasks(); // Je crée mon objet qui utilise la class Intervention
    $delete->delete(); // On appelle la méthode Update dans notre objet
    listing();
}

function add(){
    $add = new Tasks(); // Je crée mon objet qui utilise la class Intervention
    $add->add(); // On appelle la méthode Update dans notre objet
  listing();
}

function search(){
    $search = new Tasks(); // Je crée mon objet qui utilise la class Intervention
    $listing = $search->search(); // On appelle la méthode Update dans notre objet
    require_once 'views/listing.php';
}

function newTask(){
    $show = new Tasks();
    $show =$show->taskShow();
    require_once 'Views/newtask.php';
}

function addTab(){
    $addTab = new Tasks();
    $addTab->addTask();
    listing();
}

