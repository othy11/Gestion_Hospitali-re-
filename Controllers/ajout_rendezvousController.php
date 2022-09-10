<?php
require_once('Views/View.php');

class ajout_rendezvousController
{
    private $_view;
    private $_appmanager;
    private $_patientmanager;
    private $_depmanager;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {
            $this->rendezvous();
        }
    }

    private function rendezvous()
    {
        if(!isset($_POST['id_dep'])){
        $this->_appmanager = new AppointmentManager;
        $apoint = $this->_appmanager->addRendezvous();
        $this->_docmanager = new DoctorManager;
        $med = $this->_docmanager->getDoctors();
        $this->_patientmanager = new PatientManager;
        $pat = $this->_patientmanager->getPatients();
        $this->_depmanager = new DepartementManager;
        $dep = $this->_depmanager->getDepartements();
        $this->_view = new View('ajout_rendezvous');
        $this->_view->generate(array('rendezvous' => $apoint,'patient'=>$pat,'medecin'=>$med,'depart'=>$dep));
        }
        else{
            var_dump($_POST);
            $cadena="<label>SELECT 2 (paises)</label> 
			<select id='lista2' name='lista2'>";
            $this->_appmanager = new AppointmentManager;
            echo $this->_appmanager->getListeDoc_from_Dep($_POST['id_dep']);
             
            
        }
    }
}
?>