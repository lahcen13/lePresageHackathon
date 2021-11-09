<?php

use PHPMailer\PHPMailer\PHPMailer;

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = NouveauCompte;
}
switch ($_REQUEST['action']) {
    case NouveauCompte:
        include('./view/v_register.php');
        break;

    case confirmationMailInscription:
        require './include/PHPMailer/src/Exception.php';
        require './include/PHPMailer/src/PHPMailer.php';
        require './include/PHPMailer/src/SMTP.php';

        if (isset($_POST["confirmation"])) {
            $_SESSION["nom"] = $_POST["nom"];
            $_SESSION["prenom"] = $_POST["prenom"];
            $_SESSION["mail"] = $_POST["mail"];
            $_SESSION["mdp"] = $_POST["mdp"];
            // Envoyer le mail avec le code de confirmation
            $objet = "";

            $_SESSION["CodeVerificationClt"] = mt_rand(10000, 99999);
            $message = "Bonjour Mr." . $_SESSION["nom"] . ", <br> votre code  de confirmation est  :" . $_SESSION["CodeVerificationClt"] . ".<br> Cordialement, <br> -L'equipe Ryoken. <br> <center> <img src='https://pbs.twimg.com/profile_images/1348343673939963904/65yHDRre.png'></center>";
            $key = "c86e0d7c45ca4b0ae07055e4687f4dc0";
            $mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
            //$mail->IsSMTP(); // active SMTP
            $mail->IsHTML(true);
            $mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
            $mail->SMTPAuth = true;  // Authentification SMTP active
            $mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->Username = 'ryoken.esport2021@gmail.com';
            $mail->Password = md5($key);
            $mail->SetFrom('ryoken.esport2021@gmail.com', 'Ryoken');
            $mail->Subject = 'Confirmation inscription Ryoken';
            $mail->Body = $message;
            $mail->AddAddress($_SESSION["mail"]);
            if (!$mail->Send()) {
                echo 'Mail error: ' . $mail->ErrorInfo;
            }
            include('./view/v_confirmationRegister.php');
        } else {
            echo "<script type='text/javascript'> document.location.replace('index.php?action=150');</script>";
        }
        break;

    case VerificationCodeConfirmation:
        if (isset($_POST["submitCltCodeVerfication"]) && $_POST["CodeVerificationClt"] == $_SESSION["CodeVerificationClt"]) {
            $_SESSION["nom"] = $_POST["nom"];
            $_SESSION["prenom"] = $_POST["prenom"];
            $_SESSION["mail"] = $_POST["mail"];
            $_SESSION["mdp"] = $_POST["mdp"];
            echo addInvestor(md5($_SESSION["mdp"]), $_SESSION["prenom"], $_SESSION["nom"], $_SESSION["mail"]);
            session_destroy();
            include("./view/v_confirmationRegister.php");
        } else if (isset($_POST["submitCltCodeVerfication"])  && $_POST["CodeVerificationClt"] !== $_SESSION["CodeVerificationClt"]) {
            $er = "Le code de vérification est incorrect";
            include("./view/v_confirmationRegister.php");
        } else {
            echo "<script type='text/javascript'> document.location.replace('index.php?action=150');</script>";
            exit();
        }
        break;
}