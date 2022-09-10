<?php

class AdminManager extends Model
{
    public function loginAdmin()
    {
        $this->getBdd();
        if(isset($_POST["login"]) && !empty($_POST))
        {
            return $this->login('administration','Administrateur',
            $_POST["email"],$_POST["mdp"],"liste_medecin","adminemail");
        }
        if(isset($_COOKIE["adminemail"]))
        {
            echo "<script>document.location.href='/HMS_PROJECT/liste_medecin'</script>";  
        }
    }

    public function getDetailId($id)
    {
        $this->getBdd();
        return $this->details('administration','Patient','id',$id);
    }

    public function updateEmployePofil()
    {
        $this->getBdd();
        $id = $_COOKIE["nurseemail"];
        if (isset($_POST["update"])) {
            if (!empty($_POST)) {
                echo "<script>window.location.href = '/HMS_PROJECT/modif_profil';</script>";
                return $this->updateProfil(
                    'administration',
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
                    'Administrateur',
                    $id
                );
                $confirm = "La modification de l'administrateur a été effectué avec succès!";
            }
        }
    }

}