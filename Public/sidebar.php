<style>
  #link:hover {
    color: #008B8B;
  }

  .sidenav {
    height: 100%;
    /* Full-height: remove this if you want "auto" height */
    width: 160px;
    /* Set the width of the sidebar */
    position: fixed;
    /* Fixed Sidebar (stay in place on scroll) */
    z-index: 1;
    /* Stay on top */
    top: 0;
    /* Stay at the top */
    left: 0;
    background-color: #111;
    /* Black */
    overflow-x: hidden;
    /* Disable horizontal scroll */
    padding-top: 20px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    color: rgb(20, 20, 20);
    display: block;
    transition: 0.3s;
  }

  .sidenav a:hover {
    color: #f1f1f1;
  }

  .table-responsive {
    margin-left: 12%;
    padding: 0px 10px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {
      padding-top: 15px;
    }

    .sidenav a {
      font-size: 18px;
    }
  }
</style>
<?php
if (
  empty($_COOKIE["adminemail"]) && empty($_COOKIE["adminpassword"])
  && empty($_COOKIE["patientemail"]) && empty($_COOKIE["employeemail"])
  && empty($_COOKIE["doctoremail"]) && empty($_COOKIE["nurseemail"])
) {
  echo "<script>document.location.href='/HMS_PROJECT/login'</script>";
}
?>
<div class="col-md-2 sidenav" style="background-color:rgb(118, 71, 255); color:white;">

  <?php
  $showDepart = false;
  $showMedicin = false;
  $showPatient = false;
  $showInfirmiers = false;
  $showEmployes = false;
  $showRendezVous = false;
  $showTransactio = false;
  $showDiagnostique = false;

  if (
    isset($_COOKIE["adminemail"]) 
    || isset($_COOKIE["doctoremail"])
  ) $showDepart = true;
  if (
    isset($_COOKIE["adminemail"])  || isset($_COOKIE["nurseemail"])
  ) $showMedicin = true;
  if (
    isset($_COOKIE["adminemail"]) || isset($_COOKIE["nurseemail"])
    || isset($_COOKIE["doctoremail"])
  ) $showPatient = true;
  if (
    isset($_COOKIE["adminemail"]) //|| isset($_COOKIE["employeemail"])
  ) $showInfirmiers = true;
  if (
    isset($_COOKIE["adminemail"]) //|| isset($_COOKIE["employeemail"])
  ) $showEmployes = true;
  if (
    isset($_COOKIE["adminemail"]) || isset($_COOKIE["nurseemail"])
    || isset($_COOKIE["doctoremail"]) || isset($_COOKIE["patientemail"])
  ) $showRendezVous = true;
  if (
    isset($_COOKIE["adminemail"]) | isset($_COOKIE["patientemail"])
  ) $showTransactio = true;
  if (
    isset($_COOKIE["adminemail"]) || isset($_COOKIE["nurseemail"])
    || isset($_COOKIE["doctoremail"])
  ) $showDiagnostique = true;

  if ($showDepart)
    echo ('<a href="/HMS_PROJECT/liste_dep">Départements</a>');
  if ($showMedicin)
    echo ('<a href="#collapseMedecin" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseMedecin">Médecins</a>
           <div class="collapse" id="collapseMedecin" style="margin-left:5%;">
           <a href="/HMS_PROJECT/liste_medecin">Médecins</a>
           <a href="/HMS_PROJECT/liste_docdep">Médecins à l\'hôpital</a>
           </div>');
  if ($showPatient)
    echo ('<a href="/HMS_PROJECT/liste_patient">Patients</a>');
  if ($showInfirmiers)
    echo ('<a href="/HMS_PROJECT/liste_infirmier">Infirmiers</a>');
  if ($showEmployes)
    echo ('<a href="/HMS_PROJECT/liste_employe">Employés</a>');
  if ($showRendezVous)
    echo ('<a href="/HMS_PROJECT/liste_rendezvous">Rendez-vous</a>');
  if ($showTransactio)
    echo ('<a href="/HMS_PROJECT/liste_invoice">Transactions</a>');
  if ($showDiagnostique)
    echo ('<a href="/HMS_PROJECT/liste_diagnostic">Diagnostiques</a>');
  echo ('<a href="/HMS_PROJECT/detail_user">Mon Profile</a>');

  ?>
  <form method="post">
    <button type="submit" name="deco" class="btn btn-danger" style="margin-left:40px; margin-top:10px;"><i class="fas fa-sign-out-alt"></i></button>
    <?php
    if (isset($_POST["deco"])) {
      if (isset($_COOKIE["adminemail"]))
        setcookie("adminemail", $_COOKIE["adminemail"], time() - 3601);
      if (isset($_COOKIE["patientemail"]))
        setcookie("patientemail", $_COOKIE["patientemail"], time() - 3601);
      if (isset($_COOKIE["employeemail"]))
        setcookie("employeemail", $_COOKIE["employeemail"], time() - 3601);
      if (isset($_COOKIE["nurseemail"]))
        setcookie("nurseemail", $_COOKIE["nurseemail"], time() - 3601);
      if (isset($_COOKIE["doctoremail"]))
        setcookie("doctoremail", $_COOKIE["doctoremail"], time() - 3601);

      echo "<script>document.location.href='/HMS_PROJECT/'</script>";
      if (
        empty($_COOKIE["adminemail"]) && empty($_COOKIE["patientemail"]) &&
        empty($_COOKIE["employeemail"]) && empty($_COOKIE["nurseemail"]) && empty($_COOKIE["doctoremail"])
      ) {
        echo "<script>document.location.href='/HMS_PROJECT/'</script>";
      }
    }

    ?>
  </form>
</div>