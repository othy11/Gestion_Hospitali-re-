<?php
require_once('Views/View.php');

class Detail_EmployeController
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
            $this->employedetail();
        }
    }

    private function employedetail()
    {
        $this->_employemanager = new EmployeManager;
        $nurs = $this->_employemanager->getEmployeDetail();

        $this->_view = new View('detail_employe');
        $this->_view->generate(array('employe' => $nurs));
    }
}
?>