<?php

class AppointmentManager extends Model
{

    public function getAppointment()
    {
        $this->getBdd();
        return $this->getAll("appointment","Appointment");
    }
    public function getAppointmentDetail()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
            return $this->details("appointment","Appointment","id",$_GET["id"]);
    }
 
    public function getAppointmentDetailById($id)
    {
        $this->getBdd();
            return $this->details("appointment","Appointment","id",$id);
    }

    public function updateRendezvous()
    {
        $this->getBdd();
        if(isset($_POST["update"]) && !empty($_POST))
        {
            echo "<script>window.location.href = '/HMS_PROJECT/liste_rendezvous';</script>";
            return $this->updateAppointment('appointment',$_POST["id_patient"],$_POST["id_medecin"],
            $_POST["date_rendezvous"],$_POST["heure_rendezvous"],'Appointment',$_GET["id"]);
        }
    }

    

    public function getRendezvous()
    {
        $this->getBdd();
        return $this->getAll('appointment','Appointment');
    }

    public function deleteRendezvous()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            $this->deleteByField('invoice','id_rendezvous',$id);
            return $this->delete('appointment','Appointment',$id);
        }
    }
    public function addRendezvous()
    {
        $this->getBdd();
        if(isset($_POST["add"]) && !empty($_POST))
        {
            echo "<script>window.location.href = '/HMS_PROJECT/liste_rendezvous';</script>";
            return $this->addAppointment('appointment',$_POST["id_patient"],$_POST["id_medecin"],
            $_POST["date_rendezvous"],$_POST["heure_rendezvous"],'Appointment');
          
        }
        // if(isset($_POST["id_dep"]) && !empty($_POST))
        // {
           
        //         return $this->addAppointment('appointment',"7","6","2022-03-07","07:30",'Appointment');
           
        // }
    }

    public function getListeDoc_from_Dep($id_dep)
    {
        
        $this->getBdd();
        $this->getdoc_from_dep($id_dep);
       // echo "afdsa";
    }


}