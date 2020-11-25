<?php require_once 'Database.php';

class Tasks extends Connexion{

    function show(){
        $pdoStat = $this->dbConnect()->prepare('SELECT * FROM `action` ORDER BY `date` ');
        $executeIsOK=$pdoStat->execute();
        $tenant=$pdoStat->fetchAll();
        return $tenant;
    }

    function add(){
        $add=$this->dbConnect()->prepare('INSERT INTO `action` (`date`, `type`, `floor`) VALUES (:date_, :type_, :floor_) ');
    $add->bindParam(':date_', $_GET['date'],PDO::PARAM_STR);
    $add->bindParam(':type_', $_GET['type'],PDO::PARAM_STR);
    $add->bindParam(':floor_', $_GET['floor'],PDO::PARAM_INT);
    $plus= $add->execute();
    }


    function delete(){
    $supprimer = $this->dbConnect()->prepare('DELETE From `action` WHERE id=:id');
        $supprimer->bindParam(':id', $_GET['id']);
        $supprimer->execute();
 }

    function update(){
        $modifier = $this->dbConnect()->prepare('UPDATE `action` SET `date` = :date, `floor`=:floor, `type`=:type WHERE id = :id');
        $modifier->bindParam(':date', $_GET['date']);
        $modifier->bindParam(':floor', $_GET['floor']);
        $modifier->bindParam(':type', $_GET['type']);
        $modifier->bindParam(':id', $_GET['id']);
        $modifier->execute();
    }

    public function search(){
        
       

        //ICI ON FERAIT LES RECHERCHES UNES MAIS NOUS ON VEUT DU CUMULATIF
        // if(!empty($_GET['search'])){
        //     $search = $this->connect()->prepare('SELECT * FROM interventions WHERE name_int LIKE "%":search"%"');
        //     $search->bindParam(':search', $_GET['search']); //On associe nos paramètre aux champs envoyés par le formulaire
    
        // }

        // if(!empty($_GET['etage'])){
        //     $search = $this->connect()->prepare('SELECT * FROM interventions WHERE step_int=:step');
        //     $search->bindParam(':step', $_GET['etage']); //On associe nos paramètre aux champs envoyés par le formulaire
     
        // }

        // if(!empty($_GET['date'])){
        //     $search = $this->connect()->prepare('SELECT * FROM interventions WHERE date_int=:date');
        //     $search->bindParam(':date', $_GET['date']); //On associe nos paramètre aux champs envoyés par le formulaire
     
        // }

        //ICI ON VA FAIRE DU CUMULATIF
        
        //On commence par créer deux tableaux vides
        //Un tableau qui va contenir la requete
        $req = array();
        //Un tableau qui va contenir la ou les valeurs
        $value = array();

        if(!empty($_GET['search'])){
            array_push($req, 'AND type LIKE "%"?"%"');
            array_push($value, $_GET['search']);
        }

        if(!empty($_GET['etage'])){
            array_push($req, 'AND floor=?');
            array_push($value, $_GET['etage']);
        }
        if(!empty($_GET['date'])){
            array_push($req, 'AND date=?');
            array_push($value, $_GET['date']);
        }

        $request = implode(" ", $req);
    
        $search = $this->dbConnect()->prepare('SELECT * FROM `action` WHERE 1=1 '.$request.'');
        $search->execute($value);
        //   var_dump ($req);
        // echo $request;
        //  var_dump ($value);
        // $search->debugDumpParams();
        $resultSearch = $search->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $resultSearch;
       

    }

    function listOfStep(){

        $step = $this->dbConnect()->prepare('SELECT floor FROM `action` GROUP BY floor' );
        $step->execute();
        $stepResult = $step->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $stepResult;
 
    }

    function taskShow(){
        $pdoStat = $this->dbConnect()->prepare('SELECT * FROM `task` ORDER BY `date` desc ');
        $executeIsOK=$pdoStat->execute();
        $task=$pdoStat->fetchAll();
        return $task;
     }

      // Ajout 2e tab
 function addTab(){
    $addtab=$this->dbConnect()->prepare('INSERT INTO `action` (`date`, `type`, `floor`) VALUES (:date_, :type_, :floor_) ');
    $addtab->bindParam(':date_', $_GET['date'],PDO::PARAM_STR);
    $addtab->bindParam(':type_', $_GET['type'],PDO::PARAM_STR);
    $addtab->bindParam(':floor_', $_GET['etage'],PDO::PARAM_INT);
    $plus= $addtab->execute();

          if($plus){
              echo 'Cette action à bien été ajoutée.';
          }else{
              echo 'Veuillez ressayer.';
          }
          }

          
          function removeTab($idtask){

            $remove=$this->dbConnect()->prepare('DELETE FROM `task` WHERE id=:id');
            $remove->bindParam(':id',$idtask, PDO::PARAM_INT);
        
            $remove = $remove->execute();
            if($remove){
                echo 'votre enregistrement a bien été supprimé';

                $filename='index.php';
                if (!headers_sent())
                header('Location: '.$filename);
                else {
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$filename.'";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="0;url='.$filename.'" />';
                echo '</noscript>';
                }
                
            
            } else {
                echo 'Veuillez recommencer svp, une erreur est survenue';
            }
            
        }

}