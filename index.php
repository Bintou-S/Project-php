<?php

require_once "classes/Client.php";
require_once "classes/Employe.php";
require_once "classes/Administrateur.php";

function afficherUtilisateur(Affichable $u) {
    return $u->afficher();
}

// Création des objets
$client = new Client(1, "Amina Sarr", "amina@mail.com", "aminata", "123", "premium");
$employe = new Employe(2, "Mohamed Ndiaye", "mndy1@mail.com", "mohamed", "456", 500000);
$admin = new Administrateur(3, "Fatou Bintou", "fabi.s@mail.com", "bintou", "789");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <h1>Gestion des utilisateurs</h1>
</header>

<main>

<!-- UTILISATEURS -->
<div class="section">
    <h2>Utilisateurs créés</h2>

    <div class="grid">

        <div class="card client">
            <h3><?php echo $client->getNom(); ?></h3>
            <p><?php echo $client->afficherInfos(); ?></p>
            <span>Rôle : <?php echo $client->afficherRole(); ?></span>
        </div>

        <div class="card employe">
            <h3><?php echo $employe->getNom(); ?></h3>
            <p><?php echo $employe->afficherInfos(); ?></p>
            <span>Rôle : <?php echo $employe->afficherRole(); ?></span>
        </div>

        <div class="card admin">
            <h3><?php echo $admin->getNom(); ?></h3>
            <p><?php echo $admin->afficherInfos(); ?></p>
            <span>Rôle : <?php echo $admin->afficherRole(); ?></span>
        </div>

    </div>
</div>

<!-- CONNEXION -->
<div class="section">
    <h2>Connexion</h2>

    <div class="result"><?php echo $client->seConnecter(); ?></div>
    <div class="result"><?php echo $employe->seConnecter(); ?></div>
    <div class="result"><?php echo $admin->seConnecter(); ?></div>
</div>

<!-- REDUCTION -->
<div class="section">
    <h2>Réduction (constantes)</h2>

    <?php $montant = 100000; ?>

    <div class="result">
        Montant : <?php echo $montant; ?> FCFA <br>
        Réduction : <?php echo $client->calculerReduction($montant); ?> FCFA
    </div>
</div>

<!-- SALAIRE -->
<div class="section">
    <h2>Salaire annuel</h2>

    <div class="result">
        <?php echo $employe->calculerSalaireAnnuel(); ?> FCFA
    </div>
</div>

<!-- SUPPRESSION -->
<div class="section">
    <h2>Suppression utilisateur</h2>

    <div class="result">
        <?php echo $admin->supprimerUtilisateur($client); ?>
    </div>
</div>

<!-- STATIQUE -->
<div class="section">
    <h2>Utilisateurs total</h2>

    <div class="result">
        <?php echo Utilisateur::afficherNombre(); ?>
    </div>
</div>

<!-- POLYMORPHISME -->
<div class="section">
    <h2>Polymorphisme</h2>

    <?php
    $users = [$client, $employe, $admin];

    foreach ($users as $u) {
        echo "<div class='result'>" . afficherUtilisateur($u) . "</div>";
    }
    ?>

</div>

</main>

</body>
</html>