<?php

class SummaryAppointmentManager extends Model
{
    public function getInvoice()
    {
        $this->getBdd();
        return $this->getAll('invoice','Invoice');
    }
    public function getPatient()
    {
        $this->getBdd();
        return $this->getAll('patient','Patient');
    }

    public function getMedecin()
    {
        $this->getBdd();
        return $this->getAll('doctor','Doctor');
    }

    public function getSummaryInvoice($order)
    {
        $this->getBdd();
        return $this->getInvoiceList($order);
    }


    public function getSummaryInvoiceDetail($order,$id )
    {
        $this->getBdd();
        return $this->getInvoiceListDetail($order,$id);
    }
    
    public function deleteInvoice()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            return $this->delete('invoice','Invoice',$id);
        }
    }
    public function addInvoice()
    {
        $this->getBdd();
        if(isset($_POST["add"]) && !empty($_POST))
        {
            
            echo "<script>window.location.href = '/HMS_PROJECT/liste_invoice';</script>";
            return $this->addInvoice('invoice',$_POST["id_rendezvous"]
            ,$_POST["prix_rendezvous"],'Invoice');

        }
    }
    public function updateInv()
    {
        $this->getBdd();
        if(isset($_POST["update"]) && !empty($_POST))
        {
            //var_dump($_POST);
            //var_dump($_GET);
            echo "<script>window.location.href = '/HMS_PROJECT/liste_rendezvous';</script>";
            return $this->updateInvoice('invoice',$_POST["id_rendezvous"]
            ,$_POST["prix_rendezvous"],'Invoice',$_GET["id"]);
        }
    }

    public function getInvoicePatientDetail()
    {
        //SELECT p.nom,p.prenom, i.prix_rendezvous FROM invoice i,appointment a,patient p WHERE i.id_rendezvous=a.id AND a.id_patient=p.id;
        //SELECT p.nom,p.prenom, COUNT(i.id) 'Cuenta', SUM(i.prix_rendezvous) 'Suma' FROM invoice i,appointment a,patient p WHERE i.id_rendezvous=a.id AND a.id_patient=p.id GROUP BY p.id;
        //SELECT d.nom,d.prenom, i.prix_rendezvous FROM invoice i,appointment a,doctor d WHERE i.id_rendezvous=a.id AND a.id_medecin=d.id;
        //SELECT d.nom,d.prenom, COUNT(i.id) 'Cuenta', SUM(i.prix_rendezvous) 'Suma' FROM invoice i,appointment a,doctor d WHERE i.id_rendezvous=a.id AND a.id_medecin=d.id GROUP BY d.id;
        /*
        SELECT p.id as id_p, p.nom as nom_p, p.prenom as prenom_p, d.id as id_d, d.nom as nom_d, d.prenom as prenom_d, a.id as id_rv, a.date_rendezvous as date_rv, dp.id as dp_id, dp.nom_dep as dp_nom_dep, dp.specialite as dp_special, dp.lieu as dp_lieu, dp.adresse as dp_adresse, count(a.id) as n_rv, sum(i.prix_rendezvous) as prix_rv 
        FROM patient p, doctor d, appointment a, invoice i, doctor_departement dd, departement dp 
        WHERE dd.id_doc = d.id AND dd.id_dep = dp.id AND a.id_patient = p.id AND a.id_medecin = d.id AND a.id = i.id_rendezvous GROUP BY p.id, d.id;
         */
        $this->getBdd();
        if(isset($_GET["id"]))
            return $this->details("invoice","Invoice","id",$_GET["id"]);
    }
}

?>