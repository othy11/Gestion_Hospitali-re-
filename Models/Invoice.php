<?php
class Invoice
{
    public $_id;
    public $_id_rendezvous;
    public $_prix_rendezvous;
        
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

    public function id_rendezvous()
    {
        return $this->_id_rendezvous;
    }
    public function setId_rendezvous($_id_rendezvous)
    {
        $this->_id_rendezvous = $_id_rendezvous;
    }

    public function prix_rendezvous()
    {
        return $this->_prix_rendezvous;
    }
    public function setPrix_rendezvous($_prix_rendezvous)
    {
        $this->_prix_rendezvous = $_prix_rendezvous;
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