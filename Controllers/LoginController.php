<?php
require_once('Views/View.php');

class LoginController
{
    private $_view;
    private $_adminmanager;
    private $_patientmanager;
    private $_employemanager;
    private $_nursemanager;
    private $_doctormanager;
    private $typeUser;

    public function __construct($url)
    {
        if(isset($url) && $url && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }
        else
        {
            $tmp = 0;
            $usr="";
            if(isset($_GET["tusr"]))
            {
                if($_GET["tusr"]=="patient"){
                    $this->loginPatients();
                    $this->typeUser = "Patient";
                }
                else if($_GET["tusr"]=="admin"){
                    $this->loginAdmins();
                    $this->typeUser = "Administrateur";
                }
                else if($_GET["tusr"]=="employee"){
                    $this->loginEmployee();
                    $this->typeUser = "Employer";
                }
                else if($_GET["tusr"]=="doctor"){
                    $this->loginDoctor();
                    $this->typeUser = "Médecin";
                }
                else if($_GET["tusr"]=="nurse"){
                    $this->loginNurse();
                    $this->typeUser = "Infermier";
                }
            
    
                
            }
            else
                $usr = "No me funciono mi idea para login";
            //$this->loginPatients();
           
        }
    }

    private function loginAdmins()
    {   

        $this->_adminmanager = new AdminManager;
        $admin = $this->_adminmanager->loginAdmin();
        $this->_view = new View('login');
        //echo array('administrator' => $admin);
        $this->_view->generate(array('administrator' => $admin));
    }

    private function loginPatients()
    {
        $this->_patientmanager = new PatientManager;
        $patient = $this->_patientmanager->loginPatient();
        
        $this->_view = new View('login');
        $this->_view->generate(array('patient' => $patient));
    }
    private function loginEmployee()
    {
        $this->_employemanager = new EmployeManager;
        $employe = $this->_employemanager->loginEmploye();
        $this->_view = new View('login');
        $this->_view->generate(array('employe' => $employe));
    }
    private function loginDoctor()
    {
        $this->_doctormanager = new DoctorManager;
        $doctor = $this->_doctormanager->loginDoctor();
        $this->_view = new View('login');
        $this->_view->generate(array('doctor' => $doctor));
    }
    private function loginNurse()
    {
        $this->_nursemanager = new NurseManager;
        $nurse = $this->_nursemanager->loginNurse();
        $this->_view = new View('login');
        $this->_view->generate(array('nurse' => $nurse));
    }
}
?>