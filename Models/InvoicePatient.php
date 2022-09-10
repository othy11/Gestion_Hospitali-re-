<?php
class InvoicePatient
{
    public $_id_patient;
    public $_id_patient_nom;
    public $_id_patient_prenom;
    public $_nombre_rendezvous;
    public $_total_prix_rendezvous;
        
    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }

    public function id_patient()
    {
        return $this->_id_patient;
    }
    public function setId_patient($_id_patient)
    {
        $this->_id_patient = $_id_patient;
    }
    public function id_patient_nom()
    {
        return $this->_id_patient_nom;
    }
    public function setId_patient_nom($_id_patient_nom)
    {
        $this->_id_patient_nom = $_id_patient_nom;
    }
    public function id_patient_prenom()
    {
        return $this->_id_patient_prenom;
    }
    public function setId_patient_prenom($_id_patient_prenom)
    {
        $this->_id_patient_prenom = $_id_patient_prenom;
    }

    public function nombre_rendezvous()
    {
        return $this->_nombre_rendezvous;
    }
    public function setNombre_rendezvous($_nombre_rendezvous)
    {
        $this->_nombre_rendezvous = $_nombre_rendezvous;
    }

    public function total_prix_rendezvous()
    {
        return $this->_total_prix_rendezvous;
    }
    public function setTotal_prix_rendezvous($_total_prix_rendezvous)
    {
        $this->_total_prix_rendezvous = $_total_prix_rendezvous;
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