<?php
require_once('Views/View.php');

class liste_docdepController
{
    private $_view;
    private $_manager;
    private $_docmanager;
    private $_depmanager;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {
            $this->docdep();
        }
    }

    private function docdep()
    {
        $this->_manager = new Doctor_DepartementDetailManager;
        $docdep = $this->_manager->getDD();   
        $this->_docmanager = new DoctorManager;
        $doc = $this->_docmanager->getDoctorSansDept();
        $this->_depmanager = new DepartementManager;
        $dep = $this->_depmanager->getDepartements();

        $this->_view = new View('liste_docdep');
        $this->_view->generate(array('doctor_departement' => $docdep, 'doctor' => $doc, 'departement' => $dep));
    }
}
?>