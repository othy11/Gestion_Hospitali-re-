<?php
class NurseManager extends Model
{
    public function loginNurse()
    {
        
        $this->getBdd();
        if(isset($_POST["login"]) && !empty($_POST))
        {
            return $this->login('nurse','Nurse',
            $_POST["email"],$_POST["mdp"],"detail_user","nurseemail");
        }
        if(isset($_COOKIE["nurseemail"]))
        {
            echo "<script>document.location.href='/HMS_PROJECT/liste_rendezvous'</script>";  
        }
        
    }

    public function getNurses()
    {
        $this->getBdd();
        return $this->getAll('nurse','Nurse');
    }
    public function getNurseDetail()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            return $this->details('nurse','Nurse','id',$id);
        }
    }

    public function getNurseDetailId($id)
    {
        $this->getBdd();
        return $this->details('nurse','Nurse','id',$id);
    }

    public function updatenurse()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            if(isset($_POST["update"]) && !empty($_POST))// && isset($_FILES['photo']['name']))
            {
                $id = $_GET["id"];
                echo "<script>window.location.href = '/HMS_PROJECT/liste_infirmier';</script>";
                return $this->updateDoctors('nurse',$_POST["nom"],
                $_POST["prenom"],$_POST["ddn"],
                $_POST["email"],$_POST["adresse"],$_POST["code_postal"],
                $_POST["ville"],$_POST["province"],$_POST["telephone"],
                'Nurse',$id);
                $confirm = "La modification de l'infirmier a été effectué avec succès!";
            }
        }
    }
    public function deletenurse()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            return $this->delete('nurse','Nurse',$id);
        }
    }
    public function addNurse()
    {
        $this->getBdd();
        if(isset($_POST["add"]) && !empty($_POST) && isset($_FILES['photo']['name']))
        {
            echo "<script>window.location.href = '/HMS_PROJECT/liste_infirmier';</script>";
            return $this->addDoctors('nurse',$_POST["nom"],
            $_POST["prenom"],$_POST["ddn"],$_FILES["photo"]["name"],
            $_POST["email"],$_POST["adresse"],$_POST["code_postal"],
            $_POST["ville"],$_POST["province"],$_POST["telephone"],
            $_FILES["cv"]["name"],$_POST["mdp"],'Nurse');
            $confirm = "L'ajout de l'infirmie a été effectué avec succès!";
        }
    }

    public function updateNursePofil()
    {
        $this->getBdd();
        $id = $_COOKIE["nurseemail"];
        if (isset($_POST["update"])) {
            if (!empty($_POST)) {
                echo "<script>window.location.href = '/HMS_PROJECT/modif_profil';</script>";
                return $this->updateProfil(
                    'nurse',
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
                    'Nurse',
                    $id
                );
                $confirm = "La modification de l'infirmière a été effectué avec succès!";
            }
        }
    }
}
