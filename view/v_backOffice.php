<?php
require_once './view/v_navbar.php';
require_once './view/v_head.html';
?>
<div class="reg">

        <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Upload</span>
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile01">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
    </div>
    </div>
</div>



<?php

$allInvestors = getInvestor('florent.2re@gmail.com');
var_dump($allInvestors);

require_once './view/v_footer.php';
?>