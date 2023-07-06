<?php

class Fonction
{
    protected $db;
    public function __construct()
    {
        $this->db = ConnexionBase();
    }

    public function GetCategoryPop()
    {
        $requete = $this->db->query("SELECT categorie.id,categorie.libelle,categorie.image, COUNT(id_plat) AS totalcommande
        FROM categorie
        JOIN plat ON categorie.id = plat.id_categorie
        JOIN commande ON plat.id = commande.id_plat
        GROUP BY categorie.libelle
        ORDER BY totalcommande
        LIMIT 6");
        $lesCategories = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $lesCategories;
    }



    public function GetPlatPop()
    {
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

    public function GetAllCategories()
    {
        $catparpage = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $catparpage;
        $requete = $this->db->prepare("SELECT categorie.id, categorie.image, categorie.libelle,categorie.active
FROM categorie
where active = 'yes'
LIMIT :offset, :limit;");
        $requete->bindValue(':offset', $offset, PDO::PARAM_INT);
        $requete->bindValue(':limit', $catparpage, PDO::PARAM_INT);
        $requete->execute();
        $toutecat = $requete->fetchAll();
        return $toutecat;
    }
    public function GetPage()
    {
        $catparpage = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $catparpage;
        $catparpage = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $catparpage;
        $requete = $this->db->prepare("SELECT COUNT(categorie.id) FROM categorie");
        $requete->execute();
        $totalcat = $requete->fetchColumn();

        $totalpages = ceil($totalcat / $catparpage);
        return $totalpages;
    }


    public function GetPlatsByCategorie($id)
    {
        if ($id) {
            $requete = $this->db->prepare("SELECT plat.image, plat.libelle,description,id
            FROM plat
            WHERE plat.id_categorie = :id");
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $toutplat = $requete->fetchAll();
            return $toutplat;
        } else {
            return [];
        }
    }

    public function GetPlatById($id)
    {
        $requete = $this->db->prepare("SELECT * from plat where id=:id");
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $unplatid = $requete->fetch();
        return $unplatid;
    }
    public function GetAllPlats()
    {
        $requete = $this->db->prepare("SELECT *
        FROM plat;");
        $requete->execute();
        $toutplat = $requete->fetchAll();
        return $toutplat;
    }
}
