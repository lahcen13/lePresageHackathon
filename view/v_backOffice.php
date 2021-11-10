<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';
?>
<h1><em><strong>Informations investisseurs</strong></em></h1>
<?php
$allInvestors = getAllInvestors();

echo "<table class=table row'>";
echo "<thead class='Table_head col-8'>";
echo "<th>ID</th><th>Mail</th><th>Nom</th><th>Prenom</th><th>Budget</th><th>Statut</th><th>Adresse</th><th>Ville</th><th>Code Postal</th><th>Société</th> ";
echo "</tr>";
echo "</thead>";
$totalDonations = 0;
foreach ($allInvestors as $line) {        //boucle des enregistrements
    echo "<tbody class='Table_body'>";
    $flagDossierIncomplet = false;
    foreach ($line as $key => $value) {  //boucle des colonnes

        if (!isset($value)) {
            $flagDossierIncomplet = true;
        }
        if ($key !== "passwordHash") {
            if ($key !== "confirmBudget") {
                if ($key !== "investorId") {
                    echo ("<th>$value</th>");
                }
            }
        }
        if ($key == "investorId") {
            echo ("<th>$value <form action='index.php?request=1&action=3' method='POST'><input type='hidden' name='idInvestor' value='" . $value . "'> <input type='submit' name='manageSubmit' value='+'></form></th>");
        }
        if ($key == "confirmBudget") {
            if ($value == 1) {
                echo ("<th>confirmé</th>");
            } else {
                echo ("<th> non confirmé</th>");
            }
        }
    }
    echo "</tbody>";
    $totalDonations += $line['budget'];
}
echo "</table>";
// echo("<div>Cagnotte totale :$totalDonations</div>");
//var_dump($allInvestors);

require_once './view/v_footer.php';
?>