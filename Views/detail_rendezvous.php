<?php
$this->_t = "Détail du rendez-vous";
        ?>
<?php
include("Public/sidebar.php");
?>
<div class="col-10 table-responsive">
  <p class="h3"><?php echo ($this->_usr);
                echo (" > "); ?>
    <small class="text-muted"> <?php echo ($this->_name); ?> </small></h3>
  <h2><?php echo ($this->_t)   ?></h2>
</div>

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
          <div class="col-md-12" align="center">
          <table class="table">
          <tbody>
            <tr>
                <th>Nom complet du patient</th>
                <td><?=$appointment->id_patient()?> </td>
            </tr>
            <tr>
                <th>Nom complet du médecin</th>
                <td>Dr. <?=$appointment->id_medecin()?></td>
            </tr>
            <tr>
                <th>Date du rendez-vous</th>
                <td><?=$appointment->date_rendezvous()?></td>
            </tr>
            <tr>
                <th>Heure du rendez-vous</th>
                <td><?=$appointment->heure_rendezvous()?></td>
            </tr>
            <?php
                if(1)
                {
                    echo "<h4>Le lieu du rendez-vous n'est pas encore confirmé</h4>";
                }
                else
                {
                    ?>
                <tr>
                <th>Département</th>
                <td><?=$appointment->heure_rendezvous()?></td>
                </tr></tr>
                <th>Adresse</th>
                <td><?=$appointment->heure_rendezvous()?></td>
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
