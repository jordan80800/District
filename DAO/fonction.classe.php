<?php

class Fonction
{
   protected $db ;
public function __construct()
{
    $this->db=ConnexionBase();
}

    public function GetCategoryPop(){
        $requete = $this->db->query("SELECT categorie.id,categorie.libelle,categorie.image, COUNT(id_plat) AS totalcommande
        FROM categorie
        JOIN plat ON categorie.id = plat.id_categorie
        JOIN commande ON plat.id = commande.id_plat
        GROUP BY categorie.libelle
        ORDER BY totalcommande
        LIMIT 6");
        $lesCategories = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $lesCategories ;



    }



public function GetPlatPop(){
    $requete2 = $this->db->query("SELECT p.id, p.libelle,p.image, SUM(c.quantite) AS quantite_totale 
    FROM commande AS c 
    JOIN plat AS p ON c.id_plat = p.id 
    JOIN categorie AS cat ON p.id_categorie = cat.id
     WHERE c.etat = 'livrée' OR c.etat = 'En préparation' OR c.etat = 'En cours de livraison' AND p.active = 'yes' AND cat.active = 'yes' 
    GROUP BY p.id, p.libelle 
     ORDER BY quantite_totale DESC LIMIT 3 ;");
    $lesplats = $requete2->fetchAll(PDO::FETCH_ASSOC);
return $lesplats;


        
    }



}