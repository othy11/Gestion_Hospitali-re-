<?php
require_once('Views/View.php');

class delete_infirmierController
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
            $this->delete();
        }
    }

    private function delete()
    {
        $this->_nursemanager = new NurseManager;
        $nurs = $this->_nursemanager->deletenurse();

        $this->_view = new View('delete_infirmier');
        $this->_view->generate(array('nurse' => $nurs));
    }
}
?>