<?php
    session_start();
    require_once("../class/db.php");
    require_once("../class/User.php");
    $db = new Database();
    $user = new User(1,"test","test","test",$_POST["email"],$_POST["mdp"],false);
 
    $verif=$db->IsExistEmail($user);
    
    if($verif==false){
        echo "Mot de passe ou identifiant invalide";
    }
    else{
        $verif2=$db->getMdpByEmail($user);
        
        if($verif2->mdp == $_POST["mdp"]){
            $_SESSION['username'] = $verif2->username;
            $_SESSION['nom'] = $verif2->nom;
            $_SESSION['prenom'] = $verif2->prenom;
            $_SESSION['mail'] = $verif2->mail;
          
            header('Location: http://mydi.eind.fr/php/pages/index.php');
      
            exit();
        }
        else{
            echo "Mot de passe ou identifiant invalide";
        }
    }
?>