<?php
class User
{
    public $_id;
    public $_nom;
    public $_prenom;
    public $_date_naissance;
    public $_email; 
    public $_adresse;
    public $_code_postal;
    public $_ville;
    public $_province;        
    public $_telephone;
    public $_mdp;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    public function id()
    {
        return $this->_id;
    }
    public function setId($_new_Id)
    {
        $this->_id = $_new_Id;
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

    public function date_naissance()
    {
        return $this->_date_naissance;
    }
    public function setDate_naissance($_new_date_naissance)
    {
        $this->_date_naissance = $_new_date_naissance;
    }

    public function email()
    {
        return $this->_email;
    }
    public function setEmail($_new_email)
    {
        $this->_email = $_new_email;
    }
    
    public function adresse()
    {
        return $this->_adresse;
    }
    public function setAdresse($_new_adresse)
    {
        $this->_adresse = $_new_adresse;
    }

    public function code_postal()
    {
        return $this->_code_postal;
    }
    public function setCode_postal($_new_code_postal)
    {
        $this->_code_postal = $_new_code_postal;
    }

    public function ville()
    {
        return $this->_ville;
    }
    public function setVille($_new_ville)
    {
        $this->_ville = $_new_ville;
    }

    public function province()
    {
        return $this->_province;
    }
    public function setProvince($_new_province)
    {
        $this->_province = $_new_province;
    }

    public function telephone()
    {
        return $this->_telephone;
    }
    public function setTelephone($_new_telephone)
    {
        $this->_telephone = $_new_telephone;
    }
    
    public function mdp()
    {
        return $this->_mdp;
    }
    public function setMdp($_new_mdp)
    {
        $this->_mdp = $_new_mdp;
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