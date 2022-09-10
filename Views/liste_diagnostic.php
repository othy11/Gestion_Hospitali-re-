<?php
$this->_t = "Liste des patients et diagnostics";
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
    <a href="/HMS_PROJECT/ajout_patient" class="btn btn-info float-right"><i class="fas fa-plus-square"></i></a>
    <br>
  <table class="table table-bordered">
  <thead>
    <tr class="table-primary">
      <th scope="col" style=" width: 120px;">Nom complet</th>
      <th scope="col" style=" width: 50px;">Date de naissance</th>
      <th scope="col" style=" width: 300px; text-align:center;"  >Observations</th>
      <th style=" width: 50px;"></th>
    </tr>
  </thead>
<?php
foreach($patient as $d): 
?>
  <tbody>
    <tr>
      <td><?= $d->prenom(); ?> <?= $d->nom(); ?></td>
      <td><?= $d->date_naissance(); ?></td>
      <td><?= $d->description(); ?></td>
      <td>
          <a href="http://localhost/HMS_PROJECT/index.php?url=diagnostic&id=<?=$d->id();?>" id="link" style="text-decoration:none;"><i class="fas fa-pen-square"></i></a>
      </td>
    </tr>
  </tbody>


<?php
    endforeach;
?>
</table>
</div>