<?php
require_once 'v_navbar.php';
require_once 'v_head.html';


//ihavenoideawhatimdoing.jpg ----- Ignorez ceci

// function budgetProgressBar($budget)
// {
//     $requete = "select sum budget from investor";
//     $preparation = SGBDConnect()->query($requete);
//     $budgetProgressBar=$preparation->execute();
//     return $preparation->execute();


// TO DO : fetcher la somme totale des budgets sur la BDD et les appeler ci-dessous

$budgetRequired=10000;
$budgetAvailable=1000;
$budgetProgressBar=($budgetAvailable/$budgetRequired)*100;


?>

<h4>Financement du projet :</h4>
<p>A ce jour, vous nous avez permis de financer <?php echo($budgetAvailable); ?> € sur les <?php echo($budgetRequired); ?> € requis.</p>
<p>Merci à vous !!!</p>
<div class="progress">
<div class="progress-bar" role="progressbar" style="width: <?php echo($budgetProgressBar); ?>%;" aria-valuenow="<?php echo($budgetProgressBar); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo($budgetProgressBar); ?>%</div>
</div>


<?php
//require_once './view/v_footer.php';
?>