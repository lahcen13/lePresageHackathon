<?php
//require_once './view/v_navbar.php';
//require_once './view/v_head.html';
?>
<head>
<link rel="stylesheet" href="reset.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>    
<div class="container">
    <div class="card" style="width: 50rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php
            if (isset($nom)) {
            ?>
            <div>
            <?php echo $civilite, $nom, $prenom ?></div>
            <?php } 
            else echo "Nom Introuvable"
            ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            Budget d'investissement :
            <?php
            if (isset($societe)) {
            ?>
            <div>
            <?php echo $societe ?></div>
            <?php } 
            else echo "Non défini"
            ?>
        </h6>
        <p class="card-text">Société :
            <?php
            if (isset($societe)) {
            ?>
            <div>
            <?php echo $societe ?></div>
            <?php } 
            else echo "Non définie"
            ?>
        </p>
        <p class="card-text">Adresse :
            <?php
            if (isset($adresse)) {
            ?>
            <div>
            <?php echo $adresse, $ville, $codePostal ?></div>
            <?php } 
            else echo "Non définie"
            ?>
        <br> Ville :
        <?php
            if (isset($ville)) {
            ?>
            <div>
            <?php echo $ville?></div>
            <?php } 
            else echo "Non définie"
            ?>
        <br>Code Postal :
            <?php
            if (isset($codePostal)) {
            ?>
            <div>
            <?php echo $codePostal?></div>
            <?php } 
            else echo "Non défini"
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
     
        <p class="card-text">Documents importés :</p>
 <!-- boutons à rajouter  -->
        <a href="#" class="card-link">Modifier les infos</a><br>
        <a href="#" class="card-link">Importer un/des document(s)</a>
    </div>
    </div>
</div>

<?php
require_once './view/v_footer.php';
?>