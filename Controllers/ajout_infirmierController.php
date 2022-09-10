<?php
require_once('Views/View.php');

class ajout_infirmierController
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
            $this->nurse();
        }
    }

    private function nurse()
    {
        $this->_nursemanager = new NurseManager;
        $docs = $this->_nursemanager->addNurse();

        $this->_view = new View('ajout_infirmier');
        $this->_view->generate(array('nurse' => $docs));
    }
}
?>