<?php $this->_t = "Modification du département" ?>
<?php
include("Public/sidebar.php");
?>
<div class="col-10 table-responsive">
  <p class="h3"><?php echo ($this->_usr);
                echo (" > "); ?>
    <small class="text-muted"> <?php echo ($this->_name); ?> </small></h3>
  <h2><?php echo ($this->_t)   ?></h2>
</div>
<br>
<form method="post" class="form-group container jumbotron" id="form" enctype="multipart/form-data">
    <label for="nomdep">Nom du Département<b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nom du département" id="nom_dep" value="<?php echo($departement->nom_dep());?>" name="nom_dep" required>
            </div>
        </div>
        <br>
        <label for="specialite">Spécialité <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Spécialité" id="specialite" value="<?php echo($departement->specialite());?>" name="specialite" required>
            </div>
        </div>
        <br>
        <label for="adresse">Adresse courriel <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Adresse courriel" id="adresse" value="<?php echo($departement->adresse());?>" name="adresse" required>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Ville" id="lieu" name="lieu" value="<?php echo($departement->lieu());?>" required>
            </div>
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Code Postal" id="code_postal" value="<?php echo($departement->code_postal());?>" name="code_postal">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <a href="/HMS_PROJECT/liste_dep" class="btn btn-info">Retour</a>
            </div>
            <div class="col-6">
            </div>
            <div class="col-3">
                <input type="submit" class="btn btn-info" name="update" value="Mettre à jour">
            </div>
        </div>
</form>