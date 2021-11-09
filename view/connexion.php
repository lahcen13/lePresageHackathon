<?php
require_once './view/v_head.html';
require_once './view/v_navbar.php';
?>
<div class="reg">
    <div class="row">
        <div class="reg_form col-12">
            <h2>Connectez-vous</h2>
            <form action="./index.php" method="POST">
                <div class="row">
                    <div class="col-12">
                        <label for="mail" class="form-label">Adresse mail</label>
                        <input type="mail" name="mail" class="form-control" id="mail">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="mdp" class=" col-form-label">Mot de passe</label>
                        <input type="password" name="mdp" id="mdp" class="form-control"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="row btn_log">
                    <div>
                        <button type=" submit" name="SubmitConnexion" class="button">Connexion</button>
                    </div>
                    <?php
                    if (isset($alert)) {
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <p class="alert"> <?php echo $alert ?></p>
                        </div>
                    </div>
                    <?php
                    } ?>
                </div>
                <a href="index.php?request=30" class="btn_log"> S'inscrire</a>
            </form>
        </div>
    </div>
</div>

<?php
require_once './view/v_footer.php';
?>