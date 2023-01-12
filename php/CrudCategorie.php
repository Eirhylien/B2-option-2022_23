<?php
require("connection.php");
require("CrudCateg_fdj.php");


//here, $user = id of the user
// $id = id of the adherent
function getCategorie(){
    global $pdo;
    $sqlQuery = "SELECT nom,id FROM `categorie`";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $ListeCategorie = $usersStatement->fetchAll();

    return $ListeCategorie;
}

function getCategorieByName($nom){
    global $pdo;
    $sqlQuery = "SELECT nom,id FROM `categorie` WHERE categorie.nom=$nom";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $Categorie = $usersStatement->fetchAll();

    return $Categorie;
}

function getCategorieByID($id){
    global $pdo;
    $sqlQuery = "SELECT nom,id FROM `categorie` WHERE categorie.id=$id";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $Categorie = $usersStatement->fetchAll();

    return $Categorie;
}

function insertCategorie($nom){
    global $pdo;
    $sqlQuery = "INSERT INTO `categorie` (nom) VALUES ('$nom')";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    echo "<script>console.log('good');</script>";
}

function updateCategorie($id,$nom){
    global $pdo;
    $sqlQuery = "UPDATE `categorie` SET `nom`='$nom' WHERE categorie.id=$id";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function deleteCategorie($id){
    global $pdo;
    $sqlQuery = "DELETE FROM `categorie` WHERE categorie.id=$id";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

?>