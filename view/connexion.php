<?php
require_once './view/head.html';
require_once './view/navbar.php';
?>
<div class="reg">
    <div class="row">
        <div class="reg_form col-12">
            <h2>Connectez-vous</h2>
            <form action="./index.php?request=30&action=60" method="POST">
                <div class="row">
                    <div class="col-12">
                        <label for="mail" class="form-label">Adresse mail</label>
                        <input type="mail" name="mail" class="form-control" id="mail">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="mdp" class=" col-form-label">Mot de passe</label>
                        <input type="password" name="mdp" id="mdp" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="btn_log">
                    <div>
                        <button type=" submit" name="confirmationCode" class="button">confirmation</button>
                    </div>
                </div>
                <a href="index.php?request=30" class="btn_log"> S'inscrire</a>
            </form>
        </div>
    </div>  
</div>

<?php
require_once './view/footer.php';
?>