<?php

function SGBDConnect()
{
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=le_presage_hackathon', 'root', '');
        $connexion->query('SET NAMES UTF8');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'erreur !:' . $e->getMessage() . '<br/>';
        exit();
    }
    return $connexion;
}

function siIdentificationExiste($identif, $mdp)
{
    $Utilisateur = array('admin', 'investor');
    $valide = false;
    foreach ($Utilisateur as $Table) {
        if ($Table = 'investor') {
            $requete = 'select email, passwordHash from investor where email=:identif and passwordHash=:mdp ';
        } else {
            $requete = 'select email, hashedPassword from admin where email=:identif and hashedPassword=:mdp ';
        }
        $preparation = SGBDConnect()->prepare($requete);
        $preparation->bindParam(':identif', $identif);
        $preparation->bindParam(':mdp', $mdp);
        $preparation->execute();
        $count = $preparation->rowCount();
        if ($count > 0) {
            $_SESSION['TABLE'] = $Table; // ca va nous servir à gérer les accessibilité dans le site et pour faire la requete pour créer les sessions
            $valide = True;
            break;
        }
    }
    return $valide;
}

function CreerLesSession($identif, $table)
{
    if ($table == 'admin') {
        $requete = ' select adminId from admin where email="' . $identif . '" ';
    } else {
        $requete = ' select investorId, lastName, firstName from investor where email="' . $identif . '" ';
    }
    $preparation = SGBDConnect()->query($requete);
    $preparation->setFetchMode(PDO::FETCH_NUM);
    $ligne = $preparation->fetch();
    $_SESSION['MAIL'] = $identif;
    $_SESSION['ID'] = $ligne[0];
    if ($table !== 'admin') {
        $_SESSION['NOM'] = $ligne[1];
        var_dump($_SESSION['NOM']);
        $_SESSION['PRENOM'] = $ligne[2];
    }
}

function getInvestor($id)
{
    $requete = "select * from investor where investorId=" . $id;
    $preparation = SGBDConnect()->query($requete);
    $preparation->setFetchMode(PDO::FETCH_ASSOC);
    $ligne = $preparation->fetch();
    return $ligne;
}

function updateInvestor($prenom, $nom, $societe, $adresse, $ville, $codePostal, $budget, $id)
{
    $requete = "update investor set firstName='" . $prenom . "', lastName='" . $nom . "', societe='" . $societe . "' , adresse='" . $adresse . "' , ville='" . $ville . "', codePostal='" . $codePostal . "' , budget='" . $budget . "' where investorId='" . $id . "'";
    $preparation = SGBDConnect()->prepare($requete);
    return $preparation->execute();
}
function addInvestor($MDP, $prenom, $nom, $email)
{
    $requete = "insert into investor ( passwordHash, firstName, lastName, email ) VALUES ('" . $MDP . "','" . $prenom . "','" . $nom . "','" . $email . "')";
    $preparation = SGBDConnect()->prepare($requete);
    return $preparation->execute();
}

function addFile($file, $type, $investorId)
{
    $requete = "insert into document ( file, type, investorId) VALUES (':file',':type','" . $investorId . "')";
    $stmt = SGBDConnect()->prepare($requete);
    $stmt->bindParam(':file', $file, PDO::PARAM_LOB);
    $stmt->bindParam(':type', $type);
    return $stmt->execute();
}