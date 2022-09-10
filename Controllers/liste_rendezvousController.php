<?php
require_once('Views/View.php');

class liste_rendezvousController
{
    private $_view;
    private $_manager_n;
    private $_manager_o;

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
        if(isset($_GET["qry"]))
        {
            $qry = $_GET["qry"];
        }
        else
            $qry = "patient";
        $field = $qry=="patient"?"id_patient":"id_medecin";
        $this->_manager_o = new SummaryUserAppointmentManager;
        $this->_manager_n = new ListUserAppointmentManager;
    
        if(isset($_COOKIE["adminemail"])||isset($_COOKIE["nurseemail"])){
            $old = $this->_manager_o->getSummaryUserAppointmentSummary($qry,"SummaryUserAppointment",$field,0);
            $new = $this->_manager_n->getListUserAppointment($qry,"ListUserAppointment",$field,1);
        }
        if(isset($_COOKIE["patientemail"])){
            $old = $this->_manager_o->getSummaryUserAppointmentSummary($qry,"SummaryUserAppointment",$field,0);
            $new = $this->_manager_n->getListUserAppointment($qry,"ListUserAppointment",$field,1);
            }
            
        if(isset($_COOKIE["doctoremail"])){
            $old = $this->_manager_o->getSummaryUserAppointmentSummary($qry,"SummaryUserAppointment",$field,0);
            $new = $this->_manager_n->getListUserAppointment($qry,"ListUserAppointment",$field,1);
            }
            
        if(isset($_COOKIE["employeemail"])){
            $old = $this->_manager_o->getSummaryUserAppointmentSummary($qry,"SummaryUserAppointment",$field,0);
            $new = $this->_manager_n->getListUserAppointment($qry,"ListUserAppointment",$field,1);
            }
            
            $this->_view = new View('liste_rendezvous');
            $this->_view->generate(array(  'oldApp'=>$old,'newApp'=>$new,'qry'=>$qry));

    }

}
?>