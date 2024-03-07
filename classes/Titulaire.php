<?php

class Titulaire {

    private int $idTitulaire;
    private string $nom;
    private string $prenom;
    private DateTime $birthdate;
    private string $ville;
    private array $comptesBancaires;

    private static $nbTitulaires = 0;

    public function __construct(
        int $idTitulaire,
        string $nom,
        string $prenom,
        string $birthdate,
        string $ville
    ) {
        self::$nbTitulaires++;
        $this->idTitulaire = self::$nbTitulaires;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->birthdate = new Datetime($birthdate);
        $this->ville = $ville;
        $this->comptesBancaires = [];
    }

    //===================== ID Titulaire =====================// 
    
    
    public function getIdTitulaire() : int
    {
        return $this->idTitulaire;
    }
    
    public function setIdTitulaire(int $idTitulaire)
    {
        $this->idTitulaire = $idTitulaire;
        
        return $this;
    }
    
    //===================== Nom =====================// 
    
    public function getNom() : string
    {
        return $this->nom;
    }
    
    public function setNom(string $nom)
    {
        $this->nom = $nom;
        
        return $this;
    }

    //===================== Prenom =====================// 
    
    public function getPrenom() : string
    {
        return $this->prenom;
    }
    
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
        
        return $this;
    }

    //===================== Birthdate =====================// 
    
    public function getBirthdate() : string
    {
        return $this->birthdate->format("d-m-Y");
    }
    
    public function setBirthdate(string $birthdate)
    {
        $this->birthdate = $birthdate;
        
        return $this;
    }

    //===================== Ville =====================// 
    
    public function getVille() : string
    {
        return $this->ville;
    }
    
    
    public function setVille(string $ville)
    {
        $this->ville = $ville;
        
        return $this;
    }

    //===================== Comptes =====================//

    public function getComptesBancaires() : CompteBancaire
    {
        return $this->comptesBancaires;
    }

    public function setComptesBancaires(CompteBancaire $comptesBancaires)
    {
        $this->comptes = $comptesBancaires;

        return $this;
    }

    public function addCompteBancaire(CompteBancaire $compte)
    {
        $this->comptesBancaires[] = $compte;
    }

    //===================== Infos =====================//

    public function getInfos()
    {
        return $this." (".$this->getBirthdate().") ";
    }

    public function afficherCompte()
    {
        $result = "<span style='color:blue'><h2>Comptes bancaires de $this : </h2></span>";
        foreach($this->comptesBancaires as $compte)
        {
            $result .= "<span style='color:green'>".$compte."</span><br>";
        }

        return $result;
    }

    //===================== toString =====================//

    public function __toString()
    {
        return $this->prenom." ".$this->nom;
    }

}
?>