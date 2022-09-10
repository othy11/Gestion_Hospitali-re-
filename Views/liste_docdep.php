<?php
$this->_t = "Liste des médecins à l'hôpital";
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



<div class="col-10 table-responsive">
  <br>
  <a href="/HMS_PROJECT/ajout_docdep" class="btn btn-info float-right"><i class="fas fa-plus-square"></i></a>
  <br>
  <table class="table table-bordered">
    <thead>
      <tr class="table-primary">
        <th scope="col">Nom complet</th>
        <th scope="col">Département</th>
        <th scope="col">Adresse</th>
        <th scope="col">Ville</th>
        <th scope="col">Spécialité</th>
        <th></th>
      </tr>
    </thead>
    <?php
    foreach ($doctor_departement as $d) {
    ?>
      <tbody>
        <tr>
          <td>Dr. <?= $d->nom() ?> <?= $d->nom() ?></td>
          <td><?= $d->nom_dep() ?></td>
          <td><?= $d->adresse() ?></td>
          <td><?= $d->lieu() ?></td>
          <td><?= $d->specialite() ?></td>
          <td>
            <a href="http://localhost/HMS_PROJECT/index.php?url=delete_docdep&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><i class="fas fa-trash-alt"></i></a>
            <a href="http://localhost/HMS_PROJECT/index.php?url=modif_docdep&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;"><i class="fas fa-pen-square"></i></a>
          </td>
        </tr>
      </tbody>
    <?php
    }
    ?>
  </table>

  <br>
  <br>

  <table class="table table-bordered">
    <thead>
      <tr class="table-primary">
        <th scope="col">
          <h4>Médecins sans service</h4>
        </th>
        <th scope="col">
          <h4>Liste des cliniques</h4>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="col">
            <table class="table table-bordered">
              <tbody>
                <?php
                $tmp = 0;
                foreach ($doctor as $dc) {
                ?>
                  <tr>
                    <td>Dr. <?= $dc->nom() ?> <?= $dc->nom() ?></td>
                    <?php
                    $tmp++;
                    ?>
                  </tr>
                  
              </tbody>
            <?php
                }
                  if ($tmp == 0) {
                  ?>
                    <tr>
                      <td><b>Tous les médecins sont associés à une clinique</b></td>
                    </tr>
                  <?php
                  }
                  ?>
            </table>
          </div>
        </td>
        <td>
          <div class="col">
            <table class="table table-bordered">
              <?php
              foreach ($departement as $dp) {
              ?>
                <tbody>
                  <tr>
                    <td><?= $dp->nom_dep() ?></td>
                  </tr>
                </tbody>
              <?php
              }
              ?>
            </table>

          </div>
        </td>
      </tr>
    </tbody>
  </table>



</div>