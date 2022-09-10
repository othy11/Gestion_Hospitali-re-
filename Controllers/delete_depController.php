<?php
require_once('Views/View.php');

class delete_depController
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
        $this->_manager = new DepartementManager;
        $docdep = $this->_manager->deleteDepartement();

        $this->_view = new View('delete_dep');
        $this->_view->generate(array('departement' => $docdep));
    }
}
?>