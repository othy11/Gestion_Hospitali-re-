<?php
require_once('Views/View.php');

class modif_rendezvousController
{
    private $_view;
    private $_manager;
    private $_managerDoctor;
    private $_managerPatient;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {   
            if(!isset($_POST["update"]))
              $this->rdvUpdate();
            else
              $this->rdv();
        }
    }

    private function rdv()
    {

        $this->_manager = new AppointmentManager;
        $rdv = $this->_manager->updateRendezvous();

        $this->_view = new View('liste_rendezvous');
        $this->_view->generate(array('rendezvous' => $rdv));
    }

    private function rdvUpdate()
    {
    
            $this->_appmanager = new AppointmentManager;
            $apoint = $this->_appmanager->getAppointmentDetail();
            $this->_docmanager = new DoctorManager;
            $med = $this->_docmanager->getDoctorDetailId($apoint->id_medecin());
            $this->_patientmanager = new PatientManager;
            $pat = $this->_patientmanager->getPatientDetailId($apoint->id_patient());
            $this->_depmanager = new DepartementManager;
            $dep = $this->_depmanager->getDepartements();
            $this->_view = new View('modif_rendezvous');
            $this->_view->generate(array('rendezvous' => $apoint,'patient'=>$pat,'medecin'=>$med,'depart'=>$dep));
    }
}
?>