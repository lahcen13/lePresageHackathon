<?php
session_start();
//require_once './include/constantes.php';
//require_once './include/bdd.php';



if (!isset($_REQUEST['request']))
{ // Démarrage de l'application.
$_REQUEST['request'] = Accueil;
}

switch ($_REQUEST['request'])
{
//case Accueil:
//    require_once './controler/c_acceuil.php';
//   break;

case deconnexion:
    session_destroy();
    header("location: index.php?action=" . Accueil); 
    exit();
}   