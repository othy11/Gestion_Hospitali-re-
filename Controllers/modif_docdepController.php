<?php
require_once('Views/View.php');

class modif_docdepController
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
            if (!isset($_POST["update"]))
            $this->docdep();
        else
            $this->docdepUpd();

        }
    }

    private function docdep()
    {
        $this->_manager = new Doctor_DepartementManager;
        $docdep = $this->_manager->getDoctorDepartamentDetail();
        $doc = $this->_manager->getDoc();
        $dep = $this->_manager->getDep();

        $this->_view = new View('modif_docdep');
        $this->_view->generate(array('doctor_departement' => $docdep, 'doctor' => $doc, 'departement' => $dep));
    }
    private function docdepUpd()
    {
        $this->_manager = new Doctor_DepartementManager;
        $docdep = $this->_manager->update();
        $docdep = $this->_manager->getDD();
        $doc = $this->_manager->Doc();
        $dep = $this->_manager->Dep();

        $this->_view = new View('liste_docdep');
        $this->_view->generate(array('doctor_departement' => $docdep, 'doctor' => $doc, 'departement' => $dep));
    }
}
?>