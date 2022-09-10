<?php $this->_t = "Rendez-vous"; ?>
<form method="post">
    <select name="id_medecin">
        <?php
            foreach($appointment as $a):
        ?>
        <option value="<?=$a->id();?>">Dr. <?=$a->nom()?> <?=$a->prenom()?></option>
        <?php endforeach; ?>
    </select>
    <input type="date" name="date"/>
    <input type="time" name="heure"/>
    <input type="submit" value="prendre rendez-vous" name="take"/>
</form>