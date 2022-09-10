<?php

abstract class Model
{
    private static $_db;
    public $table;

    private static function setBdd()
    {
        self::$_db = new PDO("mysql:host=localhost;dbname=system_hopital;charset=utf8", "root", "");
        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if (self::$_db == null) {
            self::setBdd();
        }
        return self::$_db;
    }

    public function login($table, $obj, $email, $mdp, $link, $cookie)
    {
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
        //$sql = "SELECT id,nom,prenom FROM ".$table." where email = '".$email."' and mdp='".$mdp."';";
        $sql = "SELECT id,nom,prenom,mdp FROM " . $table . " where email = '" . $email . "';";
        $query = self::$_db->prepare($sql);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->execute();
        $count = $query->rowCount();
        if ($count > 0) {

            $result = $query->fetchAll();
            if (password_verify($mdp, $result[0]["mdp"])) {
                echo "<script>document.location.href='/HMS_PROJECT/" . $link . "'</script>";
                setcookie($cookie, $result[0]["id"], time() + 3600 * 24);
                setcookie('nom', $result[0]["nom"], time() + 3600 * 24);
                setcookie('prenom', $result[0]["prenom"], time() + 3600 * 24);
                setcookie('TypeUser', $table, time() + 3600);
                //setcookie("logged_user",$obj, time()+3600*24);                 
                return new $obj($data);
            } else
                echo "<script>alert('Votre mot de passe sont incorrecte');</script>";
        } else {
            echo "<script>alert('Votre email de passe sont incorrecte');</script>";
        }
        $query->closeCursor();
    }

    public function getAll($table, $obj)
    {
        $var = [];
        $sql = "SELECT * FROM " . $table . ";";
        $query = self::$_db->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
        $query->closeCursor();
    }
    public function getAppointments($table, $obj, $field, $way)
    {
        $var = [];
        if (isset($_COOKIE["adminemail"]))
            $sql = "SELECT appointment.id, " . $table . ".nom, " . $table . ".prenom, MAX(appointment.date_rendezvous) dernier_rv, COUNT(appointment." . $field . ") as _qte_rv 
            FROM appointment," . $table . " WHERE appointment." . $field . " = " . $table . ".id 
            AND appointment.date_rendezvous " . ($way == 0 ? "<" : ">=") . " CURRENT_DATE() GROUP BY " . $field . " ORDER BY appointment.date_rendezvous ASC;";
        if (isset($_COOKIE["nurseemail"]))
            $sql = "SELECT appointment.id, " . $table . ".nom, " . $table . ".prenom, MAX(appointment.date_rendezvous) dernier_rv, COUNT(appointment." . $field . ") as _qte_rv 
            FROM appointment," . $table . " WHERE appointment." . $field . " = " . $table . ".id 
            AND appointment.date_rendezvous " . ($way == 0 ? "<" : ">=") . " CURRENT_DATE() GROUP BY " . $field . " ORDER BY appointment.date_rendezvous  ASC;";
        if (isset($_COOKIE["doctoremail"])) {

            $sql = "SELECT appointment.id, " . $table . ".nom, " . $table . ".prenom, MAX(appointment.date_rendezvous) dernier_rv, COUNT(appointment." . $field . ") as _qte_rv 
            FROM appointment," . $table . " WHERE appointment." . $field . " = " . $table . ".id AND " . $table . ".id = " . $_COOKIE["doctoremail"] . "
            AND appointment.date_rendezvous " . ($way == 0 ? "<" : ">=") . " CURRENT_DATE() GROUP BY " . $field . "  ORDER BY appointment.date_rendezvous  ASC;";
        }

        if (isset($_COOKIE["patientemail"])) {
            $sql = "SELECT appointment.id, " . $table . ".nom, " . $table . ".prenom, MAX(appointment.date_rendezvous) dernier_rv, COUNT(appointment." . $field . ") as _qte_rv 
            FROM appointment," . $table . " WHERE appointment." . $field . " = " . $table . ".id AND " . $table . ".id = " . $_COOKIE["patientemail"] . "
            AND appointment.date_rendezvous " . ($way == 0 ? "<" : ">=") . " CURRENT_DATE() GROUP BY " . $field . "  ASC;";
        }

        $query = self::$_db->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
        $query->closeCursor();
    }

    public function getInvoiceList($opt)
    {
        $var = [];
        //$sql = "SELECT  p.id, p.nom, p.prenom
        $sql = "SELECT  p.id as id_p, p.nom as nom_p, p.prenom as prenom_p, d.id as id_d, d.nom as nom_d, d.prenom as prenom_d, a.id as id_rv, a.date_rendezvous as date_rv, count(a.id) as n_rv, sum(i.prix_rendezvous) as prix_rv
        FROM patient p, doctor d, appointment a, invoice i
        WHERE a.id_patient = p.id AND a.id_medecin = d.id AND a.id = i.id_rendezvous GROUP BY ";

        if (isset($_COOKIE["patientemail"])) {
            $sql = "SELECT  p.id as id_p, p.nom as nom_p, p.prenom as prenom_p, d.id as id_d, d.nom as nom_d, d.prenom as prenom_d, a.id as id_rv, a.date_rendezvous as date_rv, count(a.id) as n_rv, sum(i.prix_rendezvous) as prix_rv
            FROM patient p, doctor d, appointment a, invoice i
            WHERE a.id_patient = p.id AND a.id_medecin = d.id AND a.id = i.id_rendezvous AND p.id = " . $_COOKIE["patientemail"] . " GROUP BY ";
        }

        if ($opt == "patient")
            $sql = $sql . "p.id; ";
        if ($opt == "doctor")
            $sql = $sql . "d.id; ";
        if ($opt == "date")
            $sql = $sql . "date_format(a.date_rendezvous,'%Y-%m');";

        $query = self::$_db->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new SummaryAppointment($data);
        }
        return $var;
        $query->closeCursor();
    }

    public function getInvoiceListDetail($opt, $id)
    {
        $var = [];
        //$sql = "SELECT  p.id, p.nom, p.prenom
        $sql = "SELECT  p.id as id_p, p.nom as nom_p, p.prenom as prenom_p, d.id as id_d, d.nom as nom_d, d.prenom as prenom_d, a.id as id_rv, a.date_rendezvous as date_rv, a.id as n_rv, i.prix_rendezvous as prix_rv
        FROM patient p, doctor d, appointment a, invoice i
        WHERE a.id_patient = p.id AND a.id_medecin = d.id AND a.id = i.id_rendezvous AND ";

        if ($opt == "patient")
            $sql = $sql . " p.id = " . $id . "; ";
        if ($opt == "doctor")
            $sql = $sql . " d.id = " . $id . "; ";
        if ($opt == "date")
            $sql = $sql . " a.date_rendezvous = " . $id . ";";


        $query = self::$_db->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new SummaryAppointment($data);
        }
        return $var;
        $query->closeCursor();
    }

    public function getListAppointments($table, $obj, $field, $way)
    {
        $var = [];

        if (isset($_COOKIE["adminemail"]))
            $sql = "SELECT appointment.id, " . $table . ".nom, " . $table . ".prenom, appointment.date_rendezvous,  appointment.heure_rendezvous
            FROM appointment," . $table . " WHERE appointment." . $field . " = " . $table . ".id
            AND appointment.date_rendezvous " . ($way == 0 ? "<" : ">=") . " CURRENT_DATE();";
        if (isset($_COOKIE["nurseemail"]))
            $sql = "SELECT appointment.id, " . $table . ".nom, " . $table . ".prenom, appointment.date_rendezvous,  appointment.heure_rendezvous
            FROM appointment," . $table . " WHERE appointment." . $field . " = " . $table . ".id
            AND appointment.date_rendezvous " . ($way == 0 ? "<" : ">=") . " CURRENT_DATE();";

        if (isset($_COOKIE["doctoremail"]))
            $sql = "SELECT appointment.id, patient.nom, patient.prenom, appointment.date_rendezvous,  appointment.heure_rendezvous
            FROM appointment, doctor, patient WHERE appointment.id_medecin = doctor.id AND doctor.id = " . $_COOKIE["doctoremail"] ." AND appointment.id_patient = patient.id 
            AND appointment.date_rendezvous " . ($way == 0 ? "<" : ">=") . " CURRENT_DATE();";
        if (isset($_COOKIE["patientemail"])) {
            $sql = "SELECT appointment.id, " . $table . ".nom, " . $table . ".prenom, appointment.date_rendezvous,  appointment.heure_rendezvous
            FROM appointment," . $table . " WHERE appointment." . $field . " = " . $table . ".id AND " . $table . ".id = " . $_COOKIE["patientemail"] . "
            AND appointment.date_rendezvous " . ($way == 0 ? "<" : ">=") . " CURRENT_DATE();";
        }

        $query = self::$_db->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
        $query->closeCursor();
    }

    public function details($table, $obj, $where, $id)
    {
        $sql = 'SELECT * FROM ' . $table . ' where ' . $where . '=' . $id . ';';
        $query = self::$_db->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC))
            return (new $obj($data));
        $query->closeCursor();
    }

    public function updateDoctors($table, $nom, $prenom, $ddn, $email, $adresse, $code, $ville, $province, $telephone, $obj, $id)
    {
        $sql = "update " . $table . " set nom=?, prenom=?, date_naissance=?,
        email=?,adresse=?,code_postal=?,ville=?,province=?,telephone=?
        where id=?;";

        $query = self::$_db->prepare($sql);
        $query->execute([$nom, $prenom, $ddn, $email, $adresse, $code, $ville, $province, $telephone, $id]);

        $data = array(
            "nom" => $nom, "prenom" => $prenom, "date_naissance" => $ddn,
            "email" => $email, "adresse" => $adresse, "code_postal" => $code,
            "ville" => $ville, "province" => $province, "telephone" => $telephone
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }
    public function updateProfil($table, $nom, $prenom, $ddn, $email, $adresse, $code, $ville, $province, $telephone, $mdp, $obj, $id)
    {
        $sql = "update " . $table . " set nom=?, prenom=?, date_naissance=?,
        email=?,adresse=?, code_postal=?, ville=?, province=?, telephone=?, mdp=?
        where id=?;";
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT, array("cost" => 10));
        $query = self::$_db->prepare($sql);
        $query->execute([$nom, $prenom, $ddn, $email, $adresse, $code, $ville, $province, $telephone, $mdp_hash, $id]);

        $data = array(
            "nom" => $nom, "prenom" => $prenom, "date_naissance" => $ddn,
            "email" => $email, "adresse" => $adresse, "code_postal" => $code,
            "ville" => $ville, "province" => $province, "telephone" => $telephone
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }

    public function verifyUser($table, $email)
    {
        $sql = "select * from " . $table . "  WHERE email = '" . $email . "';";
        $query = self::$_db->prepare($sql);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->execute();
        $count = $query->rowCount();
        if ($count > 0) {
            return "L'e-mail saisi existe déjà dans le système, veuillez en saisir un autre ou contacter un administrateur";
        }
        return "";
    }






    public function addDoctors($table, $nom, $prenom, $ddn, $photo, $email, $adresse, $code, $ville, $province, $telephone, $cv, $mdp, $obj)
    {
        $sql = "insert into " . $table . " (nom,prenom,date_naissance,photo,email,adresse,code_postal,ville,province,telephone,cv,mdp) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT, array("cost" => 10));
        $query = self::$_db->prepare($sql);
        $query->execute([$nom, $prenom, $ddn, $photo, $email, $adresse, $code, $ville, $province, $telephone, $cv, $mdp_hash]);

        $data = array(
            "nom" => $nom, "prenom" => $prenom, "date_naissance" => $ddn,
            "email" => $email, "adresse" => $adresse, "code_postal" => $code,
            "ville" => $ville, "province" => $province, "telephone" => $telephone, "cv" => $cv, "mdp" => $mdp
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }
    public function delete($table, $obj, $id)
    {
        $sql = "delete from " . $table . " where id=:id;";
        $query = self::$_db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $data = array("id" => $id);
        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }

    public function deleteByField($table, $field, $id)
    {
        $sql = "delete from " . $table . " where ".$field."=".$id.";";
        $query = self::$_db->prepare($sql);
      //  $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $query->closeCursor();
    }

    public function getdocdep($table1, $table2, $table3, $obj)
    {
        $var = [];

        $sql = "SELECT dd.id,dd.id_dep,dd.id_doc,dp.nom_dep,dp.specialite, dp.lieu, dp.adresse, dc.nom, dc.prenom  
        FROM doctor_departement dd, doctor dc, departement dp
        Where dd.id_dep = dp.id AND dd.id_doc = dc.id;";
        $query = self::$_db->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
        $query->closeCursor();
    }

    public function getdoc_sans_dep($obj)
    {
        $var = [];
        $sql = "SELECT * FROM doctor WHERE ID NOT IN (SELECT id_doc FROM `doctor_departement`);";
        $query = self::$_db->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
            //var_dump($data);
        }
        return $var;
        $query->closeCursor();
    }

    public function getdoc_from_dep($id_dep)
    {
        $var = "<select id='id_medecin' name='id_medecin'>";
        $sql = "SELECT id,nom,prenom FROM doctor WHERE id IN (select id_doc FROM doctor_departement WHERE id_dep =".$id_dep.");";
        $query = self::$_db->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $var = $var.'<option value='.$data['id'].'>'.$data['nom'].' '.$data['prenom'].'</option>';;
            //var_dump($data);
        }
        echo  $var."</select>";
        var_dump($var);
        $query->closeCursor();
    }

    public function verifyAppointment($table, $id_patient, $id_medecin, $date, $heure)
    {
        $sql = "select * from " . $table . "  WHERE id_patient = '" . $id_patient . "'  and  heure_rendezvous = '" . $heure . "' 
        and date_rendezvous = '" . $date . "'";
        $query = self::$_db->prepare($sql);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->execute();
        $count = $query->rowCount();
        if ($count > 0) {
            return "Le patient a un rendez-vous à ce moment-là";
        }

        $sql = "select * from " . $table . "  WHERE id_medecin = '" . $id_medecin . "'  and  heure_rendezvous = '" . $heure . "' 
            and date_rendezvous = '" . $date . "'";
        $query = self::$_db->prepare($sql);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->execute();
        $count = $query->rowCount();
        if ($count > 0) {
            return "Le médecin a rendez-vous à ce moment-là";
        }
        return "";
    }




    public function addAppointment($table, $id_patient, $id_medecin, $date, $heure, $obj)
    {
        //   $id_patient = 3; // <--- COOKIE

        $sql = "insert into " . $table . " (id_patient,id_medecin,date_rendezvous,heure_rendezvous) values(?,?,?,?);";
        $query = self::$_db->prepare($sql);
        $query->execute([$id_patient, $id_medecin, $date, $heure]);

        $id_rendezvous = self::$_db->lastInsertId();
        $prix_rendezvous = floatval(10);

        $sql = "insert into invoice (id_rendezvous,prix_rendezvous) values(?,?);";
        $query = self::$_db->prepare($sql);
        $query->execute([$id_rendezvous, $prix_rendezvous]);
        $query->closeCursor();

        $data = array(
            "id_patient" => $id_patient, "id_medecin" => $id_medecin, "date_rendezvous" => $date,
            "heure_rendezvous" => $heure
        );

        $var = new $obj($data);
        return $var;
    }

    public function updateAppointment($table, $id_patient, $id_medecin, $date, $heure, $obj, $id)
    {
        if (isset($id_patient) && isset($id_medecin))
            $sql = "update " . $table . " set id_patient=?,id_medecin=?,date_rendezvous=?,heure_rendezvous=? where id=?";
        else
            $sql = "update " . $table . " set date_rendezvous=?, heure_rendezvous=? where id=?";

        $query = self::$_db->prepare($sql);

        if (isset($id_patient) && isset($id_medecin))
            $query->execute([$id_patient, $id_medecin, $date, $heure, $id]);
        else
            $query->execute([$date, $heure, $id]);

        $data = array(
            "id_patient" => $id_patient, "id_medecin" => $id_medecin, "date_rendezvous" => $date,
            "heure_rendezvous" => $heure, "id" => $id
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }

    public function updateInvoice($table, $id_rendezvous, $prix_rendezvous, $obj, $id)
    {
        $sql = "update " . $table . " set id_rendezvous=?, prix_rendezvous=? where id=?";
        $query = self::$_db->prepare($sql);
        $query->execute([$id_rendezvous, $prix_rendezvous, $id]);
        $data = array(
            "id_rendezvous" => $id_rendezvous, "prix_rendezvous" => $prix_rendezvous, "id" => $id
        );
        $var = new $obj($data);
        return $var;
        $query->closeCursor();
    }    


    public function addDocDep($table, $obj, $id_dep, $id_doc)
    {
        $sql = "insert into " . $table . " (id_dep,id_doc) values(?,?);";

        $query = self::$_db->prepare($sql);
        $query->execute([$id_dep, $id_doc]);

        $data = array("id_dep" => $id_dep, "id_doc" => $id_doc);

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }


    public function updateDocDep($table, $obj, $id_dep, $id_doc, $id)
    {
        $sql = "update " . $table . " set id_dep=?, id_doc=? where id=?;";

        $query = self::$_db->prepare($sql);
        $query->execute([$id_dep, $id_doc, $id]);
        $data = array("id_dep" => $id_dep, "id_doc" => $id_doc, "id" => $id);

        $var = new $obj($data);
        return $var;

        $query->closeCursor();
    }



    public function addDepartements($table, $nom_dep, $specialite, $lieu, $adresse, $code_postal, $obj)
    {
        $sql = "insert into " . $table . " (nom_dep,specialite,lieu,adresse,code_postal) 
        VALUES (?,?,?,?,?);";

        $query = self::$_db->prepare($sql);
        $query->execute([$nom_dep, $specialite, $lieu, $adresse, $code_postal]);

        $data = array(
            "nom_dep" => $nom_dep, "specialite" => $specialite, "lieu" => $lieu, "specialite" => $adresse,
            "code_postal" => $code_postal
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }
    public function updateDepartements($table, $nom_dep, $specialite, $lieu, $adresse, $code_postal, $obj, $id)
    {
        $sql = "update " . $table . " set nom_dep=?,specialite=?,lieu=?,adresse=?,code_postal=? 
        where id=?";

        $query = self::$_db->prepare($sql);
        $query->execute([$nom_dep, $specialite, $lieu, $adresse, $code_postal, $id]);

        $data = array(
            "nom_dep" => $nom_dep, "specialite" => $specialite, "lieu" => $lieu, "specialite" => $adresse,
            "code_postal" => $code_postal
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }
    public function addPatients($table, $nom, $prenom, $ddn, $email, $adresse, $code, $ville, $province, $telephone, $description, $mdp, $obj)
    {
        $sql = "insert into " . $table . " (nom,prenom,date_naissance,email,adresse,code_postal,ville,province,telephone,description,mdp) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?);";
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT, array("cost" => 10));
        $query = self::$_db->prepare($sql);
        $query->execute([$nom, $prenom, $ddn, $email, $adresse, $code, $ville, $province, $telephone, $description, $mdp_hash]);

        $data = array(
            "nom" => $nom, "prenom" => $prenom, "date_naissance" => $ddn,
            "email" => $email, "adresse" => $adresse, "code_postal" => $code,
            "ville" => $ville, "province" => $province, "telephone" => $telephone, "description" => $description, "mdp" => $mdp
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }
    public function updatePatients($table, $nom, $prenom, $ddn, $email, $adresse, $code, $ville, $province, $telephone, $description, $obj, $id)
    {
        $sql = "update " . $table . " set nom=?, prenom=?, date_naissance=?,
        email=?,adresse=?,code_postal=?,ville=?,province=?,telephone=?,description=?
        where id=?;";

        $query = self::$_db->prepare($sql);
        $query->execute([$nom, $prenom, $ddn, $email, $adresse, $code, $ville, $province, $telephone, $description, $id]);

        $data = array(
            "nom" => $nom, "prenom" => $prenom, "date_naissance" => $ddn,
            "email" => $email, "adresse" => $adresse, "code_postal" => $code,
            "ville" => $ville, "province" => $province, "telephone" => $telephone, "description" => $description
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }
    public function addEmployes($table, $nom, $prenom, $ddn, $fonction, $photo, $email, $adresse, $code, $ville, $province, $telephone, $cv, $mdp, $obj)
    {
        $sql = "insert into " . $table . " (nom,prenom,date_naissance,fonction,photo,email,adresse,code_postal,ville,province,telephone,cv,mdp) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT, array("cost" => 10));
        $query = self::$_db->prepare($sql);
        $query->execute([$nom, $prenom, $ddn, $fonction, $photo, $email, $adresse, $code, $ville, $province, $telephone, $cv, $mdp_hash]);

        $data = array(
            "nom" => $nom, "prenom" => $prenom, "date_naissance" => $ddn,
            "email" => $email, "fonction" => $fonction, "adresse" => $adresse, "code_postal" => $code,
            "ville" => $ville, "province" => $province, "telephone" => $telephone, "cv" => $cv, "mdp" => $mdp
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }
    public function updateEmployes($table, $nom, $prenom, $ddn, $fonction, $email, $adresse, $code, $ville, $province, $telephone, $obj, $id)
    {
        $sql = "update " . $table . " set nom=?, prenom=?, date_naissance=?, fonction=?,
        email=?,adresse=?,code_postal=?,ville=?,province=?,telephone=?
        where id=?;";

        $query = self::$_db->prepare($sql);
        $query->execute([$nom, $prenom, $ddn, $fonction, $email, $adresse, $code, $ville, $province, $telephone, $id]);

        $data = array(
            "nom" => $nom, "prenom" => $prenom, "date_naissance" => $ddn, "fonction" => $fonction,
            "email" => $email, "adresse" => $adresse, "code_postal" => $code,
            "ville" => $ville, "province" => $province, "telephone" => $telephone
        );

        $var = new $obj($data);

        return $var;

        $query->closeCursor();
    }
}
