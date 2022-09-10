<?php
require_once('Views/View.php');

class HomeController
{
    private $_view;
    private $_departementmanager;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {
            $this->departements();
        }
    }

    private function departements()
    {
        $this->_departementmanager = new DepartementManager;
        $departements = $this->_departementmanager->getDepartements();

        $this->_view = new View('Home');
        $this->_view->generate(array('departement' => $departements));
    }
}
?>