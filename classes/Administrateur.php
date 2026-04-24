<?php

require_once __DIR__ . '/Utilisateur.php';

class Administrateur extends Utilisateur {
    public function __construct(int $id, string $nom, string $email, string $login, string $motDePasse) {
        parent::__construct($id, $nom, $email, $login, $motDePasse);
    }

    public function supprimerUtilisateur(Utilisateur $u): string {
        return "🗑️ Administrateur {$this->getNom()} a supprimé l'utilisateur : {$u->getNom()}";
    }

    public function afficherRole(): string {
        return "Administrateur";
    }
}