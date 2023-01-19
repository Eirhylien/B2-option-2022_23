<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: http://mydi.eind.fr/php/pages/index.php');
      
    exit();

?>