<?php
//require_once './view/v_navbar.php';
//require_once './view/v_head.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script  src="../main.js"></script>
    <title>Le Présage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>   
<div class="container row justifiy-content-between ">
    <div class="col-3 prof">
        <div class="reg_prof">
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
        </div>
    </div>
    <div class="col-9 prof">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="nom" class=" col-form-label">Nom :</label>
                    <input type="text" name="p_nom" id="nom" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="prenom" class=" col-form-label">Prenom :</label>
                    <input type="text" name="p_prenom" id="prenom" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="mail" class="form-label">Adresse mail</label>
                    <input type="mail" name="p_email" class="form-control" id="mail">
                </div>
                <div class="col-md-6">
                    <label for="mail" class="form-label">Nom de la société</label>
                    <input type="mail" name="p_societe" class="form-control" id="mail">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="mail" class="form-label">Adresse </label>
                    <input type="mail" name="p_adresse" class="form-control" id="mail">
                </div>
                <div class="col-md-6">
                    <label for="mail" class="form-label">Ville</label>
                    <input type="mail" name="p_ville" class="form-control" id="mail">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="mail" class="form-label">Code Postal</label>
                    <input type="mail" name="p_codePostal" class="form-control" id="mail">
                </div>
                <div class="col-md-6">
                    <label for="mail" class="form-label">Budget</label>
                    <input type="mail" name="p_budget" class="form-control" id="mail">
                </div>
            </div>
            <div class="btn_log">
                <div>
                    <button type=" submit" name="confirmation" class="button">Envoyer</button>
                </div>
            </div>
        </form>
    </div>              
</div>
<form method="post">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <input type="file" id="file" name="p_file" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="p_nom" id="p_type" required class="form-control">
        </div>
        <div class="col-md-3">
            <button type=" submit" name="confirmation" class="button">Envoyer</button>
        </div>
    </div>
</form>
<form method="post">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <input type="file" id="file" name="p_file" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="p_nom" id="p_type" required class="form-control">
        </div>
        <div class="col-md-3">
            <button type=" submit" name="confirmation" class="button">Envoyer</button>
        </div>
    </div>
</form>
<form method="post">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <input type="file" id="file" name="p_file" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="p_nom" id="p_type" required class="form-control">
        </div>
        <div class="col-md-3">
            <button type=" submit" name="confirmation" class="button">Envoyer</button>
        </div>
    </div>
</form>
<form method="post">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <input type="file" id="file" name="p_file" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="p_nom" id="p_type" required class="form-control">
        </div>
        <div class="col-md-3">
            <button type=" submit" name="confirmation" class="button">Envoyer</button>
        </div>
    </div>
</form>
<form method="post">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <input type="file" id="file" name="p_file" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="p_nom" id="p_type" required class="form-control">
        </div>
        <div class="col-md-3">
            <button type=" submit" name="confirmation" class="button">Envoyer</button>
        </div>
    </div>
</form>
<?php
require_once './view/v_footer.php';
?>