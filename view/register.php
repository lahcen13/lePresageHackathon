<?php
require_once './view/head.html';
?>
<div class="container">
    <h2>Enregistrez-vous</h2>
    <form action="./index.php?request=30&action=60">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="nom" class=" col-form-label">Nom :</label>
            </div>
            <div class="col-auto">
                <input type="text" name="nom" id="nom" class="form-control" aria-describedby="passwordHelpInline">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="prenom" class=" col-form-label">Prenom :</label>
            </div>
            <div class="col-auto">
                <input type="text" name="prenom" id="prenom" class="form-control" aria-describedby="passwordHelpInline">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="mdp" class=" col-form-label">Mot de passe</label>
            </div>
            <div class="col-auto">
                <input type="password" name="mdp" id="mdp" class="form-control" aria-describedby="passwordHelpInline">
            </div>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Adresse mail</label>
            <input type="mail" name="mail" class="form-control" id="mail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nous ne partageons pas vos données.</div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="mdp" class=" col-form-label">Mot de passe</label>
            </div>
            <div class="col-auto">
                <input type="password" name="mdp" id="mdp" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                    Doit contenir entre 8 et 20 caractères
                </span>
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="confirmeMdp" class="col-form-label">Confirmer mot de passe</label>
            </div>
            <div class="col-auto">
                <input type="password" name="confirmeMdp" id="confirmeMdp" class="form-control"
                    aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                    Doit contenir entre 8 et 20 caractères
                </span>
            </div>
        </div>
        <button type="submit" name="confirmation" class="btn btn-primary">confirmation</button>
    </form>
</div>
<?php
require_once './view/footer.php';
?>