<?php
$this->_t = "Détail du patient";

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
            border-style:none;
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
              <td><?=$patient->prenom()?> <?=$patient->nom()?></td>
            </tr>
            <tr>
              <th>Date de naissance</th>
              <td><?=$patient->date_naissance()?></td>
            </tr>
            <tr>
              <th>Adresse Email</th>
              <td><?=$patient->email()?></td>
            </tr>
            <tr>
              <th>Adresse Courriel</th>
              <td><?=$patient->adresse()?>, <?=$patient->code_postal()?>, <?=$patient->ville()?>, <?=$patient->province()?></td>
            </tr>
            <tr>
              <th>Numéro de téléphone</th>
              <td><?=$patient->telephone()?></td>
            </tr>
            <tr>
              <th>Cause du rendez-vous</th>
              <td><?=$patient->description()?></td>
            </tr>
          </tbody>
        </table>
        <a href="/HMS_PROJECT/liste_patient"><button class="btn btn-info">Retour</button></a>
          </div>
            </div>
            <br>
            </div>
        
