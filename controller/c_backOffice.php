<?php

if (!isset($_REQUEST['action'])) {
    if ($_SESSION['TABLE'] == 'admin') {
        $_REQUEST['action'] = Admin;
    } else {
        session_destroy();
        header("location: index.php?request=45");
        exit();
    }
}

switch ($_REQUEST['action']) {
    case Admin:
        include('./view/v_backOffice.php');
        break;
    default:
        //header('location: index.php', true);
        include('./view/v_backOffice.php');
}