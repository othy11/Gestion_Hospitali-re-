<?php

    class ListUserAppointment
    {
        public $_id;
        public $_nom;
        public $_prenom;
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

        public function nom()
        {
            return $this->_nom;
        }
        public function setNom($_nom)
        {
            $this->_nom = $_nom;
        }

        public function prenom()
        {
            return $this->_prenom;
        }
        public function setPrenom($_prenom)
        {
            $this->_prenom = $_prenom;
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