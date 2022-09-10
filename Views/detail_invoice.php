<?php
$this->_t = "Liste des factures";
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
  <h3><?= $title ?></h3>
  <a href="http://localhost/HMS_PROJECT/liste_invoice" id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><h4> &nbsp;&nbsp;&nbsp; <i class="fas fa-arrow-left"></i> Retour à la liste générale</h4></a>
  
  <br>
  <table class="table table-bordered">
    <thead>
      <tr class="table-primary">
        <th scope="col"><?= $menu[0] ?></th>
        <th scope="col"><?= $menu[1] ?></th>
        <th scope="col"><?= $menu[2] ?></th>
        <th scope="col"><?= $menu[3] ?></th>
        <th></th>
      </tr>
    </thead>
    <?php

    foreach ($invoice as $d) {

    ?>
      <tbody>
        <tr>
          <?php
          if ($user == "doctor") { ?>
            <td><?= $d->nom_d() . " " . $d->prenom_d() ?></td>
            <td><?= $d->nom_p() . " " . $d->prenom_p() ?></td>

          <?php } else { ?>
            <td><?= $d->nom_p() . " " . $d->prenom_p() ?></td>
            <td><?= $d->nom_d() . " " . $d->prenom_d() ?></td>
          <?php } ?>
          <td><?= $d->date_rv() ?></td>
          <td><?= $d->prix_rv() ?></td>
          <td>
        <!--    <a href="http://localhost/HMS_PROJECT/index.php?url=detail_invoice&id= $d->id_p(); " id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><i class="fas fa-info-circle"></i> </a> -->
        <!--    <a href="http://localhost/HMS_PROJECT/index.php?url=delete_invoice&id=  " id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><i class="fas fa-trash-alt"></i></a> -->
            <a href="http://localhost/HMS_PROJECT/index.php?url=modif_invoice&id=<?= $d->id_rv(); ?>" id="link" style="text-decoration:none;"><i class="fas fa-pen-square"></i></a>
          </td>
        </tr>
      </tbody>


    <?php
    }
    ?>
  </table>
</div>