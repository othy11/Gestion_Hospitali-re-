<?php

class DepartementManager extends Model
{
    public function getDepartements()
    {
        $this->getBdd();
        return $this->getAll('departement','Departement');
    }

    public function getDepartementDetail()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            return $this->details('departement','Departement','id',$id);
        }
    }

    public function deleteDepartement()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            return $this->delete('departement','Departement',$id);
        }
    }
    public function addDepartement()
    {
        $this->getBdd();
        if(isset($_POST["add"]) && !empty($_POST))
        {
            echo "<script>window.location.href = '/HMS_PROJECT/liste_dep';</script>";
            return $this->addDepartements('departement',$_POST["nom_dep"],
            $_POST["specialite"],$_POST["lieu"],
            $_POST["adresse"],$_POST["code_postal"],'Departement');
        }
    }
    public function updateDepartement()
    {
        $this->getBdd();
        if(isset($_POST["update"]) && !empty($_POST))
        {
            echo "<script>window.location.href = '/HMS_PROJECT/liste_dep';</script>";
            return $this->updateDepartements('departement',$_POST["nom_dep"],
            $_POST["specialite"],$_POST["lieu"],
            $_POST["adresse"],$_POST["code_postal"],'Departement',$_GET["id"]);
        }
    }
}

?>