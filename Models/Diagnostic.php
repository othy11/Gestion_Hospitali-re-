<?php

    class Diagnostic
    {
        public $_id;
        public $_id_patient;
        public $_id_medecin;
        public $_date_diagnostique;
        public $_observation;
        public $_conclusion;
        public $_prescription;

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

        public function date_diagnostique()
        {
            return $this->_date_diagnostique;
        }
        public function setDate_diagnostique($_date_diagnostique)
        {
            $this->_date_diagnostique = $_date_diagnostique;
        }

        public function observation()
        {
            return $this->_observation;
        }
        public function setObservation($_observation)
        {
            $this->_observation = $_observation;
        }

        public function conclusion()
        {
            return $this->_conclusion;
        }
        public function setConclusion($_conclusion)
        {
            $this->_conclusion = $_conclusion;
        }

        public function prescription()
        {
            return $this->_prescription;
        }
        public function setPrescription($_prescription)
        {
            $this->_prescription = $_prescription;
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