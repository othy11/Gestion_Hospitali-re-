<?php
require_once('Views/View.php');

class Detail_patientController
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
            $this->detail();
        }
    }

    private function detail()
    {
        $this->_manager = new PatientManager;
        $docs = $this->_manager->getPatientDetail();

        $this->_view = new View('detail_patient');
        $this->_view->generate(array('patient' => $docs));
    }
}
?>