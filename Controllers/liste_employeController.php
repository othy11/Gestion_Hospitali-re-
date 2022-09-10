<?php
require_once('Views/View.php');

class liste_employeController
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
        $this->_manager = new EmployeManager;
        $dep = $this->_manager->getEmployes();

        $this->_view = new View('liste_employe');
        $this->_view->generate(array('employe' => $dep));
    }
}
?>