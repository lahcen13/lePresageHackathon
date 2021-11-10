<?php
if (!isset($_SESSION['MAIL'])) {
    header('location: index.php', true);
}

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = c_profil;
}

switch ($_REQUEST['action']) {
    case c_profil:
        $ligne = getInvestor($_SESSION['ID']);
        $email = $ligne['email'];
        $nom = $ligne['firstName'];
        $prenom = $ligne['lastName'];
        $budget = $ligne['budget'];
        $adresse = $ligne['adresse'];
        $ville = $ligne['ville'];
        $codePostal = $ligne['codePostal'];
        $societe = $ligne['societe'];
        include('./view/v_profil.php');
        break;

    case Modifier:
        if (isset($_POST["SubmitModifierProfil"])) {
            updateInvestor($_POST['p_prenom'], $_POST['p_nom'], $_POST['p_societe'], $_POST['p_adresse'], $_POST['p_ville'], $_POST['p_codePostal'], $_POST['p_budget'], $_SESSION['ID']);
            $ligne = getInvestor($_SESSION['ID']);
            $email = $ligne['email'];
            $nom = $ligne['firstName'];
            $prenom = $ligne['lastName'];
            $budget = $ligne['budget'];
            $adresse = $ligne['adresse'];
            $ville = $ligne['ville'];
            $codePostal = $ligne['codePostal'];
            $societe = $ligne['societe'];
        }
        include('./view/v_profil.php');
        break;

    case AddFile:
        if($_FILES["upload_file"]["error"]){
            echo "File could not be uploaded";
        } else {



            $targetDirectory = "../uploads/";
            $originalFileName = basename($_FILES["upload_file"]["name"]);

            $fileType = strtolower(pathinfo($originalFileName,PATHINFO_EXTENSION));

            $fileId = addFile($_SESSION['ID']); //on utilise le nom du fichier et l'id de l'user pour ajouter une file à la bdd, cela retourne son numéro 

            if($fileId === false){
                echo "DB insert failed.";
            } else {
                $targetFileName = $fileId .'.'.$fileType;

                move_uploaded_file($_FILES["upload_file"]["tmp_name"],$targetDirectory.$targetFileName); //ça marche incroyablement bien, il faut juste créer, au même niveau que le répertoire LePresageHackathon, un répertoire uploads
                if(addFileInfo($fileId, $originalFileName, $targetDirectory.$targetFileName)){
                    header('location: index.php?request='.Profil);
                }
            }
            
        }       
}