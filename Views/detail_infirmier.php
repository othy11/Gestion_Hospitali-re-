<?php
$this->_t = "Détail de l'infirmier";
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

        <style>
          .container{
            border-style:none;
            border-radius:10px;
            background-color:rgb(209, 255, 255)
          }
          .card-img-top{
            border-style:none;
          }
        </style>
        <br><br>
        <div class="container">
          <br>
        <div class="row">
          <div class="col-md-4">
            <img class="img-rounded" src="./Public/img/data/<?=$nurse->photo()?>" style="width:100%;height:100%" alt="Dr.<?=$nurse->prenom()?> <?=$nurse->nom()?>">
          </div>
          <div class="col-md-8">
          <table class="table">
          <tbody>
            <tr>
              <th>Nom complet de l'infirmier</th>
              <td>Dr.<?=$nurse->prenom()?> <?=$nurse->nom()?></td>
            </tr>
            <tr>
              <th>Date de naissance</th>
              <td><?=$nurse->date_naissance()?></td>
            </tr>
            <tr>
              <th>Adresse Email</th>
              <td><?=$nurse->email()?></td>
            </tr>
            <tr>
              <th>Adresse Courriel</th>
              <td><?=$nurse->adresse()?>, <?=$nurse->code_postal()?>, <?=$nurse->ville()?>, <?=$nurse->province()?></td>
            </tr>
            <tr>
              <th>Numéro de téléphone</th>
              <td><?=$nurse->telephone()?></td>
            </tr>
            <tr>
              <th>CV</th>
              <td><a href="./Public/doc/<?=$nurse->cv()?>" target="_blank"><button class="btn btn-info"><?=$nurse->cv()?></button></a></td>
            </tr>
          </tbody>
        </table>
        <a href="/HMS_PROJECT/liste_infirmier"><button class="btn btn-info">Retour</button></a>
          </div>
            </div>
            <br>
            </div>
        
<?php

?>