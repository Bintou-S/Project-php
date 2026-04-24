<?php

require_once __DIR__ . '/Utilisateur.php';

class Administrateur extends Utilisateur {

    public function supprimerUtilisateur(Utilisateur $u) {
        return "Admin a supprimé : " . $u->getNom();
    }

    public function afficherRole() {
        return "Administrateur";
    }
}