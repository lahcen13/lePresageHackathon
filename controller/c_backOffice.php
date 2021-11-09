<?php

if (!isset($_REQUEST['action'])) {
    if($_SESSION['TABLE'] !== 'admin'){
        $_REQUEST['action'] = Admin;
    } else {
        $_REQUEST['action'] = 'other';
    }
    
}

switch ($_REQUEST['action']) {
    case Admin:

        include('./view/v_backOffice.php');
        break;
    default : 
        //header('location: index.php', true);
        include('./view/v_backOffice.php');

}


?>