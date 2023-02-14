<?php


function connexion($servername, $username, $password, $dbname) {
    try {
        $db = new PDO('mysql:host='. $servername .';dbname='. $dbname .';', $username, $password);
        return $db;
    } catch (PDOException $e) {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die;
    }
}





$connexiondb = connexion("db5011603677.hosting-data.io:3306", "dbu913389", "NsU2iLPyJ5kRM4h", "dbs9782335");



$sqlRequete = "
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(25) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `mdp` varchar(15) NOT NULL,
  `etablissement` tinyint(1) NOT NULL,
  `role` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
";

$requête = $connexiondb->prepare($sqlRequete);
$requête->execute();
$resultDB = $requête->fetchAll();


function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

debug_to_console($resultDB);

?>