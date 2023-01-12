<?php
require("connection.php");

function test(){
    global $test;
    return $test;
}
function GetUsers(){
    global $pdo;
    $sqlQuery = "SELECT * FROM `user`";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $users = $usersStatement->fetchAll();

    return $users;
}

function InsertUser($user){
    global $pdo;
    $sqlQuery = "INSERT INTO user (email,nom,prenom,username,mdp,etablissement) VALUES ('$user->email','$user->nom','$user->prenom','$user->username','$user->mdp',$user->etablissement)";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    echo "<script>console.log('good');</script>";
}

function UpdateUser($id,$user){
    global $pdo;
    $sqlQuery = "UPDATE user SET `email`='$user->email',`nom`='$user->nom',`prenom`='$user->prenom',`username`='$user->username',`mdp`='$user->mdp',`etablissement`=$user->etablissement WHERE user.id=$id ";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function DeleteUser($id){
    global $pdo;
    $sqlQuery = "DELETE FROM `user` WHERE user.id=$id";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}



?>