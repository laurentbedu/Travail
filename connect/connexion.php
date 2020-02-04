<?php
session_start();

    ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <title>Connexion</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
    </head>
    <body class="bg-dark">
    <?php include("headerAdmin.php"); ?>

    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center text-warning">CONNEXION</h2>
        </div>
        <hr>
        <div class="row border p-5 rounded-lg bg-light">
            <?php
            /////////////////////////////////////////////////////
            // Vérification si l'utilisateur est déjà connecté //
            ////////////////////////////////////////////////////
            if(!isset($_SESSION["connect"])) {
                ?>
                <form class="border w-75 mx-auto p-5 bg-white shadow-lg" method="post" action="traitementConnexion.php">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="emailUser"
                               placeholder="Saisir votre email" required>
                    </div>
                    <div class="form-group">
                        <label for="passe">Mot de passe</label>
                        <input type="password" class="form-control" id="passe" name="passe" placeholder="Mot de passe"
                               required>
                    </div>

                    <button type="submit" class="btn btn-success">Valider</button>
                    <small><a href="inscription.php">Pas encore inscrit ?</a></small>
                </form>
                <?php
            } else {
                echo "Vous êtes déjà connecté.";
            }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </body>
    </html>
