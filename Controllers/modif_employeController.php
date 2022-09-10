<?php
    class Modif_employeController
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
                if (!isset($_POST["update"]))
                $this->getEmployeUpdate();
            else
                $this->employes();
            }
        }
    
        private function employes()
        {
            $this->_doctormanager = new EmployeManager;
            $docs = $this->_doctormanager->updateemploye();
    
            $this->_view = new View('modif_employe');
            $this->_view->generate(array('employe' => $docs));
        }

        private function getEmployeUpdate()
        {
            $this->_employemanager = new EmployeManager;
            $employ = $this->_employemanager->getEmployeDetail();
    
            $this->_view = new View('modif_employe');
            $this->_view->generate(array('employe' => $employ));
        }
    }
?>