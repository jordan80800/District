<?php
class Categories
{

    private $id;
    private $libelle;
    private $image;
    private $active;


    public function __construct($id,$libelle,$image,$active)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->image = $image;
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

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        return $this->image = $image;
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
