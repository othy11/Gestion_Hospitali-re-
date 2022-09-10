<?php

class InvoiceManager extends Model
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

    public function getInvoiceByAppointment($id_rv)
    {
        $this->getBdd();
        return $this->details('Invoice','Invoice','id_rendezvous',$id_rv);
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
    public function updInvoicePost()
    {
        $this->getBdd();
        if(isset($_POST["update"]) && !empty($_POST))
        {      
            echo "<script>window.location.href = '/HMS_PROJECT/liste_rendezvous';</script>";
            return $this->updateInvoice('invoice',$_POST["id_rendezvous"]
            ,$_POST["prix_rendezvous"],'Invoice',$_POST["id"]);
        }
    }

    public function updInvoice()
    {
        $this->getBdd();
        if(isset($_POST["update"]) && !empty($_POST))
        {      
            echo "<script>window.location.href = '/HMS_PROJECT/liste_invoice';</script>";
            return $this->updateInvoice('invoice',$_POST["id_rendezvous"]
            ,$_POST["prix_rendezvous"],'Invoice',$_GET["id"]);
        }
    }

    public function getInvoiceDetail()
    {
        //SELECT p.nom,p.prenom, i.prix_rendezvous FROM invoice i,appointment a,patient p WHERE i.id_rendezvous=a.id AND a.id_patient=p.id;
        //SELECT p.nom,p.prenom, COUNT(i.id) 'Cuenta', SUM(i.prix_rendezvous) 'Suma' FROM invoice i,appointment a,patient p WHERE i.id_rendezvous=a.id AND a.id_patient=p.id GROUP BY p.id;
        //SELECT d.nom,d.prenom, i.prix_rendezvous FROM invoice i,appointment a,doctor d WHERE i.id_rendezvous=a.id AND a.id_medecin=d.id;
        //SELECT d.nom,d.prenom, COUNT(i.id) 'Cuenta', SUM(i.prix_rendezvous) 'Suma' FROM invoice i,appointment a,doctor d WHERE i.id_rendezvous=a.id AND a.id_medecin=d.id GROUP BY d.id;
        $this->getBdd();
        if(isset($_GET["id"]))
            return $this->details("invoice","Invoice","id",$_GET["id"]);
    }
}

?>