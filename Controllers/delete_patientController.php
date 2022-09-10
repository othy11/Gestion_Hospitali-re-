<?php
require_once('Views/View.php');

class delete_patientController
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
            $this->delete();
        }
    }

    private function delete()
    {
        $this->_manager = new PatientManager;
        $docdep = $this->_manager->deletePatient();

        $this->_view = new View('delete_patient');
        $this->_view->generate(array('patient' => $docdep));
    }
}
?>