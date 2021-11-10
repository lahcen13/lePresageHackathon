<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';
echo  $confirmBudget;
?>
<div class="manage_back  justify-content-space-between">
    <h1><em><strong>Gestion des investisseurs</strong></em></h1>
    <form action='index.php?request=1&action=3' method="POST">
        <label for='oui'> Confirmer l'investissement.</label>
        <?php echo  $confirmBudget == '1' ? '<input type="radio" name="statut" value="1" id="oui" checked>' : '<input type="radio" name="statut" value="1" id="oui">' ?>
        <br>
        <label for='non'> Refuser l'investissement.</label>
        <?php echo $confirmBudget == '0' ? '<input type="radio" name="statut" value="0" id="non" checked>' : '<input type="radio" name="statut" value="0" id="oui">' ?>
        <input type="hidden" name="idInvestor" value=<?php "'" . $_POST['idInvestor'] . "'" ?>>
        <br>
        <input type="submit" class="button" name="ChangeStatusSubmit">
    </form>
</div>
<?php

require_once './view/v_footer.php';
?>