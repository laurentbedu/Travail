<?php
session_start();

require("connexionBDD.php");
require("fonctions.php");

$emailUser = verifVariable($_POST['emailUser']);
$passe = verifVariable($_POST['passe']);

$sql = "SELECT prenom, email, motDePasse, typeUtilisateur FROM Utilisateur WHERE email=:mail";

$sqlExiste = "SELECT COUNT(email) AS Existe FROM Utilisateur WHERE email=:mail";

$req2 = $base->prepare($sqlExiste);
$req2->bindValue(":mail", $emailUser);
$req2->execute();

$emailExiste = $req2->fetch();

// Test si l'email existe déjà dans la base de données
if($emailExiste['Existe'] == 1) {

    $req = $base->prepare($sql);
    $req->bindValue(":mail", $emailUser);
    $req->execute();

    $data = $req->fetchObject();

    // On vérifie le mot de passe, si ok on créé les sessions
    if (password_verify($passe, $data->motDePasse)) {
        $_SESSION["connect"] = 1;
        $_SESSION["prenom"] = $data->prenom;
        $_SESSION["typeUtilisateur"] = $data->typeUtilisateur;
        
        header("location: index.php");
    } else {
        echo "email ou mot de passe incorrect, veuillez recommencer";
        ?>
        <a href="index.php">Retourner à l'accueil</a>
        <?php
    }
} else {
    echo "Votre email n'est pas enregistré dans notre base de données. Veuillez vous inscrire.<br>";
    ?>
    <a href="index.php">Retourner à l'accueil</a>
    <?php
}
?>

