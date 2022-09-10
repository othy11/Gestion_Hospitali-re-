<?php
class Administrateur extends User
{
    public $_cv;
    
    public function __construct() 
    {
        $this->table = "administration";
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