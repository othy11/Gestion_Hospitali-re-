<?php
class Doctor_DepartementDetail extends Doctor_Departement
{
    public $_nom;
    public $_prenom;
    public $_nom_dep;
    public $_specialite;
    public $_lieu;
    public $_adresse;

    
    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }

    public function nom()
    {
        return $this->_nom;
    }
    public function setNom($_new_nom)
    {
        $this->_nom = $_new_nom;
    }

    
    public function prenom()
    {
        return $this->_prenom;
    }
    public function setPrenom($_new_prenom)
    {
        $this->_prenom = $_new_prenom;
    }

public function nom_dep()
    {
        return $this->_nom_dep;
    }
    public function setNom_dep($_nom_dep)
    {
        $this->_nom_dep = $_nom_dep;
    }

    public function specialite()
    {
        return $this->_specialite;
    }
    public function setSpecialite($_specialite)
    {
        $this->_specialite = $_specialite;
    }

    public function lieu()
    {
        return $this->_lieu;
    }
    public function setLieu($_lieu)
    {
        $this->_lieu = $_lieu;
    }

    public function adresse()
    {
        return $this->_adresse;
    }
    public function setAdresse($_adresse)
    {
        $this->_adresse = $_adresse;
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