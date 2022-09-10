<?php
class Modif_infirmierController
{
    private $_view;
    private $_nursemanager;

    public function __construct($url)
    {
        if (isset($url) && $url && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            if (!isset($_POST["update"]))
                $this->getNurseUpdate();
            else
                $this->nurses();
        }
    }

    private function nurses()
    {
        $this->_nursemanager = new NurseManager;
        $nurs = $this->_nursemanager->updatenurse();

        $this->_view = new View('modif_infirmier');
        $this->_view->generate(array('nurse' => $nurs));
    }

    private function getNurseUpdate()
    {
        $this->_nursemanager = new NurseManager;
        $nurs = $this->_nursemanager->getNurseDetail();

        $this->_view = new View('modif_infirmier');
        $this->_view->generate(array('nurse' => $nurs));
    }
}
