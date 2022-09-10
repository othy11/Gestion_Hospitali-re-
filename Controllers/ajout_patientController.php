<?php
require_once('Views/View.php');

class ajout_patientController
{
    private $_view;
    private $_nursermanager;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {
            $this->dep();
        }
    }

    private function dep()
    {
        $this->_nursemanager = new PatientManager;
        $docs = $this->_nursemanager->addpatient();

        $this->_view = new View('ajout_patient');
        $this->_view->generate(array('patient' => $docs));
    }
}
?>