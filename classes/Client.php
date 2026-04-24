<?php

require_once __DIR__ . '/Utilisateur.php';

class Client extends Utilisateur {
    const TAUX_SIMPLE  = 0.05;
    const TAUX_PREMIUM = 0.15;

    private string $typeClient; // "simple" ou "premium"

    public function __construct(int $id, string $nom, string $email, string $login, string $motDePasse, string $typeClient) {
        parent::__construct($id, $nom, $email, $login, $motDePasse);
        $this->typeClient = $typeClient;
    }

    public function getTypeClient(): string { return $this->typeClient; }

    public function calculerReduction(float $montant): float {
        $taux = ($this->typeClient === 'premium') ? self::TAUX_PREMIUM : self::TAUX_SIMPLE;
        return $montant * $taux;
    }

    public function afficherRole(): string {
        return "Client";
    }

    // Redéfinition avec parent::
    public function afficherInfos(): string {
        return parent::afficherInfos() . " | Type : {$this->typeClient}";
    }

    public function afficher(): string {
        return $this->afficherInfos() . " | Rôle : " . $this->afficherRole();
    }
}