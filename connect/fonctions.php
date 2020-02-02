<?php

// Connection à la base de données
function connect(){
    require("config.php");
    try
    {
        $bdd = new PDO ('mysql:host=' . HOST .':3308;dbname=' . DATABASE . ';charset=utf8', USER, USERPWD);
        return $bdd;
    }
    catch (Exception $e)
    {
        die ("Erreur:".$e->getmessage());
    }
}


// Vérifie les variables && protège des injections XSS
function verifVariable($val) {
    if (isset($val) && !empty($val)) {
        return htmlspecialchars(trim($val));
    } else {
        echo "La variable est nulle ou vide !";
    }
}

