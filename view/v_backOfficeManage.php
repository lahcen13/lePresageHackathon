<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';
echo  $confirmBudget;
?>
<h1 class="manage_back"><em><strong>Gestion des investisseurs</strong></em></h1>
<form class="manage_back" action='index.php?request=1&action=3' method="POST">
    <label for='oui'> Confirmer l'investissement.</label>
    <?php echo  $confirmBudget == '1' ? '<input type="radio" name="statut" value="1" id="oui" checked>' : '<input type="radio" name="statut" value="1" id="oui">' ?>
    <br>
    <label for='non'> Refuser l'investissement.</label>
    <?php echo $confirmBudget == '0' ? '<input type="radio" name="statut" value="0" id="non" checked>' : '<input type="radio" name="statut" value="0" id="oui">' ?>
    <input type="hidden" name="idInvestor" value=<?php echo "'"  . $_POST['idInvestor'] . "'" ?>>
    <br>
    <input type="submit" class="button" name="ChangeStatusSubmit">
</form>
<?php

require_once './view/v_footer.php';
?>
