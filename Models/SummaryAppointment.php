<?php

    class SummaryAppointment
    {
        public $_id_p;
        public $_nom_p;
        public $_prenom_p;
        public $_id_d;
        public $_nom_d;
        public $_prenom_d;
        public $_id_rv;
        public $_date_rv;
        public $_n_rv;
        public $_prix_rv;
      
        public function __construct(array $data) 
        {
            $this->hydrate($data);
        }

        public function id_p()
        {
            return $this->_id_p;
        }
        public function setId_p($_id)
        {
            $this->_id_p = $_id;
        }

        public function nom_p()
        {
            return $this->_nom_p;
        }
        public function setNom_p($_nom)
        {
            $this->_nom_p = $_nom;
        }

        public function prenom_p()
        {
            return $this->_prenom_p;
        }
        public function setPrenom_p($_prenom)
        {
            $this->_prenom_p = $_prenom;
        }

        public function id_d()
        {
            return $this->_id_d;
        }
        public function setId_d($_id_d)
        {
            $this->_id_d = $_id_d;
        }

        public function nom_d()
        {
            return $this->_nom_d;
        }
        public function setNom_d($_nom_d)
        {
            $this->_nom_d = $_nom_d;
        }

        public function prenom_d()
        {
            return $this->_prenom_d;
        }
        public function setPrenom_d($_prenom_d)
        {
            $this->_prenom_d = $_prenom_d;
        }

        public function id_rv()
        {
            return $this->_id_rv;
        }
        public function setId_rv($_id_rv)
        {
            $this->_id_rv = $_id_rv;
        }

        public function date_rv()
        {
            return $this->_date_rv;
        }
        public function setDate_rv($_date_rv)
        {
            $this->_date_rv = $_date_rv;
        }

        public function n_rv()
        {
            return $this->_n_rv;
        }
        public function setN_rv($_n_rv)
        {
            $this->_n_rv = $_n_rv;
        }

        public function prix_rv()
        {
            return $this->_prix_rv;
        }
        public function setPrix_rv($_prix_rv)
        {
            $this->_prix_rv = $_prix_rv;
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
