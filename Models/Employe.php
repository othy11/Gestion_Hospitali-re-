<?php
class Employe extends User
{
    public $_fonction;
    public $_photo;
    public $_cv;
    

    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }

    public function fonction()
    {
        return $this->_fonction;
    }
    public function setFonction($_fonction)
    {
        $this->_fonction = $_fonction;
    }

    public function photo()
    {
        return $this->_photo;
    }
    public function setPhoto($_photo)
    {
        $this->_photo = $_photo;
    }

    public function cv()
    {
        return $this->_cv;
    }
    public function setCv($_cv)
    {
        $this->_cv = $_cv;
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
                
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
}
?>