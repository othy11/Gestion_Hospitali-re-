<?php
require_once('Views/View.php');

class delete_medecinController
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
            $this->deletedoctor();
        }
    }

    private function deletedoctor()
    {
        $this->_doctormanager = new DoctorManager;
        $docs = $this->_doctormanager->deletedoctor();

        $this->_view = new View('delete_medecin');
        $this->_view->generate(array('doctor' => $docs));
    }
}
?>