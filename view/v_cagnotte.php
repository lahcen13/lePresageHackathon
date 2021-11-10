<?php
require_once './view/v_head.html';
require_once './view/v_navbar.php';
if ($_SESSION['TABLE'] == 'admin') {
?>
<div class="form_cagn row justify-content-space-between">
    <form class=" justify-content-space-between" action="index.php?request=95" method="POST">
        <h5 class="">Choissiez le montant de la cagnotte: </h5>
        <input type="number" name="cagnotte" class="" value=<?php echo "'" . $cagnotte . "'"; ?>>
        <input type="submit" name="submitCagnotte">
    </form>
</div>
<?php
}
?>
<style>

.form_cagn{
  margin:2%;
  display:flex;
}

.progress {
    position: relative;
    height: 70px;
    margin-top: 30vh;
}

.raised {
    position: absolute;
    left: 10px;
    top: 9px;
}

.goal {
    position: absolute;
    right: 10px;
    top: 9px;
}
div.progress-bar{
    background-color:#2D97C8 !important;
}
p.alert.alert-success{
    background-color:#FFFFD6 !important;
}
.parag{
    display:flex;
    justify-content:center;
    align-items:center;
    padding-top:5%;
}
</style>
<div class="parag row justify-content-center">
    <h3 class="col-6">Aidez nous en investissant dans notre projet pour nous permettre d'acquérir le terrain sur lequel nous souhaitons developper notre restaurant.</h3>
</div>
<div class="container">
    <div class="progress progress-striped active">
        <p class="alert alert-success raised"><strong><?php echo $budgetTotal; ?>€</strong></p>
        <p class="alert alert-success goal"><strong>Objectif: <?php echo $cagnotte; ?>€</strong></p>
        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
            style="width: <?php echo round($pourcentage); ?>%;">
            <span class="sr-only">
                <h1><?php echo round($pourcentage) ?>% </h1>
            </span>
        </div>

    </div>
</div>

