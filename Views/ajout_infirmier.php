<br>
<?php $this->_t = "Insertion d'un infirmier" ?>
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
                <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Prénom" id="prenom" name="prenom" required>
            </div>
        </div>
        <br>
        <label for="datenaissance">Date de naissance <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="date" class="form-control" placeholder="Date de naissance" id="ddn" name="ddn" required>
            </div>
        </div>
        <br>
        <label for="photo">Photo de profil</label>
        <div class="row">
            <div class="col">
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
        </div>
        <br>
        <label for="email">Adresse Email <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="email" class="form-control" placeholder="Adresse Email" id="email" name="email" required>
            </div>
        </div>
        <br>
        <label for="adresse">Adresse courriel <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Adresse courriel" id="adresse" name="adresse" required>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Ville" id="ville" name="ville" required>
            </div>
            <div class="col-2">
                <select class="form-control" name="province" required>
                    <option selected>Province</option>
                    <option value="AB">Alberta</option>
                    <option value="BC">Colombie-Britanique</option>
                    <option value="PE">Île-Du-Prince-Édouard</option>
                    <option value="MB">Manitoba</option>
                    <option value="NB">Nouveau-Brunswick</option>
                    <option value="NS">Nouvelle-Écosse</option>
                    <option value="NU">Nunavut</option>
                    <option value="ON">Ontario</option>
                    <option value="QC">Québec</option>
                    <option value="SK">Sackatchewan</option>
                    <option value="NL">Terre-Neuve-et-Labrador</option>
                    <option value="NT">Territoires du Nord-Ouest</option>
                    <option value="YK">Yukon</option>
                </select>
            </div>
        </div>
        <br>
        <label for="telephone">Code Postal <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Code Postal" id="code_postal" name="code_postal" required>
            </div>
        </div>
        <br>
        <label for="telephone">Numéro cellulaire <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Numéro cellulaire" id="telephone" name="telephone" required>
            </div>
        </div>
        <br>
        <label for="telephone">CV</label>
        <div class="row">
            <div class="col">
                <input type="file" class="form-control" placeholder="CV" id="cv" name="cv">
            </div>
        </div>
        <br>
        <label for="telephone">Mot de passe <b style="color:red;">*</b></label>
        <div class="row">
            <div class="col">
                <input type="password" class="form-control" placeholder="Mot de passe" id="mdp" name="mdp" required>
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
                <input type="submit" class="btn btn-info" name="add" value="Ajouter">
                    <?php require("./Public/uploadimage.php"); ?>
                    <?php require("./Public/uploadpdf.php"); ?>
            </div>
        </div>
        <script>
            $(document).ready(function(e){
            $("#form").on('submit', (function(e){
                e.preventDefault();
                $("#message").empty();
                $("#loading").show(); 

                $.ajax({
                        url:"ajout_infirmier.php",     // Url to which the request is 
                        type: "POST", // Type of request to be sent, called as method
                        data: new FormData(this), // Data sent to server, a set of key/value pairs
                        contentType: false, // The content type used when sending data to the server
                        cache: false, // To unable request pages to be cached
                        processData: false, // To send DOMDocument or non processed data file
                        success: function(data) // A function to be called if request succeeds
                        {
                            $("#message").html(data);
                            $("#loading").hide(); 
                        }
                });
            }));
        });
        </script>
</form>