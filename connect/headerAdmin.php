<header class="container border rounded-lg shadow-lg bg-warning mb-5">
    <div class="row justify-content-center">
        <h1>ESPACE PRODUITS</h1>
    </div>
    <nav class="row justify-content-center">
        <ul class="nav mb-5">
            <li class="nav-item">
                <a class="nav-link btn btn-success m-2 shadow-lg" href="index.php">Accueil</a>
            </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-success m-2 shadow-lg" href="connexion.php">Connexion</a>
                </li>


            <li class="nav-item">
                <a class="nav-link btn btn-success m-2 shadow-lg" href="inscription.php">Inscription</a>
            </li>
            <?php

            if (isset($_SESSION["typeUtilisateur"]) && $_SESSION["typeUtilisateur"] == 1) {
                ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-success m-2 shadow-lg" href="creer.php">Créer</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item">
                <a class="nav-link btn btn-success m-2 shadow-lg" href="espaceProduit.php">Liste des produits</a>
            </li>
            <?php
            if(isset($_SESSION["connect"]) && $_SESSION["connect"] == 1) {
                ?>

            <li class="nav-item">
                <a class="nav-link btn btn-success m-2 shadow-lg" href="deconnexion.php">Se déconnecter</a>
            </li>

                <li class="nav-item">
                    Connecté en tant que <?= $_SESSION['prenom']; ?>
                </li>
                <?php
            }
            ?>
        </ul>
    </nav>
</header>