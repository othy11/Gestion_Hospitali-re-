<?php
require_once('Views/View.php');

class delete_rendezvousController
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
        $this->_manager = new AppointmentManager;
        $renvous = $this->_manager->deleteRendezvous();

        $this->_view = new View('delete_rendezvous');
        $this->_view->generate(array('rendvous' => $renvous));
    }
}
?>