<?php

require_once __DIR__ . '/classes/Client.php';
require_once __DIR__ . '/classes/Employe.php';
require_once __DIR__ . '/classes/Administrateur.php';

// ── Fonction polymorphisme ──
function afficherUtilisateur(Affichable $u): string {
    return $u->afficher();
}

// ── Création des objets ──
$client = new Client(1, "Aminata Diallo",  "aminata@mail.com", "aminata",  "pass123", "premium");
$employe = new Employe(2, "Moussa Ndiaye", "moussa@mail.com",  "moussa",   "pass456", 350000);
$admin   = new Administrateur(3, "Fatou Sow", "fatou@mail.com","fatou",    "pass789");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs — POO PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1>Gestion des <span>Utilisateurs</span></h1>
    <span class="badge-php">POO · PHP 8</span>
</header>

<main>

    <!-- Stat bar -->
    <div class="stat-bar">
        <div class="dot"></div>
        <span><?= Utilisateur::afficherNombre() ?></span>
    </div>

    <!-- PARTIE 1–3 : Cartes utilisateurs -->
    <div class="section-title">Utilisateurs créés</div>
    <div class="grid">

        <!-- Client -->
        <div class="card client">
            <div class="card-header">
                <span class="card-name"><?= $client->getNom() ?></span>
                <span class="role-badge"><?= $client->afficherRole() ?></span>
            </div>
            <div class="card-info">
                ID &nbsp;&nbsp;&nbsp;: <span><?= $client->getId() ?></span><br>
                Email : <span><?= $client->getEmail() ?></span><br>
                Type &nbsp;: <span><?= $client->getTypeClient() ?></span>
            </div>
        </div>

        <!-- Employé -->
        <div class="card employe">
            <div class="card-header">
                <span class="card-name"><?= $employe->getNom() ?></span>
                <span class="role-badge"><?= $employe->afficherRole() ?></span>
            </div>
            <div class="card-info">
                ID &nbsp;&nbsp;&nbsp;: <span><?= $employe->getId() ?></span><br>
                Email : <span><?= $employe->getEmail() ?></span><br>
                Salaire : <span><?= number_format($employe->getSalaire(), 0, ',', ' ') ?> FCFA / mois</span>
            </div>
        </div>

        <!-- Admin -->
        <div class="card admin">
            <div class="card-header">
                <span class="card-name"><?= $admin->getNom() ?></span>
                <span class="role-badge"><?= $admin->afficherRole() ?></span>
            </div>
            <div class="card-info">
                ID &nbsp;&nbsp;&nbsp;: <span><?= $admin->getId() ?></span><br>
                Email : <span><?= $admin->getEmail() ?></span><br>
                Droits : <span>Accès total</span>
            </div>
        </div>

    </div>

    <!-- RÉSULTATS DES MÉTHODES -->
    <div class="section-title">Tests des méthodes</div>
    <div class="results-grid">

        <!-- afficherInfos -->
        <div class="result-block">
            <h3>afficherInfos()</h3>
            <div class="result-line info"><?= $client->afficherInfos() ?></div>
            <div class="result-line info"><?= $employe->afficherInfos() ?></div>
            <div class="result-line info"><?= $admin->afficherInfos() ?></div>
        </div>

        <!-- seConnecter -->
        <div class="result-block">
            <h3>seConnecter()</h3>
            <div class="result-line success"><?= $client->seConnecter() ?></div>
            <div class="result-line success"><?= $employe->seConnecter() ?></div>
            <div class="result-line success"><?= $admin->seConnecter() ?></div>
        </div>

        <!-- Réductions (constantes) -->
        <div class="result-block">
            <h3>calculerReduction() — Constantes</h3>
            <?php
                $montant = 100000;
                $reduc   = $client->calculerReduction($montant);
            ?>
            <div class="result-line warning">
                Montant : <?= number_format($montant, 0, ',', ' ') ?> FCFA<br>
                Taux (<?= $client->getTypeClient() ?>) : <?= $client->getTypeClient() === 'premium' ? Client::TAUX_PREMIUM * 100 : Client::TAUX_SIMPLE * 100 ?>%<br>
                Réduction : <?= number_format($reduc, 0, ',', ' ') ?> FCFA
            </div>
        </div>

        <!-- Salaire annuel -->
        <div class="result-block">
            <h3>calculerSalaireAnnuel()</h3>
            <div class="result-line warning">
                Salaire mensuel : <?= number_format($employe->getSalaire(), 0, ',', ' ') ?> FCFA<br>
                Salaire annuel &nbsp;: <?= number_format($employe->calculerSalaireAnnuel(), 0, ',', ' ') ?> FCFA
            </div>
        </div>

        <!-- Suppression -->
        <div class="result-block">
            <h3>supprimerUtilisateur()</h3>
            <div class="result-line danger"><?= $admin->supprimerUtilisateur($client) ?></div>
        </div>

        <!-- Statique -->
        <div class="result-block">
            <h3>Attribut statique</h3>
            <div class="result-line info"><?= Utilisateur::afficherNombre() ?></div>
        </div>

    </div>

    <!-- POLYMORPHISME -->
    <div class="section-title">Polymorphisme — afficherUtilisateur(Affichable $u)</div>
    <table class="poly-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Objet passé</th>
                <th>Résultat de afficher()</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $utilisateurs = [$client, $employe, $admin];
            foreach ($utilisateurs as $i => $u):
            ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= get_class($u) ?></td>
                <td><?= afficherUtilisateur($u) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<footer>
    TP POO PHP · Gestion des Utilisateurs · Tous les concepts implémentés ✓
</footer>

</body>
</html>