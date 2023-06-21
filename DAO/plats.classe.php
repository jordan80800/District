<?php
class Plats
{

    private $id;
    private $libelle;
    private $Description;
    private $prix;
    private $image;
    private $id_categorie;
    private $active;


    public function __construct($id,$libelle ,$Description,$prix,$image,$id_categorie,$active)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->Description = $Description;
        $this->prix = $prix;
        $this->image = $image;
        $this->id_categorie = $id_categorie;
        $this->active = $active;
       

    }


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }
    public function setLibelle($libelle)
    {
        return $this->libelle = $libelle;
    }

    public function getDescription()
    {
        return $this->Description;
    }
    public function setDescription($Description)
    {
        return $this->Description = $Description;
    }

    public function getPrix()
    {
        return $this->prix;
    }
    public function setPrix($prix)
    {
        return $this->prix = $prix;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        return $this->image = $image;
    }


    public function getId_categorie()
    {
        return $this->id_categorie;
    }
    public function setId_categorie($id_categorie)
    {
        return $this->id_categorie = $id_categorie;
    }

    public function getActive()
    {
        return $this->active;
    }
    public function setActive($active)
    {
        return $this->active = $active;
    }
}
