<?php
class Doctor_Departement
{
    public $_id;
    public $_id_dep;
    public $_id_doc;
    
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

    public function id_dep()
    {
        return $this->_id_dep;
    }
    public function setId_dep($_id_dep)
    {
        $this->_id_dep = $_id_dep;
    }

    public function id_doc()
    {
        return $this->_id_doc;
    }
    public function setId_doc($_id_doc)
    {
        $this->_id_doc = $_id_doc;
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