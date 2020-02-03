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
$base = connect();