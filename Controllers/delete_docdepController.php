<?php
require_once('Views/View.php');

class delete_docdepController
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
            $this->delete();
        }
    }

    private function delete()
    {
        $this->_manager = new Doctor_DepartementManager;
        $docdep = $this->_manager->deleteDocDep();

        $this->_view = new View('delete_docdep');
        $this->_view->generate(array('doctor_departement' => $docdep));
    }
}
?>