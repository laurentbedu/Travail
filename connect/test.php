<?php

session_start();

$_SESSION['prenom'] = 'Jean';

echo "La variable stocke la session " . $_SESSION['prenom'];

?>
<a href="test2.php">Page suivante</a>
