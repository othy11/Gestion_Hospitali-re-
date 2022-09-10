<?php
require_once('Views/View.php');

class Detail_medecinController
{
    private $_view;
    private $_doctormanager;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {
            $this->doctordetail();
        }
    }

    private function doctordetail()
    {
        $this->_doctormanager = new DoctorManager;
        $docs = $this->_doctormanager->getDoctorDetail();

        $this->_view = new View('detail_medecin');
        $this->_view->generate(array('doctor' => $docs));
    }
    
}
?>