<?php
class Commande
{

    private $id;
    private $id_plat;
    private $quantite;
    private $total;
    private $date_commande;
    private $etat;
    private $nom_client;
    private $telephone_client;
    private $email_client;
    private $adresse_client;
    


    public function __construct($id,$id_plat,$quantite,$total,$date_commande,$etat,$nom_client,$telephone_client,$email_client,$adresse_client)
    {
        $this->id = $id;
        $this->id_plat = $id_plat;
        $this->quantite = $quantite;
        $this->total = $total;
        $this->date_commande = $date_commande;
        $this->etat = $etat;
        $this->nom_client = $nom_client;
        $this->telephone_client = $telephone_client;
        $this->email_client = $email_client;
        $this->adresse_client = $adresse_client;


    }


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getId_plat()
    {
        return $this->id_plat;
    }
    public function setId_plat($id_plat)
    {
        return $this->id_plat = $id_plat;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }
    public function setQuantite($quantite)
    {
        return $this->quantite = $quantite;
    }


    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal($total)
    {
        return $this->total = $total;
    }

    
    public function getDate_commande()
    {
        return $this->date_commande;
    }
    public function setDate_commande($date_commande)
    {
        return $this->date_commande = $date_commande;
    }

    public function getEtat()
    {
        return $this->etat;
    }
    public function setEtat($etat)
    {
        return $this->etat = $etat;
    }


    public function getNom_client()
    {
        return $this->nom_client;
    }
    public function setnNom_client($nom_client)
    {
        return $this->nom_client = $nom_client;
    }

    public function getTelephone_client()
    {
        return $this->telephone_client;
    }
    public function setnTelephone_client($telephone_client)
    {
        return $this->telephone_client = $telephone_client;
    }


    public function getEmail_client()
    {
        return $this->email_client;
    }
    public function setEmail_client($email_client)
    {
        return $this->email_client = $email_client;
    }

    public function getAdresse_client()
    {
        return $this->adresse_client;
    }
    public function setAdresse_client($adresse_client)
    {
        return $this->adresse_client = $adresse_client;
    }

}
