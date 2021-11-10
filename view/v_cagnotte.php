<?php
require_once './view/v_head.html';
require_once './view/v_navbar.php';
echo 'cagnotte est de :' . $cagnotte;
if ($_SESSION['TABLE'] == 'admin') {
?>
<form action="index.php?request=95" method="POST">
    <input type="number" name="cagnotte" value=<?php echo "'" . $cagnotte . "'"; ?>>
    <input type="submit" name="submitCagnotte">
</form>
<?php
}
?> <?php
    require_once './view/v_footer.php';
    ?>