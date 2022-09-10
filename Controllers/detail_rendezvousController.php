<?php
require_once('Views/View.php');

class Detail_rendezvousController
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
            $this->detail();
        }
    }

    private function detail()
    {
        $this->_manager = new AppointmentManager;
        $docs = $this->_manager->getAppointmentDetail();
        $this->_view = new View('detail_rendezvous');
        $this->_view->generate(array('appointment' => $docs));
    }
}
?>