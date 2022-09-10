<?php

class PatientManager extends Model
{
    public function loginPatient()
    {
        $this->getBdd();
        if(isset($_POST["login"]) && !empty($_POST))
        {
            return $this->login('patient','Patient',$_POST["email"],$_POST["mdp"],"detail_user","patientemail");
         }
        if(isset($_COOKIE["patientemail"]))
        {
            echo "<script>document.location.href='/HMS_PROJECT/liste_rendezvous'</script>";  
        }
    }
    public function getPatients()
    {
        $this->getBdd();
        return $this->getAll('patient','Patient');
    }
    public function deletepatient()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            return $this->delete('patient','Patient',$id);
        }
    }
    public function getPatientDetail()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            return $this->details('patient','Patient','id',$id);
        }
    }

    public function getPatientDetailId($id)
    {
        $this->getBdd();
        return $this->details('patient','Patient','id',$id);
    }

    public function addpatient()
    {
        $this->getBdd();
        if(isset($_POST["add"]) && !empty($_POST))
        {
            echo "<script>window.location.href = '/HMS_PROJECT/liste_patient';</script>";
            return $this->addPatients('patient',$_POST["nom"],
            $_POST["prenom"],$_POST["ddn"],
            $_POST["email"],$_POST["adresse"],$_POST["code_postal"],
            $_POST["ville"],$_POST["province"],$_POST["telephone"],
            $_POST['description'],$_POST["mdp"],'Patient');
        }
    }
    public function updatepatient()
    {
        $this->getBdd();
        if(isset($_POST["update"]) && !empty($_POST))
        {
            echo "<script>window.location.href = '/HMS_PROJECT/liste_patient';</script>";
            return $this->updatePatients('patient',$_POST["nom"],
            $_POST["prenom"],$_POST["ddn"],
            $_POST["email"],$_POST["adresse"],$_POST["code_postal"],
            $_POST["ville"],$_POST["province"],$_POST["telephone"],
            $_POST['description'],'Patient',$_GET['id']);
        }
    }

    public function updatePatientPofil()
    {
        $this->getBdd();
        $id = $_COOKIE["patientemail"];
        if (isset($_POST["update"])) {
            if (!empty($_POST)) {
                echo "<script>window.location.href = '/HMS_PROJECT/modif_profil';</script>";
                return $this->updateProfil(
                    'patient',
                    $_POST["nom"],
                    $_POST["prenom"],
                    $_POST["ddn"],
                    $_POST["email"],
                    $_POST["adresse"],
                    $_POST["code_postal"],
                    $_POST["ville"],
                    $_POST["province"],
                    $_POST["telephone"],
                    $_POST["mdp"],
                    'Patient',
                    $id
                );
                $confirm = "La modification du patient a été effectué avec succès!";
            }
        }
    }

}

?>