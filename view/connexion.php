<?php
require_once './view/head.html';
require_once './view/navbar.php';
?>

<form action="./index.php?request=30&action=60" method="POST">
    <div class="row">
        <div class="col-4">
            <label for="mail" class="form-label">Adresse mail</label>
            <input type="mail" name="mail" class="form-control" id="mail">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="mdp" class=" col-form-label">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" class="form-control" aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row">
        <div class="col-auto">
            <button type=" submit" name="confirmationCode" class="btn btn-primary">confirmation</button>
        </div>
    </div>
    <a href="index.php?request=30"> S'inscrire</a>
</form>
<?php

require_once './view/footer.php';
?>