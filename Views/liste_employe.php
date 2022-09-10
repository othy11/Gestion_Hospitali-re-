<?php
$this->_t = "Liste des employés";
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
  <a href="/HMS_PROJECT/ajout_employe" class="btn btn-info float-right"><i class="fas fa-plus-square"></i></a>
  <br>
  <table class="table table-bordered">
    <thead>
      <tr class="table-primary">
        <th></th>
        <th scope="col">Nom complet</th>
        <th scope="col">Email</th>
        <th scope="col">telephone</th>
        <th scope="col">branche</th>
        <th></th>
      </tr>
    </thead>
    <?php
    foreach ($employe as $d) :
    ?>
      <tbody>
        <tr>
          <td style="width:8%;"> <img src="./Public/img/data/<?= $d->photo(); ?>" alt="N/A" class="img-thumbnail" style="width:80px;height:80px;" /></td>
          <td><?= $d->prenom(); ?> <?= $d->nom(); ?></td>
          <td><?= $d->email(); ?></td>
          <td><?= $d->telephone(); ?></td>
          <td><?= $d->fonction(); ?></td>
          <td>
            <a href="http://localhost/HMS_PROJECT/index.php?url=detail_employe&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;"><i class="fas fa-info-circle"></i> </a>
            <a href="http://localhost/HMS_PROJECT/index.php?url=delete_employe&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><i class="fas fa-trash-alt"></i></a>
            <a href="http://localhost/HMS_PROJECT/index.php?url=modif_employe&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;"><i class="fas fa-pen-square"></i></a>
          </td>
        </tr>
      </tbody>


    <?php
    endforeach;
    ?>
  </table>
</div>