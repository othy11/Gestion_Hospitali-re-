<?php
require_once('Views/View.php');

class ajout_employeController
{
    private $_view;
    private $_nursemanager;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {
            $this->nurse();
        }
    }

    private function nurse()
    {
        $this->_nursemanager = new EmployeManager;
        $docs = $this->_nursemanager->addemploye();

        $this->_view = new View('ajout_employe');
        $this->_view->generate(array('employe' => $docs));
    }
}
?>