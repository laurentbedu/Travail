<?php
require("config.php");

function connect(){
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

$sql = "SELECT * FROM Products ORDER BY id";
$req = $base->prepare($sql);
$req->execute();


?>
<!doctype html>
<html lang="fr">
<head>
    <title>Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
<h1 class="text-center">LISTE DES PRODUITS</h1>

    </div>
    <hr>
    <div class="row">
<table class="table table-dark W-75">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">photo</th>
        <th scope="col">ACTION</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while($data = $req->fetchObject()) {
        ?>

        <tr>
            <th scope="row"><?= $data->id ?></th>
            <td><?= $data->name ?></td>
            <td><?= $data->description ?></td>
            <td><?= $data->image ?></td>
            <td>
                <div class="row">
                    <div class="col">
                        <button type="button shadow-lg" class="btn btn-primary">Voir</button>
                    </div>
                    <div class="col">
                        <button type="button shadow-lg" class="btn btn-success">Modifier</button>
                    </div>
                    <div class="col">
                        <button type="button shadow-lg" class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
