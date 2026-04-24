<?php

require_once __DIR__ . '/../interfaces/Authentifiable.php';
require_once __DIR__ . '/../interfaces/Affichable.php';
require_once __DIR__ . '/Personne.php';

abstract class Utilisateur extends Personne implements Authentifiable, Affichable {
    protected $login;
    protected $motDePasse;

    protected static $nombreUtilisateurs = 0;

    public function __construct($id, $nom, $email, $login, $motDePasse) {
        parent::__construct($id, $nom, $email);
        $this->login = $login;
        $this->motDePasse = $motDePasse;
        self::$nombreUtilisateurs++;
    }

    public function seConnecter() {
        return $this->getNom() . " s'est connecté";
    }

    public static function afficherNombre() {
        return self::$nombreUtilisateurs;
    }

    abstract public function afficherRole();

    public function afficher() {
        return $this->afficherInfos() . " | Role: " . $this->afficherRole();
    }
}