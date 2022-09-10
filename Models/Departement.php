<?php
class Departement
{
    public $_id;
    public $_nom_dep;
    public $_specialite;
    public $_lieu;
    public $_adresse;
    public $_code_postal;
    
    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }

    public function id()
    {
        return $this->_id;
    }
    public function setId($_id)
    {
        $this->_id = $_id;
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

    public function code_postal()
    {
        return $this->_code_postal;
    }
    public function setCode_postal($_code_postal)
    {
        $this->_code_postal = $_code_postal;
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
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