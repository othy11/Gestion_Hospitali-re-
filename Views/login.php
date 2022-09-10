<link rel="stylesheet" href="Public/stylelogin.css"/>
<?php $this->_t = "Connexion au compte"; ?>
<form method="post">
<div class="container">
	<div class="row login_box">
        <div class="col-md-12 col-xs-12 login_control">
                <div class="control">
                    <div class="label">Adresse Email</div>
                    <input type="email" class="form-control" name="email" required/>
                </div>
                <div class="control">
                     <div class="label">Mot de passe</div>
                    <input type="password" class="form-control" name="mdp" required/>
                </div>
                <div align="center">
                     <input type="submit" class="btn btn-orange" name="login" value="Connexion"/>
                </div>
                <div align="center">
                     <a href="#" class="col-2" style="color:black;">Mot de passe oublié?</a>
                     <a href="#" class="col-2" style="color:black;">S'inscrire</a>
                </div>
                
        </div>
</form>