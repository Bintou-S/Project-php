<?php

require_once __DIR__ . '/Utilisateur.php';

class Employe extends Utilisateur {
    private float $salaire;

    public function __construct(int $id, string $nom, string $email, string $login, string $motDePasse, float $salaire) {
        parent::__construct($id, $nom, $email, $login, $motDePasse);
        $this->salaire = $salaire;
    }

    public function getSalaire(): float { return $this->salaire; }

    public function calculerSalaireAnnuel(): float {
        return $this->salaire * 12;
    }

    public function afficherRole(): string {
        return "Employé";
    }
}