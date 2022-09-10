<?php
    class Modif_patientController
    {
        private $_view;
        private $_doctormanager;
    
        public function __construct($url)
        {
            if(isset($url) && $url && count($url) > 1)
            {
                throw new Exception('Page introuvable');
            }
            else
            {
                if(!isset($_POST["update"]))
                    $this->getPatientUpdate();
                else
                    $this->patients();
                
            }
        }
    
        private function patients()
        {
            $this->_doctormanager = new PatientManager;
            $pat = $this->_doctormanager->updatepatient();
    
            $this->_view = new View('modif_patient');
            $this->_view->generate(array('patient' => $pat));
        }

        private function getPatientUpdate()
        {
            $this->_patientmanager = new PatientManager;
            $pat = $this->_patientmanager->getPatientDetail();
            
            $this->_view = new View('modif_patient');
            $this->_view->generate(array('patient' => $pat));
        }
    }
?>