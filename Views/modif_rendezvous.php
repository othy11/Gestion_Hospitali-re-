<?php $this->_t = "Modification du Rendez vous" ?>
<?php
include("Public/sidebar.php");
?>
<div class="col-10 table-responsive">
  <p class="h3"><?php echo ($this->_usr);
                echo (" > "); ?>
    <small class="text-muted"> <?php echo ($this->_name); ?> </small></h3>
  <h2><?php echo ($this->_t)   ?></h2>
</div>
<form method="post" class="form-group container jumbotron" id="form" enctype="multipart/form-data">
    <label for="id_patient">Patient<b style="color:red;">*</b></label>
    <div class="row">
        <div class="col">
             <input value="<?= $patient->nom() ?> <?= $patient->prenom()?>" disabled> </label>
        </div>
    </div>
    <br>
    <label for="id_medecin">Medecin <b style="color:red;">*</b></label>
    <div class="row">
        <div class="col">
                 <input value="Dr. <?= $medecin->nom() ?> <?= $medecin->prenom()?>" disabled> </label>
            </select>
        </div>
    </div>
    <br>
    <table class="table" style="text-align: center;">
        <thead class="thead-light">
            <tr>
                <th scope="col" colspan="4" style="text-align: center;">Matin</th>
                <th scope="col" colspan="1">Midi</th>
                <th scope="col" colspan="4" style="text-align: center;">Après-mido</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < 3; $i++) {
            ?>
                <tr>
                    <?php
                    for ($j = 8; $j < 17; $j++) {
                    ?>
                        <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons" required>
                                <label class="btn btn-info">
                                    <input type="radio" name="heure_rendezvous" autocomplete="off" 
                                    value="<?= $j ?>:<?= ($i * 20) == 0 ? "00" : ($i * 20) ?>"
                                    ><?= $j ?>:<?= ($i * 20) == 0 ? "00" : ($i * 20) ?>
                                </label>
                            </div>
                        </td>
                    <?php
                    }
                    ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <label for="date_rendezvous">Date <b style="color:red;">*</b></label>
    <div class="row">
        <div class="col-6">
            <input type="date" class="form-control" placeholder="Date de Rendez vous" id="date_rendezvous" name="date_rendezvous" 
                value="<?= $rendezvous->date_rendezvous() ?>" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-2 text-left">
            <a href="/HMS_PROJECT/liste_rendezvous" class="btn btn-info " style="padding: 6px 50px 6px 50px">Retour</a>
        </div>
        <div class="col-xs-2 text-right">
            <input type="submit" class="btn btn-info" name="update" value="Mettre à jour">
        </div>
    </div>
</form>