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

if($emailExiste['Existe'] == 1) {

    $req = $base->prepare($sql);
    $req->bindValue(":mail", $emailUser);
    $req->execute();

    $data = $req->fetchObject();

    if (password_verify($passe, $data->motDePasse)) {
        $_SESSION["connect"] = 1;
        $_SESSION["prenom"] = $data->prenom;
        $_SESSION["typeUtilisateur"] = $data->typeUtilisateur;
        if ($data->typeUtilisateur == 1) {
            echo "Bienvenue grand maître suprême " . $_SESSION['prenom'] . "<br>";
        } else {
            echo "Vous êtes connecté " . $_SESSION["prenom"] . " et votre type d'utilisateur est " . $_SESSION["typeUtilisateur"] . "<br>";
        }
        ?>
        <a href="espaceProduit.php">Aller à la liste des produits</a>
        <?php
    } else {
        echo "email ou mot de passe incorrect, veuillez recommencer";
        ?>
        <a href="index.php">Retourner à l'accueil</a>
        <?php
    }
} else {
    echo "Votre email n'est pas dans notre base de données.";
    ?>
    <a href="index.php">Retourner à l'accueil</a>
    <?php
}
?>

