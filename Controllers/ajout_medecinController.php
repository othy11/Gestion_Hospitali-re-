<?php
require_once('Views/View.php');

class ajout_medecinController
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
            $this->adddoctor();
        }
    }

    private function adddoctor()
    {
        $this->_doctormanager = new DoctorManager;
        $docs = $this->_doctormanager->addDoctor();

        $this->_view = new View('ajout_medecin');
        $this->_view->generate(array('doctor' => $docs));
    }
}
?>