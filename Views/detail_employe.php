<?php
$this->_t = "Détail d'un employé";
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
            border-style: none;
          }
        </style>
        <br><br>
        <div class="container">
          <br>
        <div class="row">
          <div class="col-md-4">
            <img class="img-rounded" src="./Public/img/data/<?=$employe->photo()?>" style="width:100%;height:100%" alt="Dr.<?=$employe->prenom()?> <?=$employe->nom()?>">
          </div>
          <div class="col-md-8">
          <table class="table">
          <tbody>
            <tr>
              <th>Nom complet de l'employé</th>
              <td><?=$employe->prenom()?> <?=$employe->nom()?></td>
            </tr>
            <tr>
              <th>Date de naissance</th>
              <td><?=$employe->date_naissance()?></td>
            </tr>
            <tr>
              <th>Adresse Email</th>
              <td><?=$employe->email()?></td>
            </tr>
            <tr>
              <th>Son travail</th>
              <td><?=$employe->fonction()?></td>
            </tr>
            <tr>
              <th>Adresse Courriel</th>
              <td><?=$employe->adresse()?>, <?=$employe->code_postal()?>, <?=$employe->ville()?>, <?=$employe->province()?></td>
            </tr>
            <tr>
              <th>Numéro de téléphone</th>
              <td><?=$employe->telephone()?></td>
            </tr>
            <tr>
              <th>CV</th>
              <td><a href="./Public/doc/<?=$employe->cv()?>" target="_blank"><button class="btn btn-info"><?=$employe->cv()?></button></a></td>
            </tr>
          </tbody>
        </table>
        <a href="/HMS_PROJECT/liste_employe"><button class="btn btn-info">Retour</button></a>
          </div>
            </div>
            <br>
            </div>
        
