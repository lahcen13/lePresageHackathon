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
            $message = "". $_SESSION["nom"] . " ". $_SESSION["prenom"] . ", <p>Pour valider votre inscription, merci de saisir le code de confirmation suivant : " . $_SESSION["CodeVerificationClt"] . ".</p><p> Cordialement, <br>Le Présage. </p>";
            //$key = "c86e0d7c45ca4b0ae07055e4687f4dc0";
            $mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
            
            $mail->IsSMTP(); // active SMTP
            $mail->IsHTML(true);
            $mail->CharSet = "UTF-8";

            $mail->Host = 'smtp.gmail.com';
            $mail->Username = 'equipe8.hackaton@gmail.com';
            //$mail->Password = md5($key);
            $mail->Password = 'poubelux3000';

            $mail->SMTPAuth = true;  // Authentification SMTP active
            $mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
            
            $mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
            
            $mail->Port = 465;
        
            $mail->SetFrom('equipe8.hackaton@gmail.com', 'Le Présage');
            $mail->Subject = 'Confirmation d\'inscription en tant qu\'investisseur';
            $mail->Body = $message;
            $mail->AddAddress($_SESSION['mail']);
            if (!$mail->Send()) {
                echo 'Mail error: ' . $mail->ErrorInfo;
            }
            include('./view/v_confirmationRegister.php');
        } else {
            
            header('location: index.php?request=30&action=50', true);
        }
        break;

    case VerificationCodeConfirmation:
        if (isset($_POST["confirmation"])) {
            if (isset($_POST["confirmCode"])){
                if($_POST["confirmCode"] == $_SESSION["CodeVerificationClt"]){
                    $_SESSION["nom"] = $_POST["nom"];
                    $_SESSION["prenom"] = $_POST["prenom"];
                    $_SESSION["mail"] = $_POST["mail"];
                    $_SESSION["mdp"] = $_POST["mdp"];
                    echo addInvestor(md5($_SESSION["mdp"]), $_SESSION["prenom"], $_SESSION["nom"], $_SESSION["mail"]);
                    session_destroy();
                    include("./view/v_confirmationRegister.php");
                }
                // else{
                //     $er = "Le code de vérification est incorrect";
                //     include("./view/v_confirmationRegister.php");
                // }  
        
            }
        } else {
            // echo "<script type='text/javascript'> document.location.replace('index.php?action=150');</script>";
            //  exit();
            header('location: index.php?request=30&action=50', true);
        }
        break;
}