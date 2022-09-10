<?php
require_once('Views/View.php');

class liste_patientController
{
    private $_view;
    private $_manager;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {
            $this->pat();
        }
    }

    private function pat()
    {
        $this->_manager = new PatientManager;
        $dep = $this->_manager->getPatients();
        $this->_view = new View('liste_patient');
        $this->_view->generate(array('patient' => $dep));
    }
}
?>