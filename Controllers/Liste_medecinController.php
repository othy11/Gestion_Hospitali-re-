<?php
require_once('Views/View.php');

class Liste_medecinController
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
            $this->doctors();
        }
    }

    private function doctors()
    {
        $this->_doctormanager = new DoctorManager;
        $docs = $this->_doctormanager->getDoctors();

        $this->_view = new View('liste_medecin');
        $this->_view->generate(array('doctor' => $docs));
    }
}
?>