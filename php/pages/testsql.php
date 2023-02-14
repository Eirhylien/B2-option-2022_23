<?php


function connexion($servername, $username, $password, $dbname) {
    try {
        $db = new PDO('mysql:host='. $servername .';dbname='. $dbname .';', $username, $password);
        return $db;
    } catch (PDOException $e) {
        print ("Erreur: " . $e->getMessage() . "<br/>");
        die;
    }
}



try {
    
$connexiondb = connexion("db5011603677.hosting-data.io:3306", "dbu913389", "NsU2iLPyJ5kRM4h", "dbs9782335");



$sqlRequete = "select * from user
";

$requete = $connexiondb->prepare($sqlRequete);
$requete->execute();
$resultDB = $requete->fetchAll();

} catch(PDOException $e) {
    echo $sqlRequete . "<br>" . $e->getMessage();
  }


function debug_to_console($data) {
    $output = $data;
    /*if (is_array($output))
        $output = implode(',', $output);*/

    echo "<script>console.log('" .print_r($output,true). "' );</script>";
}

foreach ($resultDB as $key => $value) {
    
    print_r($key);
    print_r($value);
}


?>