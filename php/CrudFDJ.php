<?php
require("connection.php");


// $id = id of the fdj
function getFdj(){
    global $pdo;
    $sqlQuery = "SELECT id,nom,`description`,`date`,`img` FROM `fdj`";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $fdjs = $usersStatement->fetchAll();

    return $fdjs;
}

function InsertFdj($nom,$description,$date,$img){
    global $pdo;
    $sqlQuery = "INSERT INTO fdj (nom,`description`,`date`,img) VALUES ('$nom','$description','$date','$img')";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    echo "<script>console.log('good');</script>";
}

function UpdateFdj($id,$nom,$description,$date,$img){
    global $pdo;
    $sqlQuery = "UPDATE fdj SET `nom`=$nom,`description`='$description',`date`='$date',`img`='$img' WHERE fdj.id=$id ";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function DeleteFdj($id){
    global $pdo;
    $sqlQuery = "DELETE FROM `fdj` WHERE fdj.id=$id";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

?>