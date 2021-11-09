<?php
require_once './view/head.html';
?>
<div class="reg">
    <div class="row">
        <div class="reg_form col-12">
            <form action="index.php?request=30&action=70">
                <div class="row">
                    <div class="col-12">
                        <span><p>Veuillez entrer le code reçu sur le mail que vous avez entré lors de votre inscription.</p></span>
                        <label for="confirmCode" class="form-label">Code de confirmation :</label>
                        <input type="text" name="confirmCode" class="form-control" id="confirmCode" aria-describedby="code de confirmation">
                    </div>
                </div>
                    <div class="btn_log">
                        <button type=" submit" name="confirmationCode" class="button">confirmation</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($er)) {
?>
<div><?php echo $er ?></div>
<?php
}
?>
</div>
<?php
require_once './view/footer.php';
?>