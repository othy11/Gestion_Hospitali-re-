<br>
<?php $this->_t = "Modification de l'infirmier" ?>
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
    <label for="nomcomplet">Nom complet <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nom" id="nom" value="<?php echo($nurse->nom());?>" name="nom" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Prénom" id="prenom" value="<?php echo($nurse->prenom());?>" name="prenom" required>
            </div>
        </div>
        <br>
        <label for="datenaissance">Date de naissance <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="date" class="form-control" placeholder="Date de naissance" id="ddn" value="<?php echo($nurse->date_naissance());?>" name="ddn" required>
            </div>
        </div>
        <br>
        <label for="email">Adresse Email <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="email" class="form-control" placeholder="Adresse Email" id="email" value="<?php echo($nurse->email());?>" name="email" required>
            </div>
        </div>
        <br>
        <label for="adresse">Adresse courriel <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Adresse courriel" id="adresse" value="<?php echo($nurse->adresse());?>" name="adresse" required>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Ville" id="ville" value="<?php echo($nurse->ville());?>" name="ville" required>
            </div>
            <div class="col-2">
                <select class="form-control" name="province" required>
                    <option value="AB" <?php echo($nurse->province()=="AB"? "selected":"");?>>Alberta</option>
                    <option value="BC" <?php echo($nurse->province()=="BC"? "selected":"");?>>Colombie-Britanique</option>
                    <option value="PE" <?php echo($nurse->province()=="PE"? "selected":"");?>>Île-Du-Prince-Édouard</option>
                    <option value="MB" <?php echo($nurse->province()=="MB"? "selected":"");?>>Manitoba</option>
                    <option value="NB" <?php echo($nurse->province()=="NB"? "selected":"");?>>Nouveau-Brunswick</option>
                    <option value="NS" <?php echo($nurse->province()=="NS"? "selected":"");?>>Nouvelle-Écosse</option>
                    <option value="NU" <?php echo($nurse->province()=="NU"? "selected":"");?>>Nunavut</option>
                    <option value="ON" <?php echo($nurse->province()=="ON"? "selected":"");?>>Ontario</option>
                    <option value="QC" <?php echo($nurse->province()=="QC"? "selected":"");?>>Québec</option>
                    <option value="SK" <?php echo($nurse->province()=="SK"? "selected":"");?>>Sackatchewan</option>
                    <option value="NL" <?php echo($nurse->province()=="NL"? "selected":"");?>>Terre-Neuve-et-Labrador</option>
                    <option value="NT" <?php echo($nurse->province()=="NT"? "selected":"");?>>Territoires du Nord-Ouest</option>
                    <option value="YK" <?php echo($nurse->province()=="YK"? "selected":"");?>>Yukon</option>
                </select>
            </div>
        </div>
        <br>
        <label for="telephone">Code Postal <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Code Postal" id="code_postal" value="<?php echo($nurse->code_postal());?>" name="code_postal" required>
            </div>
        </div>
        <br>
        <label for="telephone">Numéro cellulaire <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Numéro cellulaire" id="telephone" value="<?php echo($nurse->telephone());?>" name="telephone" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <a href="/HMS_PROJECT/liste_infirmier" class="btn btn-info">Retour</a>
            </div>
            <div class="col-6">
            </div>
            <div class="col-3">
                <input type="submit" class="btn btn-info" name="update" value="Mettre à Jour">
            </div>
        </div>
</form>