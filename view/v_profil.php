<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';
?>

<div class="container row justifiy-content-between ">
    <div class="col-3 prof">
        <div class="reg_prof">
            <h5 class="card-title">
                <?php
                if (isset($nom)) {
                ?>
                <div>
                    <?php echo $nom, ' ', $prenom ?></div>
                <?php } else echo "Nom Introuvable"
                ?>
            </h5>
            <?php
            if (isset($budget)) {

            ?>
            <p class="card-text">
                Budget d'investissement :
                <?php
                echo $budget;
            } else {
                echo 0;
            }
                ?>

                </h6>
            <p class="card-text">Société :
                <?php
                    if (isset($societe)) {
                    ?>
            <div>
                <?php echo $societe ?></div>
            <?php } else echo "Non définie"
            ?>
            </p>
            <p class="card-text">Adresse :
                <?php
                if (isset($adresse)) {
                ?>
            <div>
                <?php echo $adresse . ', ' . $ville . ', ' . $codePostal ?></div>
            <?php } else echo "Non définie"
        ?>
            <br> Ville :
            <?php
        if (isset($ville)) {
        ?>
            <div>
                <?php echo $ville ?></div>
            <?php } else echo "Non définie"
        ?>
            <br>Code Postal :
            <?php
        if (isset($codePostal)) {
        ?>
            <div>
                <?php echo $codePostal ?></div>
            <?php } else echo "Non défini"
        ?>
            </p>
            <p class="card-text">E-mail :
                <?php
            if (isset($email)) {
            ?>
            <div>
                <?php echo $email ?></div>
            <?php } else echo "Non définie"
    ?>
            </p>
        </div>
    </div>
    <div class="col-9 prof">
        <form action="index.php?request=80&action=88" class="form_style" method="post">
            <div class="row">
                <div class="col-md-6">
                    <?php isset($nom) ? "" : $nom = " "; ?>
                    <label for="nom" class=" col-form-label">Nom :</label>
                    <input type="text" name="p_nom" id="nom" value=<?php echo "'" .  $nom . "'"  ?>
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <?php isset($prenom) ? "" : $prenom = " "; ?>
                    <label for="prenom" class=" col-form-label">Prenom :</label>
                    <input type="text" name="p_prenom" id="prenom" value=<?php echo "'" . $prenom . "'"  ?>
                        class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php isset($email) ? "" : $email = " "; ?>
                    <label for="mail" class="form-label">Adresse mail</label>
                    <input type="mail" name="p_email" value=<?php echo  "'" . $email . "'"  ?> class="form-control"
                        id="mail" disabled>
                </div>
                <div class="col-md-6">
                    <?php isset($societe) ? "" : $societe = " "; ?>
                    <label for="societe" class="form-label">Nom de la société</label>
                    <input type="text" name="p_societe" class="form-control" id="societe"
                        value=<?php echo "'" . $societe . "'"; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php isset($adresse) ? "" : $adresse = " "; ?>
                    <label for="adresse" class="form-label">Adresse </label>
                    <input type="text" name="p_adresse" value=<?php echo "'" . $adresse . "'"; ?> class="form-control"
                        id="adresse">
                </div>
                <div class="col-md-6">
                    <?php isset($ville) ? "" : $ville = " "; ?>
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" name="p_ville" class="form-control" id="ville"
                        value=<?php echo "'" . $ville . "'";  ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php isset($codePostal) ? "" : $codePostal = " "; ?>
                    <label for="codePostal" class="form-label">Code Postal</label>
                    <input type="text" name="p_codePostal" class="form-control" id="codePostal"
                        value=<?php echo "'" . $codePostal . "'";  ?>>
                </div>
                <div class="col-md-6">
                    <?php isset($budget) ? "" : $budget = "0"; ?>
                    <label for="budget" class="form-label">Budget</label>
                    <input type="text" name="p_budget" class="form-control" id="budget"
                        value=<?php echo "'" . $budget . "'" ?>>
                </div>
            </div>
            <div class="btn_log">
                <div>
                    <button type=" submit" name="SubmitModifierProfil" class="button">Modifier</button>
                </div>
            </div>
        </form>

        <form method="post" enctype="multipart/form-data" action="index.php?request=80&action=85" class="">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <input type="file" id="file" name="upload_file" required>
                </div>
                <div class="col-md-3">
                    <button type=" submit" name="addFileSubmit" class="button">Envoyer</button>
                </div>
                
            </div>

        </form>
    </div>
    

    
</div>


