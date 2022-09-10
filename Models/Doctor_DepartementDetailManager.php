<?php

class Doctor_DepartementDetailManager extends Model
{
    public function getDD()
    {
        $this->getBdd();
        return $this->getdocdep('doctor_departement','doctor','departement','Doctor_DepartementDetail');
    }
   

    public function add()
    {
        $this->getBdd();
        if(isset($_POST["add"]) && !empty($_POST))
        {
            $id_dep = $_POST["id_dep"];
            $id_doc = $_POST["id_doc"];
            return $this->addDocDep("doctor_departement","Doctor_Departement",$id_dep,$id_doc);
        }
    }


    public function getDocSansDep()
    {
        $this->getBdd();
        return $this->getAll('doctor','Doctor');        
    }
  
    public function getDoctorDepartamentDetail()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            return $this->details('doctor_departement','Doctor_Departement','id',$id);
        }
    }

    public function deleteDocDep()
    {
        $this->getBdd();
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            return $this->delete('doctor_departement','Doctor_Departement',$id);
        }
    }
    public function update()
    {
        $this->getBdd();
        if(isset($_POST["update"]) && !empty($_POST))
        {
            $id_dep = $_POST["id_dep"];
            $id_doc = $_POST["id_doc"];
            return $this->updateDocDep("doctor_departement","Doctor_Departement",$id_dep,$id_doc,$_GET["id"]);
        }
    }
}

?>