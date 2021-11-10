<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';
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

<article class="container">
    <div class="col d-flex justify-content-center reg_prof">
        <?php
            $allfiles = getAllFilesOfInvestor($_POST['idInvestor']);
            echo "<table class=table row'>";
            echo "<thead class='Table_head col-8'>";
            echo "<tr><th>ID</th><th>Nom</th><th>Lien de téléchargement</th><th>Date de création</th></tr>";
            echo "</thead>";
            echo "<tbody class='Table_body'>";
            foreach ($allfiles as $line) {        //boucle des enregistrements
                echo("<tr>");
                foreach ($line as $key => $value) {  //boucle des colonnes
                    if($key==='link'){
                        echo("<td><a href='$value' download>$value</a></td>");
                    } else {
                        echo("<td>$value</td>");
                    }                   
                }
                echo("</tr>");
            }
            echo "</tbody>";
            echo "</table>";
        ?>
    </div>
</article>

