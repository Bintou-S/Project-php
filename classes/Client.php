<?php

require_once __DIR__ . '/Utilisateur.php';

class Client extends Utilisateur {
    const TAUX_SIMPLE = 0.05;
    const TAUX_PREMIUM = 0.15;

    private $typeClient;

    public function __construct($id, $nom, $email, $login, $motDePasse, $typeClient) {
        parent::__construct($id, $nom, $email, $login, $motDePasse);
        $this->typeClient = $typeClient;
    }

    public function calculerReduction($montant) {
        if ($this->typeClient == "premium") {
            return $montant * self::TAUX_PREMIUM;
        }
        return $montant * self::TAUX_SIMPLE;
    }

    public function afficherRole() {
        return "Client";
    }

    public function afficherInfos() {
        return parent::afficherInfos() . " | Type: " . $this->typeClient;
    }
}