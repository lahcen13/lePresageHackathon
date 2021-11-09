<?php

if($_SESSION['TABLE'] !== 'admin'){
    header('location: index.php', true);
} else {
    require_once './view/v_head.html';
    include('./view/v_backOffice.php');
}

?>