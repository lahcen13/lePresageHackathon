<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php
        if (isset($nom)) {
        ?>
        <div>
        <?php echo $civilite, $nom, $prenom ?></div>
        <?php } 
        else echo "Nom Introuvbable"
        ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
        Société :
        <?php
        if (isset($societe)) {
        ?>
        <div>
        <?php echo $societe ?></div>
        <?php } 
        else echo "Non définie"
        ?>
    </h6>
    <p class="card-text">Adresse :
        <?php
        if (isset($adresse)) {
        ?>
        <div>
        <?php echo $adresse, $ville, $codePostal ?></div>
        <?php } 
        else echo "Non définie"
        ?>
    </p>
    <p class="card-text">E-mail :
        <?php
        if (isset($email)) {
        ?>
        <div>
        <?php echo $email ?></div>
        <?php } 
        else echo "Non définie"
        ?>
    </p>
    <p class="card-text">Budget :
        <?php
        if (isset($budget)) {
        ?>
        <div>
        <?php echo $budget ?></div>
        <?php } 
        else echo "Non défini"
        ?>
    </p>
    <a href="#" class="card-link">Modifier les infos</a><br>
    <a href="#" class="card-link">Importer un/des document(s)</a>
  </div>
</div>


<?php
require_once './view/v_footer.php';
?>