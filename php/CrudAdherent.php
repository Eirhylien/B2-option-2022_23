<?php
require("connection.php");


//here, $user = id of the user
// $id = id of the adherent
function getListeAdherentByUser($user){
    global $pdo;
    $sqlQuery = "SELECT nom,premon,mail,tel FROM `adherent`,`user` WHERE user.id=$user";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $ListeAdherent = $usersStatement->fetchAll();

    return $ListeAdherent;
}

function getAdherentByName($id){
    global $pdo;
    $sqlQuery = "SELECT nom,premon,mail,tel FROM `adherent` WHERE adherent.id=$id";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $Adherent = $usersStatement->fetchAll();

    return $Adherent;
}

function insertAdherent($user,$nom,$prenom,$mail,$tel){
    global $pdo;
    $sqlQuery = "INSERT INTO `adherent` (user_id,nom,prenom,mail,tel) VALUES ('$user','$nom','$prenom','$mail','$tel')";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    echo "<script>console.log('good');</script>";
}

function updateAdherent($user,$id,$nom,$prenom,$mail,$tel){
    global $pdo;
    $sqlQuery = "UPDATE adherent SET `nom`='$nom',`etat`='$prenom',`mail`='$mail',`tel`='$tel'  WHERE adherent.id=$id AND adherent.user_id=$user ";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function deleteAdherent($id){
    global $pdo;
    $sqlQuery = "DELETE FROM `adherent` WHERE adherent.id=$id";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

?>