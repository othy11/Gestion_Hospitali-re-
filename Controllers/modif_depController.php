<?php
require_once('Views/View.php');

class modif_depController
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
            if(!isset($_POST["update"]))
            $this->getDepUpdate();
        else
            $this->docdep();
        }
    }

    private function docdep()
    {
        $this->_manager = new DepartementManager;
        $dep = $this->_manager->updateDepartement();

        $this->_view = new View('modif_dep');
        $this->_view->generate(array('departement' => $dep));
    }

    private function getDepUpdate()
    {
        $this->_departementmanager = new DepartementManager;
        $dep = $this->_departementmanager->getDepartementDetail();
        
        $this->_view = new View('modif_dep');
        $this->_view->generate(array('departement' => $dep));
    }
}
?>