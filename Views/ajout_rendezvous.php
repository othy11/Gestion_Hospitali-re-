<br>
<?php $this->_t = "Ajouter Rendez-vous" ?>
<div class="col-10 table-responsive">
    <p class="h3"><?php echo ($this->_usr);
                    echo (" > "); ?>
        <small class="text-muted"> <?php echo ($this->_name); ?> </small></h3>
    <h2><?php echo ($this->_t)   ?></h2>
</div>



<form method="post" class="form-group container jumbotron" id="form" enctype="multipart/form-data">
    <label for="id_patient">Nom du Patient<b style="color:red;">*</b></label>
    <div class="row">
        <div class="col">
            <select name="id_patient">
                <?php foreach ($patient as $pa) : ?>
                    <option value="<?= $pa->id() ?>">Dr.<?= $pa->prenom(); ?> <?= $pa->nom(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <br>
    <br>
    <label for="id_departement">Lieu<b style="color:red;">*</b></label>
    <div class="row">
        <div class="col">
            <select name="id_departement" id="id_departement">
                <?php foreach ($depart as $de) : ?>
                    <option value="<?= $de->id() ?>"><?= $de->nom_dep(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <br>
    <br>
    <label for="id_medecin">Medecin <b style="color:red;">*</b></label>
    <div class="row">
        <div class="col">
            <select name="id_medecin" id="id_medecin">
            </select>
        </div>
    </div>
    <h6>Les médecins seront affichés en fonction du lieu d'attention</h6>
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
                                    <input type="radio" name="heure_rendezvous" autocomplete="off" value="<?= $j ?>:<?= ($i * 20) == 0 ? "00" : ($i * 20) ?>"><?= $j ?>:<?= ($i * 20) == 0 ? "00" : ($i * 20) ?>
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
    <br>
    <br>
    <label for="date_rendezvous">Date <b style="color:red;">*</b></label>
    <div class="row">
        <div class="col-6">
            <input type="date" class="form-control" placeholder="Date de Rendez vous" id="date_rendezvous" name="date_rendezvous" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-2 text-left">
            <a href="/HMS_PROJECT/liste_rendezvous" class="btn btn-info " style="padding: 6px 50px 6px 50px">Retour</a>
        </div>
        <div class="col-xs-2 text-right">
            <input type="submit" class="btn btn-info" name="add" value="Ajouter">
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#id_departement").val();
            loadList();

            $("#id_departement").change(function() {
                loadList();
            });
        })


        function loadList() {
            $.ajax({

                    url: "ajout_rendezvous", // Url to which the request is 
                    type: "POST", // Type of request to be sent, called as method
                    data: "id_dep=" + $('#id_departement').val(), // Data sent to server, a set of key/value pairs
                    success: function(data) // A function to be called if request succeeds
                    {
                        $("#id_medecin").html(data);
                        $("#loading").hide();
                    }
                }).fail(function(r) {
                    console.log(r);
                })
                .done(function(r) {
                    console.log(r);
                })
        }
    </script>

</form>