<?php
    class Modif_medecinController
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
                    $this->getDoctorUpdate();
                else
                    $this->doctors();
            }
        }
    
        private function doctors()
        {
            $this->_doctormanager = new DoctorManager;
            $docs = $this->_doctormanager->updatedoctor();
    
            $this->_view = new View('modif_medecin');
            $this->_view->generate(array('doctor' => $docs));
        }

        private function getDoctorUpdate()
        {
            $this->_doctormanager = new DoctorManager;
            $docs = $this->_doctormanager->getDoctorDetail();
            
            $this->_view = new View('modif_medecin');
            $this->_view->generate(array('doctor' => $docs));
        }
    }
?>