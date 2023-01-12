<?php
require("connection.php");
require("CrudFDJ.php");

//here, $user = id of the user
// $id = id of the game
function GetJeuxByUser($user){
    global $pdo;
    $sqlQuery = "SELECT id,dispo,etat,remarque FROM `jeux`,`user` WHERE user.id=$user";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    $jeux = $usersStatement->fetchAll();

    return $jeux;
}

function InsertJeux($user,$nom,$etat,$dispo,$remarque){
    global $pdo;
    $ListeFDJs = getFdj();
    foreach ($ListeFDJs as $ListeFDJ) {
        if ($ListeFDJ['nom']==$nom){
            $fdjId=$ListeFDJ['id'];
        }
    }
    $sqlQuery = "INSERT INTO jeux (fdj_id,user_id,dispo,etat,remarque) VALUES ('$fdjId','$user',$dispo,'$etat','$remarque')";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
    echo "<script>console.log('good');</script>";
}

function UpdateJeux($id,$dispo,$etat,$remarque){
    global $pdo;
    $sqlQuery = "UPDATE jeux SET `dispo`=$dispo,`etat`='$etat',`remarque`=$remarque WHERE jeux.id=$id ";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

function DeleteUser($id){
    global $pdo;
    $sqlQuery = "DELETE FROM `jeux` WHERE jeux.id=$id";
    echo "<script>console.log('".$sqlQuery."');</script>";
    $usersStatement = $pdo->prepare($sqlQuery);
    $usersStatement->execute();
}

?>