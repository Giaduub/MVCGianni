<?php // Connexion Base de donnée 


Class Connexion{

public function dbConnect(){
    try
    {
        $db = New PDO('mysql:host=localhost;dbname=conciergerie;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
}