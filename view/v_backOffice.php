<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';
?>
<h1><em><strong>Informations investisseurs</strong></em></h1>
<?php
$allInvestors = getAllInvestors();

echo "<table class=table row'>";
echo "<thead class='Table_head col-8'>";
echo "<th>ID</th><th>Email</th><th>Password</th><th>FirstName</th><th>LastName</th><th>Budget</th><th>Adresse</th><th>Ville</th><th>Code Postal</th><th>Société</th> ";
echo "</tr>";
echo "</thead>";
$totalDonations = 0;
foreach($allInvestors as $line){        //boucle des enregistrements
    echo "<tbody class='Table_body'>";
    $flagDossierIncomplet = false;
    foreach($line as $key => $value ){  //boucle des colonnes
        
        if(!isset($value)){
            $flagDossierIncomplet = true;
        }
        echo("<th>$value</th>");      //affichage de chaque valeur de colonne encadrée par un div  
    }
    echo "</tbody>";
    $totalDonations += $line['budget'];
    
}
echo "</table>";
// echo("<div>Cagnotte totale :$totalDonations</div>");
//var_dump($allInvestors);

require_once './view/v_footer.php';
?>