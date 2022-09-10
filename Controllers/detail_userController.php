<?php
require_once('Views/View.php');

class Detail_userController
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
        if(isset($_COOKIE["doctoremail"])){
            $this->_usermanager = new DoctorManager;
            $docs = $this->_usermanager->getDoctorDetailId($_COOKIE["doctoremail"]);
        }
        if(isset($_COOKIE["patientemail"])){
            $this->_usermanager = new PatientManager;
            $docs = $this->_usermanager->getPatientDetailId($_COOKIE["patientemail"]);
        }
        if(isset($_COOKIE["nurseemail"])){
            $this->_usermanager = new NurseManager;
            $docs = $this->_usermanager->getNurseDetailId($_COOKIE["nurseemail"]);          
        }
        if(isset($_COOKIE["employeemail"])){
            $this->_usermanager = new EmployeManager;
            $docs = $this->_usermanager->getEmployeDetailId($_COOKIE["employeemail"]);          
        }
        if(isset($_COOKIE["adminemail"])){
            $this->_usermanager = new AdminManager;
            $docs = $this->_usermanager->getDetailId($_COOKIE["adminemail"]);             
        }

        $this->_view = new View('detail_user');
        $this->_view->generate(array('doctor' => $docs));
    }
    
}
?>