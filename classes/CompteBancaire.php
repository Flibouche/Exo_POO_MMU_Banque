<?php

class CompteBancaire {

    private Titulaire $titulaire;
    private int $idBankAccount;
    private string $libelle;
    private float $soldeInitial;
    private string $deviseMonetaire;

    private static $nbComptes = 0;

    public function __construct(
        Titulaire $titulaire,
        string $libelle,
        float $soldeInitial,
        string $deviseMonetaire
    ) {
        $this->titulaire = $titulaire;
        self::$nbComptes++;
        $this->idBankAccount = self::$nbComptes;
        $this->libelle = $libelle;
        $this->soldeInitial = $soldeInitial;
        $this->deviseMonetaire = $deviseMonetaire;
        $this->titulaire->addCompteBancaire($this);
    }

    //===================== Titulaire =====================// 
    
    public function getTitulaire() : Titulaire
    {
        return $this->titulaire;
    }

    public function setTitulaire(Titulaire $titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    //===================== ID Bank Account =====================// 
    
    public function getIdBankAccount() : int
    {
        return $this->idBankAccount;
    }
    
    public function setIdBankAccount(int $idBankAccount)
    {
        $this->idBankAccount = $idBankAccount;
        
        return $this;
    }

    //===================== Libellé =====================// 
    
    public function getLibelle() : string
    {
        return $this->libelle;
    }
    
    public function setLibelle(string $libelle) 
    {
        $this->libelle = $libelle;
        
        return $this;
    }

    //===================== Solde Initial =====================// 
    
    public function getSoldeInitial() : float
    {
        $round = number_format($this->soldeInitial, 2, ","," ");
        return $this->soldeInitial;
    }
    
    public function setSoldeInitial(float $soldeInitial)
    {
        $this->soldeInitial = $soldeInitial;
        
        return $this;
    }

    //===================== Devise Monetaire =====================// 

    public function getDeviseMonetaire() : string
    {
        return $this->deviseMonetaire;
    }

    public function setDeviseMonetaire(string $deviseMonetaire)
    {
        $this->deviseMonetaire = $deviseMonetaire;

        return $this;
    }

    //===================== Crédit/Débit/Virement =====================//

    public function crediter(float $credit)
    {
        $this->soldeInitial += $credit;
        return "
        --------------------------------------------------<br>
        Le compte ($this->idBankAccount) '$this->libelle' a été crédité de $credit € <br>
        --------------------------------------------------<br><br>";
    }

    public function debiter(float $credit)
    {
        $this->soldeInitial -= $credit;
        echo "
        --------------------------------------------------<br>
        Le compte ($this->idBankAccount) '$this->libelle' a été débité de $credit € <br>
        --------------------------------------------------<br><br>";
    }

    public function accountToDebit(float $credit)
    {
        $this->soldeInitial -= $credit;  
    }

    public function accountToCredit(float $credit)
    {
        $this->soldeInitial += $credit;
    }

    public function virement(CompteBancaire $credit)
    {
        $result = "";
            $result .= toCredit($credit);
            $result .= toReceive($credit);
        return $result;
    }

    //===================== getInfos() =====================//

    public function getInfos()
    {
        return "<b><u>Libellé du compte</u></b> : $this->libelle ($this->idBankAccount)<br>
        <b><u>Titulaire du compte</u></b> : $this->titulaire<br>
        <b><u>Solde actuel</u></b> : $this->soldeInitial €<br><br>";
    }

    //===================== toString =====================//
    
    public function __toString()
    {
        return "<b><u>Compte ($this->idBankAccount)</u></b> : $this->libelle<br>
        <b><u>Solde du compte</u></b> : $this->soldeInitial € ($this->deviseMonetaire)<br>";
    }

}
?>