<br>
<?php $this->_t = "Insertion du médecin à l'hôpital" ?>
<?php
include("Public/sidebar.php");
?>
<div class="col-10 table-responsive">
  <p class="h3"><?php echo ($this->_usr);
                echo (" > "); ?>
    <small class="text-muted"> <?php echo ($this->_name); ?> </small></h3>
  <h2><?php echo ($this->_t)   ?></h2>
</div>

<form method="post" class="form-group container jumbotron" id="form"  align="center">
        <div class="row">
        <label for="nomcomplet">Nom complet du médecin <b style="color:red;">*</b></label>
            <div class="col">
                <select name="id_doc">
                    <?php foreach($doctor as $do): ?>
                        <option value="<?=$do->id()?>">Dr.<?= $do->prenom(); ?> <?= $do->nom(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label for="nomdep">Hôpital <b style="color:red;">*</b></label>
            <div class="col">
                <select name="id_dep">
                <?php foreach($departement as $de): ?>
                        <option value="<?=$de->id()?>"><?= $de->nom_dep()?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <a href="/HMS_PROJECT/liste_docdep" class="btn btn-info">Retour</a>
            </div>
            <div class="col-6">
            </div>
            <div class="col-3">
                <input type="submit" class="btn btn-info" name="add" value="Ajouter">
                <?php
                 if(isset($_POST["add"]))
                 {
                     echo "<script>window.location.href = '/HMS_PROJECT/liste_docdep';</script>";
                 }
                 ?>
            </div>
        </div>
</form>