<br>
<?php $this->_t = "Modification du patient" ?>
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
                <input type="text" class="form-control" placeholder="Nom" id="nom" value="<?php echo($patient->nom());?>" name="nom" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Prénom" id="prenom" value="<?php echo($patient->prenom());?>" name="prenom" required>
            </div>
        </div>
        <br>
        <label for="datenaissance">Date de naissance <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="date" class="form-control" placeholder="Date de naissance" id="ddn" value="<?php echo($patient->date_naissance());?>" name="ddn" required>
            </div>
        </div>
        <br>
        <label for="email">Adresse Email <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="email" class="form-control" placeholder="Adresse Email" id="email"  value="<?php echo($patient->email());?>"name="email" required>
            </div>
        </div>
        <br>
        <label for="adresse">Adresse courriel <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Adresse courriel" id="adresse"  value="<?php echo($patient->adresse());?>"name="adresse" required>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Ville" id="ville" value="<?php echo($patient->ville());?>" name="ville" required>
            </div>
            <div class="col-2">
                <select class="form-control" name="province" placeholder="Province" required>
                    <option value="AB" <?php echo($patient->province()=="AB"? "selected":"");?>>Alberta</option>
                    <option value="BC" <?php echo($patient->province()=="BC"? "selected":"");?>>Colombie-Britanique</option>
                    <option value="PE" <?php echo($patient->province()=="PE"? "selected":"");?>>Île-Du-Prince-Édouard</option>
                    <option value="MB" <?php echo($patient->province()=="MB"? "selected":"");?>>Manitoba</option>
                    <option value="NB" <?php echo($patient->province()=="NB"? "selected":"");?>>Nouveau-Brunswick</option>
                    <option value="NS" <?php echo($patient->province()=="NS"? "selected":"");?>>Nouvelle-Écosse</option>
                    <option value="NU" <?php echo($patient->province()=="NU"? "selected":"");?>>Nunavut</option>
                    <option value="ON" <?php echo($patient->province()=="ON"? "selected":"");?>>Ontario</option>
                    <option value="QC" <?php echo($patient->province()=="QC"? "selected":"");?>>Québec</option>
                    <option value="SK" <?php echo($patient->province()=="SK"? "selected":"");?>>Sackatchewan</option>
                    <option value="NL" <?php echo($patient->province()=="NL"? "selected":"");?>>Terre-Neuve-et-Labrador</option>
                    <option value="NT" <?php echo($patient->province()=="NT"? "selected":"");?>>Territoires du Nord-Ouest</option>
                    <option value="YK" <?php echo($patient->province()=="YK"? "selected":"");?>>Yukon</option>
                </select>
            </div>
        </div>
        <br>
        <label for="telephone">Code Postal <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Code Postal" id="code_postal" value="<?php echo($patient->code_postal());?>" name="code_postal" required>
            </div>
        </div>
        <br>
        <label for="telephone">Numéro cellulaire <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Numéro cellulaire" id="telephone" value="<?php echo($patient->telephone());?>" name="telephone" required>
            </div>
        </div>
        <br>
        <label for="telephone">Raison pour le rendez-vous</label>
        <div class="row">
            <div class="col">
                <textarea class="form-control" placeholder="Cause du rendez-vous" id="description"  value="<?php echo($patient->description());?>" name="description"></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <a href="/HMS_PROJECT/liste_patient" class="btn btn-info">Retour</a>
            </div>
            <div class="col-6">
            </div>
            <div class="col-3">
                <input type="submit" class="btn btn-info" name="update" value="Mettre à jour">
            </div>
        </div>
</form>