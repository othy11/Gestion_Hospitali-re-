<?php
require_once('Views/View.php');

class liste_depController
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
            $this->dep();
        }
    }

    private function dep()
    {
        $this->_manager = new DepartementManager;
        $dep = $this->_manager->getDepartements();

        $this->_view = new View('liste_dep');
        $this->_view->generate(array('departement' => $dep));
    }
}
?>