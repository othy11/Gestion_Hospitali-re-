<?php
require_once('Views/View.php');

class Liste_infirmierController
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
            $this->nurses();
        }
    }

    private function nurses()
    {
        $this->_nursemanager = new NurseManager;
        $nurs = $this->_nursemanager->getNurses();

        $this->_view = new View('liste_infirmier');
        $this->_view->generate(array('nurse' => $nurs));
    }
}
?>