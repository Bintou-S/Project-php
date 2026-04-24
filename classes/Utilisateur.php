<?php

$base = dirname(__FILE__) . DIRECTORY_SEPARATOR;

require_once $base . '..' . DIRECTORY_SEPARATOR . 'interfaces' . DIRECTORY_SEPARATOR . 'Authentifiable.php';
require_once $base . '..' . DIRECTORY_SEPARATOR . 'interfaces' . DIRECTORY_SEPARATOR . 'Affichable.php';
require_once $base . 'Personne.php';

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
        return "✅ " . $this->getNom() . " s'est connecté avec le login : " . $this->login;
    }

    public static function afficherNombre(): string {
        return "Nombre total d'utilisateurs : " . self::$nombreUtilisateurs;
    }

    abstract public function afficherRole(): string;

    public function afficher(): string {
        return $this->afficherInfos() . " | Rôle : " . $this->afficherRole();
    }
}