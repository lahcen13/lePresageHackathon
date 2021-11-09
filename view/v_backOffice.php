<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';

$allInvestors = getAllInvestors();
$totalDonations = 0;
foreach($allInvestors as $line){        //boucle des enregistrements

    $flagDossierIncomplet = false;
    foreach($line as $key => $value ){  //boucle des colonnes

        if(!isset($value)){
            $flagDossierIncomplet = true;
        }
        echo("<div>$value</div>");      //affichage de chaque valeur de colonne encadrée par un div
    }
    $totalDonations += $line['budget'];
    if($flagDossierIncomplet){
        echo("<div><bold>DOSSIER INCOMPLET</bold><div>");
    }
}
echo("<div>Cagnotte totale :$totalDonations</div>");
//var_dump($allInvestors);

require_once './view/v_footer.php';
?>