<?php
require_once('Views/View.php');

class ajout_depController
{
    private $_view;
    private $_nursermanager;

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
        $this->_nursemanager = new DepartementManager;
        $docs = $this->_nursemanager->addDepartement();

        $this->_view = new View('ajout_dep');
        $this->_view->generate(array('departement' => $docs));
    }
}
?>