<?php

    class SummaryUserAppointment
    {
        public $_id;
        public $_nom;
        public $_prenom;
        public $_dernier_rv;
        public $_qte_rv;
        
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

        public function dernier_rv()
        {
            return $this->_dernier_rv;
        }
        public function setDernier_rv($_dernier_rv)
        {
            $this->_dernier_rv = $_dernier_rv;
        }

        public function qte_rv()
        {
            return $this->_qte_rv;
        }
        public function set_qte_rv($_qte_rv)
        {
            $this->_qte_rv = $_qte_rv;
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