<?php
    class Modif_profilController
    {
        private $_view;
        private $_usermanager;
    
        public function __construct($url)
        {
            if(isset($url) && $url && count($url) > 1)
            {
                throw new Exception('Page introuvable');
            }
            else
            {

                if(!isset($_POST["update"]))
                    $this->getProfilUpdate();
                else
                    $this->user();
            }
        }
    
        private function user()
        {
            if(isset($_COOKIE["doctoremail"])){
                $this->_usermanager = new DoctorManager;
                $docs = $this->_usermanager->updateDoctorPofil();
            }
            if(isset($_COOKIE["patientemail"])){
                $this->_usermanager = new PatientManager;
                $docs = $this->_usermanager->updatePatientPofil();
            }
            if(isset($_COOKIE["nurseemail"])){
                $this->_usermanager = new NurseManager;
                $docs = $this->_usermanager->updateNursePofil();          
            }
            if(isset($_COOKIE["employeemail"])){
                $this->_usermanager = new EmployeManager;
                $docs = $this->_usermanager->updateEmployePofil();         
            }
            if(isset($_COOKIE["adminemail"])){
                $this->_usermanager = new AdminManager;
                $docs = $this->_usermanager->getDetailId($_COOKIE["adminemail"]);             
            }
       // $this->_usermanager = new DoctorManager;
       // $docs = $this->_usermanager->updateDoctor();
    
            $this->_view = new View('modif_profil');
            $this->_view->generate(array('doctor' => $docs));
        }

        private function getProfilUpdate()
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

            $this->_view = new View('modif_profil');
            $this->_view->generate(array('doctor' => $docs));
        }
    }
?>