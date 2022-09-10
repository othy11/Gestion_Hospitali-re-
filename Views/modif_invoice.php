<br>
<?php $this->_t = "Modification du Paiement" ?>
<?php include("Public/sidebar.php"); ?>
<div class="col-10 table-responsive">
    <p class="h3"><?php echo ($this->_usr);
                    echo (" > "); ?>
        <small class="text-muted"> <?php echo ($this->_name); ?> </small></h3>
    <h2><?php echo ($this->_t)   ?></h2>
</div>
<form method="post" class="form-group container jumbotron" id="form" enctype="multipart/form-data">
    <label for="datenaissance">Code de Rendez-Vous <b style="color:red;">*</b></label>
    <div class="row">
        <div class="col">
            <input class="form-control" id="id_rendezvous" value="<?= $invoice->id_rendezvous() ?>" name="id_rendezvous" disabled>
            <input type="hidden" name="id_rendezvous" value="<?= $invoice->id_rendezvous() ?>">
        </div>
    </div>
    <br>

    <label for="datenaissance">Prix ​​du Rendez-Vous <b style="color:red;">*</b></label>
    <div class="row">
        <div class="col">
            <input class="form-control" placeholder="Prix" id="prix_rendezvous" value="<?= $invoice->prix_rendezvous() ?>" name="prix_rendezvous" required>
        </div>
    </div>
    <br>
    <input type="hidden" name="id" value="<?= $invoice->id() ?>">




    <br>
    <div class="row">
    <div class="col-6">
        </div>    
    <div class="col-3">
            <a href="/HMS_PROJECT/detail_invoice&&opt=patient&id=<?= $Appo->id_patient(); ?>" class="btn btn-info">Retour</a>
        </div>
        <div class="col-6">
        </div>
        <div class="col-3">
            <input type="submit" class="btn btn-info" name="update" value="Mettre à jour">
        </div>
    </div>
</form>