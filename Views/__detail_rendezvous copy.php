<?php
$this->_t = "Détail du rendez-vous";

try{
    $pdo = new PDO("mysql:host=localhost;dbname=system_hopital;charset=utf8","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

    foreach($appointment as $d):
        $sql1 = "SELECT nom,prenom FROM doctor WHERE id = ".$d->id_medecin().";";
        $sql2 = "SELECT nom,prenom FROM patient WHERE id = ".$d->id_patient().";";
        $sql3 = "SELECT * from doctor_departement inner join doctor inner join departement on (doctor.id = doctor_departement.id_doc)
        and (departement.id = doctor_departement.id_doc) WHERE doctor.id = ".$d->id_medecin().";";
        $stmt1 = $pdo->prepare($sql1);
        $stmt2 = $pdo->prepare($sql2);
        $stmt3 = $pdo->prepare($sql3);
        $stmt1->execute();
        $stmt2->execute();
        $stmt3->execute();
        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);

        ?>
        <style>
          .container{
            border-style:none;
            border-radius:10px;
            background-color:rgb(209, 255, 255)
          }
          .card-img-top{

          }
        </style>
        <br><br>
        <div class="container" align="center" style="width:50%;">
          <br>
        <div class="row">
       <?= $appointment->id_patient() ?>  
          <div class="col-md-12" align="center">
          <table class="table">
          <tbody>
            <tr>
                <th>Nom complet du patient</th>
                <td><?=$appointment->id_patient()?> <?=$row2["prenom"]?></td>
            </tr>
            <tr>
                <th>Nom complet du médecin</th>
                <td>Dr. <?=$row1["nom"]?> <?=$row1["prenom"]?></td>
            </tr>
            <tr>
                <th>Date du rendez-vous</th>
                <td><?=$d->date_rendezvous()?></td>
            </tr>
            <tr>
                <th>Heure du rendez-vous</th>
                <td><?=$d->heure_rendezvous()?></td>
            </tr>
            <?php
                if(empty($row3))
                {
                    echo "<h4>Le lieu du rendez-vous n'est pas encore confirmé</h4>";
                }
                else
                {
                    ?>
                <tr>
                <th>Département</th>
                <td><?=$row3["nom_dep"]?></td>
                </tr></tr>
                <th>Adresse</th>
                <td><?=$row3["adresse"]?></td>
            </tr>
                    <?php
                }
            ?>
            
            
          </tbody>
        </table>
        <a href="/HMS_PROJECT/liste_rendezvous"><button class="btn btn-info">Retour</button></a>
          </div>
            </div>
            <br>
            </div>
        
<?php
    endforeach;
?>