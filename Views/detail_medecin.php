<?php
$this->_t = "Détail du médecin";

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
  .container {
    border-style: none;
    border-radius: 10px;
    background-color: rgb(209, 255, 255)
  }

  .card-img-top {
    border-style: none;
  }
</style>
<br><br>
<div class="container">
  <br>
  <div class="row">
    <div class="col-md-4">
      <img class="img-rounded" src="./Public/img/data/<?= $doctor->photo() ?>" style="width:100%;height:100%" alt="Dr.<?= $doctor->prenom() ?> <?= $doctor->nom() ?>">
    </div>
    <div class="col-md-8">
      <table class="table">
        <tbody>
          <tr>
            <th>Nom complet du médecin</th>
            <td>Dr.<?= $doctor->prenom() ?> <?= $doctor->nom() ?></td>
          </tr>
          <tr>
            <th>Date de naissance</th>
            <td><?= $doctor->date_naissance() ?></td>
          </tr>
          <tr>
            <th>Adresse Email</th>
            <td><?= $doctor->email() ?></td>
          </tr>
          <tr>
            <th>Adresse Courriel</th>
            <td><?= $doctor->adresse() ?>, <?= $doctor->code_postal() ?>, <?= $doctor->ville() ?>, <?= $doctor->province() ?></td>
          </tr>
          <tr>
            <th>Numéro de téléphone</th>
            <td><?= $doctor->telephone() ?></td>
          </tr>
          <tr>
            <th>CV</th>
            <td><a href="./Public/doc/<?= $doctor->cv() ?>" target="_blank"><button class="btn btn-info"><?= $doctor->cv() ?></button></a></td>
          </tr>
        </tbody>
      </table>
      <a href="/HMS_PROJECT/liste_medecin"><button class="btn btn-info">Retour</button></a>
    </div>
  </div>
  <br>
</div>