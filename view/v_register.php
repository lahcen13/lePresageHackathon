<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';
?>
<div class="reg">
    <div class="row">
        <div class="reg_form col-12">
            <h2>Enregistrez-vous</h2>
            <form action="./index.php?request=30&action=60" method="POST">
                <div class="row">
                    <div class="col-6">
                        <label for="nom" class=" col-form-label">Nom :</label>
                        <input type="text" name="nom" id="nom" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="prenom" class=" col-form-label">Prenom :</label>

                        <input type="text" name="prenom" id="prenom" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="mail" class="form-label">Adresse mail</label>
                        <input type="mail" name="mail" class="form-control" id="mail">
                        <div id="emailHelp" class="form-text">Nous ne partageons pas vos données.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="mdp" class=" col-form-label">Mot de passe</label>
                        <input type="password" name="mdp" id="mdp" class="form-control"
                            aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-6">
                        <label for="confirmeMdp" class="col-form-label">Confirmer mot de passe</label>
                        <input type="password" name="confirmeMdp" id="confirmeMdp" class="form-control"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Doit contenir entre 8 et 20 caractères
                    </span>
                </div>
                <div class="btn_log">
                    <button type=" submit" name="submitRegister" class="button">Inscription</button>
                </div>
                <a href="index.php?" class="btn_log"> Vous êtes déjà inscrit? Connectez-vous ici.</a>
            </form>
        </div>
    </div>
</div>
<?php
require_once './view/v_footer.php';
?>