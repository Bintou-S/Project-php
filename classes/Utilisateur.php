<?php

require_once __DIR__ . '/../interfaces/Authentifiable.php';
require_once __DIR__ . '/../interfaces/Affichable.php';
require_once __DIR__ . '/Personne.php';

abstract class Utilisateur extends Personne implements Authentifiable, Affichable {
    protected string $login;
    protected string $motDePasse;

    private static int $nombreUtilisateurs = 0;

    public function __construct(int $id, string $nom, string $email, string $login, string $motDePasse) {
        parent::__construct($id, $nom, $email);
        $this->login      = $login;
        $this->motDePasse = $motDePasse;
        self::$nombreUtilisateurs++;
    }

    public function seConnecter(): string {
        return "✅ {$this->getNom()} s'est connecté avec le login : {$this->login}";
    }

    public static function afficherNombre(): string {
        return "Nombre total d'utilisateurs : " . self::$nombreUtilisateurs;
    }

    // Méthode abstraite — chaque classe fille doit l'implémenter
    abstract public function afficherRole(): string;

    public function afficher(): string {
        return $this->afficherInfos() . " | Rôle : " . $this->afficherRole();
    }
}