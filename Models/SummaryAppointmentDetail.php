<?php

    class SummaryAppointmentDetail extends SummaryAppointment
    {
        public $_dp_id;
        public $_dp_nom_dep;
        public $_dp_special;
        public $_dp_lieu;
        public $_dp_adresse;
      
        public function __construct(array $data) 
        {
            $this->hydrate($data);
        }

        
        public function dp_id()
        {
            return $this->_dp_id;
        }
        public function setDp_id($_id)
        {
            $this->_dp_id = $_id;
        }
        
        public function dp_nom_dep()
        {
            return $this->_dp_nom_dep;
        }
        public function setDp_nom_dep($_nom_dep)
        {
            $this->_dp_nom_dep = $_nom_dep;
        }

        public function dp_special()
        {
            return $this->_dp_special;
        }
        public function setPrenom_p($_dp_special)
        {
            $this->_dp_special = $_dp_special;
        }

        public function dp_lieu()
        {
            return $this->_dp_lieu;
        }
        public function setDp_lieu($_dp_lieu)
        {
            $this->_dp_lieu = $_dp_lieu;
        }

        public function dp_adresse()
        {
            return $this->_dp_adresse;
        }
        public function setDp_adresse($_dp_adresse)
        {
            $this->_dp_adresse = $_dp_adresse;
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
