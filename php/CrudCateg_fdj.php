<?php
require("connection.php");
require("CrudFDJ.php");
require("CrudCategorie.php");


// $idFdj = id of the fdj
// $idCateg = id of the categ
function getCategRelation(){
    global $pdo;
    $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj`";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $ListeRelation = $usersStatement->fetchAll();

    return $ListeRelation;
}

function getCategRelationByFDJId($idFdj){
    global $pdo;
    $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj` WHERE categ_fdj.id_fdj=$idFdj";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $Relation = $usersStatement->fetchAll();

    return $Relation;
}

function getCategRelationByCategId($idCateg){
    global $pdo;
    $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj` WHERE categ_fdj.id_categ=$idCateg";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $Relation = $usersStatement->fetchAll();

    return $Relation;
}

function insertRelation($idCateg,$idFDJ){
    global $pdo;
    $sqlQuery = "INSERT INTO `categ_fdj` (id_categ,id_fdj) VALUES ('$idCateg','$idFDJ')";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    echo "<script>console.log('good');</script>";
}

function updateRelationByRelationID($id,$idCateg,$idFDJ){
    global $pdo;
    $sqlQuery = "UPDATE categ_fdj SET `id_categ`='$idCateg',`id_fdj`='$idFDJ' WHERE categ_fdj.id=$id";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function updateRelationByCategorieID($id,$idCateg,$idFDJ){
    global $pdo;
    $sqlQuery = "UPDATE categ_fdj SET `id_fdj`='$idFDJ' WHERE categ_fdj.id=$id AND categ_fdj.id_categ=$idCateg";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function updateRelationByFDJID($id,$idCateg,$idFDJ){
    global $pdo;
    $sqlQuery = "UPDATE categ_fdj SET `id_categ`='$idCateg' WHERE categ_fdj.id=$id AND categ_fdj.id_fdj=$idFDJ";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function deleteRelationByRelationID($id){
    global $pdo;
    $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id=$id";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function deleteRelationByCategorieID($idCateg){
    global $pdo;
    $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id_categ=$idCateg";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function deleteRelationByFDJID($idFDJ){
    global $pdo;
    $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id_categ=$idFDJ";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

?>