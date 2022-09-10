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
  <br>
  <a href="/HMS_PROJECT/liste_invoice&qry=patient" class="btn <?= $qry=="patient"?"btn-primary":"btn-info"; ?> float-right"><i class="fas fa-hospital-user"></i> Patients</a>
  <a href="/HMS_PROJECT/liste_invoice&qry=doctor" class="btn <?= $qry=="doctor"?"btn-primary":"btn-info"; ?> float-right"><i class="fas fa-user-md"></i> Medicin</a>
 <!-- <a href="/HMS_PROJECT/liste_invoice&qry=date" class="btn  $qry=="date"?"btn-primary":"btn-info";  float-right"><i class="fas fa-calendar-alt"></i></i> Mois</a> -->

  <br>
  <table class="table table-bordered">
    <thead>
    <tr class="table-primary">
        <th scope="col"><?= $menu[0] ?></th>
        <th scope="col"><?= $menu[1] ?></th>
        <th scope="col"><?= $menu[2] ?></th>
        <?php
          if ($qry == "date") { ?>
        <th scope="col"><?= $menu[4] ?></th>
        <?php } ?>
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
          if ($qry == "doctor") { ?>
            <td><?= $d->nom_d() . " " . $d->prenom_d() ?></td>
            <td><?= $d->nom_p() . " " . $d->prenom_p() ?></td>

          <?php } else { ?>
            <td><?= $d->nom_p() . " " . $d->prenom_p() ?></td>
            <td><?= $d->nom_d() . " " . $d->prenom_d() ?></td>
          <?php } ?>
          <td><?= $d->n_rv() ?></td>
          <?php
          if ($qry == "date") { ?>
          <td><?= $d->date_rv() ?></td>
          <?php } ?>
          <td><?= $d->prix_rv() ?></td>
          <td>
            <?php if($qry =="doctor"){ ?>
              <a href="http://localhost/HMS_PROJECT/index.php?url=detail_invoice&opt=<?= $qry ?>&id=<?= $d->id_d(); ?>" id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><i class="fas fa-info-circle"></i> </a>
            <?php } ?>
            <?php if($qry =="patient"){ ?>
              <a href="http://localhost/HMS_PROJECT/index.php?url=detail_invoice&opt=<?= $qry ?>&id=<?= $d->id_p(); ?>" id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><i class="fas fa-info-circle"></i> </a>
            <?php } ?>
            <?//php if($qry =="date"){ ?>
             <!-- <a href="http://localhost/HMS_PROJECT/index.php?url=detail_invoice&opt= $qry &id=  $d->date_rv(); " id="link" style="text-decoration:none;" id="link" style="text-decoration:none;"><i class="fas fa-info-circle"></i> </a> -->
            <?php // } ?>
           </td>
        </tr>
      </tbody>
    <?php
    }
    ?>
  </table>
  <?php 
      $total = 0;
      foreach ($invoice as $d) {
        $total+= $d->prix_rv();
      }
  ?>
  <h4 style='text-align:right' >Total Invoice :<?= $total ?>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;</h4>
</div>