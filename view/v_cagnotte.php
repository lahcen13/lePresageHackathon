<?php
require_once './view/v_head.html';
require_once './view/v_navbar.php';
if ($_SESSION['TABLE'] == 'admin') {
?>
<form action="index.php?request=95" method="POST">
    <input type="number" name="cagnotte" value=<?php echo "'" . $cagnotte . "'"; ?>>
    <input type="submit" name="submitCagnotte">
</form>
<?php
}
?>
<style>
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
</style>
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


<?php
require_once './view/v_footer.php';
?>