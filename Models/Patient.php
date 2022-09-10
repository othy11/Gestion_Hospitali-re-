<?php
class Patient extends User
{
    public $_description;
    
    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }

    public function description()
    {
        return $this->_description;
    }
    public function setDescription($_description)
    {
        $this->_description = $_description;
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