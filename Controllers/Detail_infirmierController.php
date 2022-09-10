<?php
require_once('Views/View.php');

class Detail_infirmierController
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
            $this->nursedetail();
        }
    }

    private function nursedetail()
    {
        $this->_nursemanager = new NurseManager;
        $nurs = $this->_nursemanager->getNurseDetail();

        $this->_view = new View('detail_infirmier');
        $this->_view->generate(array('nurse' => $nurs));
    }
}
?>