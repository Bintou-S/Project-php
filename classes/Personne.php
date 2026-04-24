<?php

class Personne {
    private int $id;
    private string $nom;
    private string $email;

    public function __construct(int $id, string $nom, string $email) {
        $this->id    = $id;
        $this->nom   = $nom;
        $this->email = $email;
    }

    // Getters
    public function getId(): int       { return $this->id; }
    public function getNom(): string   { return $this->nom; }
    public function getEmail(): string { return $this->email; }

    // Setters
    public function setId(int $id): void         { $this->id = $id; }
    public function setNom(string $nom): void     { $this->nom = $nom; }
    public function setEmail(string $email): void { $this->email = $email; }

    public function afficherInfos(): string {
        return "ID : {$this->id} | Nom : {$this->nom} | Email : {$this->email}";
    }
}