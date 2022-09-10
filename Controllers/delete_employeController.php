<?php
require_once('Views/View.php');

class delete_employeController
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
        $this->_nursemanager = new EmployeManager;
        $nurs = $this->_nursemanager->deleteemploye();

        $this->_view = new View('delete_employe');
        $this->_view->generate(array('employe' => $nurs));
    }
}
?>