<?php
require_once './view/head.html';
?>
<div class="container">
    <form action="index.php?request=30&action=70">
        <div class="row">
            <div class="col-6">
                <label for="confirmCode" class="form-label">Code de confirmation :</label>
                <input type="text" name="confirmCode" class="form-control" id="confirmCode"
                    aria-describedby="code de confirmation">
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <button type=" submit" name="confirmationCode" class="btn btn-primary">confirmation</button>
            </div>
        </div>
    </form>
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