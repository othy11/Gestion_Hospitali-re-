<?php

    class Appointment
    {
        public $_id;
        public $_id_patient;
        public $_id_medecin;
        public $_date_rendezvous;
        public $_heure_rendezvous;

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

        public function id_patient()
        {
            return $this->_id_patient;
        }
        public function setId_patient($_id_patient)
        {
            $this->_id_patient = $_id_patient;
        }

        public function id_medecin()
        {
            return $this->_id_medecin;
        }
        public function setId_medecin($_id_medecin)
        {
            $this->_id_medecin = $_id_medecin;
        }

        public function date_rendezvous()
        {
            return $this->_date_rendezvous;
        }
        public function setDate_rendezvous($_date_rendezvous)
        {
            $this->_date_rendezvous = $_date_rendezvous;
        }

        public function heure_rendezvous()
        {
            return $this->_heure_rendezvous;
        }

        public function setHeure_rendezvous($_heure_rendezvous)
        {
            $this->_heure_rendezvous = $_heure_rendezvous;
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