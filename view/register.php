<?php
require_once './view/head.html';
require_once './view/navbar.php';
?>
<div class="container">
    <h2>Enregistrez-vous</h2>
    <form action="./index.php?request=30&action=60" method="POST">
        <div class="row">
            <div class="col-4">
                <label for="nom" class=" col-form-label">Nom :</label>
                <input type="text" name="nom" id="nom" class="form-control">
            </div>
            <div class="col-4">
                <label for="prenom" class=" col-form-label">Prenom :</label>

                <input type="text" name="prenom" id="prenom" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <label for="mail" class="form-label">Adresse mail</label>
                <input type="mail" name="mail" class="form-control" id="mail">
                <div id="emailHelp" class="form-text">Nous ne partageons pas vos données.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="mdp" class=" col-form-label">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" class="form-control" aria-describedby="passwordHelpInline">
            </div>

            <div class="col-4">
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
        <div class="row">
            <div class="col-auto">
                <button type=" submit" name="confirmation" class="btn btn-primary">confirmation</button>
            </div>
        </div>
    </form>
</div>
<?php
require_once './view/footer.php';
?>