<?php
$this->_t = "Liste des département";
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
  <a href="/HMS_PROJECT/ajout_dep" class="btn btn-info float-right"><i class="fas fa-plus-square"></i></a>
  <br>
  <table class="table table-bordered">
    <thead>
      <tr class="table-primary">
        <th scope="col">Nom du Département</th>
        <th scope="col">Adresse</th>
        <th scope="col">Ville</th>
        <th scope="col">Spécialité</th>
        <th scope="col">Code Postal</th>
        <th></th>
      </tr>
    </thead>
    <?php
    foreach ($departement as $d) {
    ?>
      <tbody>
        <tr>
          <td><?= $d->nom_dep() ?></td>
          <td><?= $d->adresse() ?></td>
          <td><?= $d->lieu() ?></td>
          <td><?= $d->specialite() ?></td>
          <td><?= $d->code_postal() ?></td>
          <td>
            <a href="http://localhost/HMS_PROJECT/index.php?url=delete_dep&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><i class="fas fa-trash-alt"></i></a>
            <a href="http://localhost/HMS_PROJECT/index.php?url=modif_dep&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;"><i class="fas fa-pen-square"></i></a>
          </td>
        </tr>
      </tbody>


    <?php
    }
    ?>
  </table>
</div>