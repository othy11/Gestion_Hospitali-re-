<?php
require_once('Views/View.php');

class liste_rendezvousMedicinController
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
            $this->pat();
        }
    }

    private function pat()
    {
        //$usr="patient";
        print_r($_POST);
        $usr = $_POST;
        if(isset($_POST["user"]))
        {
            
            $usr = $_POST["user"];
        }
        $this->_manager = new AppointmentManager;
        $dep = $this->_manager->getAppointment();
        $this->_manager = new OldUserAppointmentManager;
        $dep2 = $this->_manager->getOldUserAppointment("doctor","OldUserAppointment","id_medecin");
        $this->_manager = new OldUserAppointmentManager;
        $dep3 = $this->_manager->getOldUserAppointment("patient","OldUserAppointment","id_patient");

        $this->_view = new View('liste_rendezvous');
        $this->_view->generate(array('appointment' => $dep, 'doctor' => $dep2, 'patient'=>$dep3,'usr'=>$usr));
    }

}
?>