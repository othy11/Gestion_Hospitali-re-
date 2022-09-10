<?php
$this->_t = "Liste des rendez-vous";
?>
<?php include("Public/sidebar.php"); ?>

<div class="col-10 table-responsive">
  <p class="h3"><?php echo ($this->_usr);
                echo (" > "); ?>
    <small class="text-muted"> <?php echo ($this->_name); ?> </small></h3>
  <h2><?php echo ($this->_t)   ?></h2>
</div>
<div class="col-10 table-responsive">

  <?php if (isset($_COOKIE["adminemail"])) { ?>


    <a href="/HMS_PROJECT/liste_rendezvous&qry=patient" class="btn <?= $qry == "patient" ? "btn-primary" : "btn-info"; ?> float-right"><i class="fas fa-hospital-user"></i> Patients</a>
    <a href="/HMS_PROJECT/liste_rendezvous&qry=doctor" class="btn <?= $qry == "doctor" ? "btn-primary" : "btn-info"; ?> float-right"><i class="fas fa-user-md"></i> Medicin</a>
    <!-- <a href="/HMS_PROJECT/liste_rendezvous&qry=lieux" class="btn < ?= $qry=="lieux"?"btn-primary":"btn-info"; ?> float-right"><i class="fas fa-hospital"></i> Lieux</a> -->
    <br>
    <p class="h4">Ajouter rendez-vous
      <a href="/HMS_PROJECT/ajout_rendezvous" class="btn btn-info float-right"><i class="fas fa-plus-square"></i></a>
    </p>
  <?php } ?>
  <h3><b>Rendez-vous programmés</b></h3>
  <table class="table table-bordered">
    <thead>
      <tr class="table-primary">
        <th scope='col'><?= $qry == "doctor" ? "Pris avec" : "Pris par" ?></th>
        <th scope="col">Date du rendez-vous</th>
        <th scope="col">Heure du rendez-vous</th>
        <th></th>
      </tr>
    </thead>
    <?php
    foreach ($newApp as $d) {
    ?>
      <tbody>
        <tr>
          <td><?= $qry == "patient" ? "" : "Dr." ?> <?= $d->nom() ?> <?= $d->prenom() ?></td>
          <td><?= $d->date_rendezvous() ?></td>
          <td><?= $d->heure_rendezvous() ?></td>
          <td>
            <a href="http://localhost/HMS_PROJECT/index.php?url=detail_rendezvous&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;"><span title="Information"><i class="fas fa-info-circle"></i></span> </a>
            <?php if (!isset($_COOKIE["patientemail"])) { ?>

              <a href="http://localhost/HMS_PROJECT/index.php?url=delete_rendezvous&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;"><span title="Effacer"><i class="fas fa-trash-alt"></i></span></a>
              <a href="http://localhost/HMS_PROJECT/index.php?url=modif_rendezvous&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;"><span title="Reprogrammer"><i class="fas fa-pen-square"></i></span></a>
              <a href="http://localhost/HMS_PROJECT/index.php?url=modif_paiement&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;"><span title="Paiement"><i class="fas fa-dollar-sign"></i></span></a>
            <?php } ?>
          </td>
        </tr>
      </tbody>
    <?php
    }
    ?>
  </table>

  <h3><b>Enregistrement</b></h3>
  <table class="table table-bordered">
    <thead>
      <tr class="table-primary">
        <th scope='col'><?= $qry == "doctor" ? "Pris avec" : "Pris par" ?></th>
        <th scope="col">Date du dernier rendez-vous</th>
        <th scope="col">Quantité de rendez-vous</th>
        <th></th>
      </tr>
    </thead>
    <?php

    foreach ($oldApp as $d) {
    ?>
      <tbody>
        <tr>
          <td><?= $qry == "patient" ? "" : "Dr." ?> <?= $d->nom() ?> <?= $d->prenom() ?></td>
          <td><?= $d->dernier_rv() ?></td>
          <td><?= $d->qte_rv() ?></td>
          <td>
            <a href="http://localhost/HMS_PROJECT/index.php?url=detail_rendezvous&id=<?= $d->id(); ?>" id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><i class="fas fa-info-circle"></i> </a>
          </td>
        </tr>
      </tbody>
    <?php
    }
    ?>
  </table>
</div>