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
    $Utilisateur = ['admin', 'investor'];

    $valide = false;
    for ($i = 0; $i < 2; $i++) {
        if ($Utilisateur[$i] == 'investor') {
            $requete = 'SELECT email, passwordHash FROM investor WHERE email=:identif and passwordHash=:mdp ';
        } else {
            $requete = 'SELECT email, hashedPassword FROM admin WHERE email=:identif and hashedPassword=:mdp ';
        }
        $preparation = SGBDConnect()->prepare($requete);
        $preparation->bindParam(':identif', $identif);
        $preparation->bindParam(':mdp', $mdp);
        $preparation->execute();
        $count = $preparation->rowCount();
        if ($count > 0) {
            $_SESSION['TABLE'] = $Utilisateur[$i]; // ca va nous servir à gérer les accessibilité dans le site et pour faire la requete pour créer les sessions

            $valide = True;
            break;
        }
    }
    return $valide;
}

function CreerLesSession($identif, $table)
{
    if ($table == 'admin') {
        $requete = ' SELECT adminId FROM admin WHERE email="' . $identif . '" ';
    } else {
        $requete = ' SELECT investorId, lastName, firstName FROM investor WHERE email="' . $identif . '" ';
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
    $requete = "SELECT * FROM investor WHERE investorId=" . $id;
    $preparation = SGBDConnect()->query($requete);
    $preparation->setFetchMode(PDO::FETCH_ASSOC);
    $ligne = $preparation->fetch();
    return $ligne;
}

function getAllInvestors()
{
    $requete = "SELECT * FROM investor";
    $preparation = SGBDConnect()->query($requete);
    $preparation->setFetchMode(PDO::FETCH_ASSOC);
    $investors = $preparation->fetchAll();
    return $investors;
}

function updateInvestor($prenom, $nom, $societe, $adresse, $ville, $codePostal, $budget, $id)
{
    $requete = "UPDATE investor SET firstName='" . $prenom . "', lastName='" . $nom . "', societe='" . $societe . "' , adresse='" . $adresse . "' , ville='" . $ville . "', codePostal='" . $codePostal . "' , budget='" . $budget . "' WHERE investorId='" . $id . "'";
    $preparation = SGBDConnect()->prepare($requete);
    return $preparation->execute();
}
function addInvestor($MDP, $prenom, $nom, $email)
{
    $requete = "INSERT INTO investor ( passwordHash, firstName, lastName, email ) VALUES ('" . $MDP . "','" . $prenom . "','" . $nom . "','" . $email . "')";
    $preparation = SGBDConnect()->prepare($requete);
    return $preparation->execute();
}

function addFile($investorId)
{
    //$requete = "insert into document ( name, link, uploadDate, investorId) VALUES (':name',':link','" . $investorId . "'";
    $requete = "insert into document (investorId) VALUES ('".$investorId . "')";
    $connexion = SGBDConnect();
    $stmt = $connexion ->prepare($requete);
    //$stmt->bindParam(':name', $name);
    //$stmt->bindParam(':link', $link, PDO::PARAM_LOB);

    if($stmt->execute() === true) {
        $last_id = $connexion->lastInsertId();
        return $last_id;
    } else {
        return false;
    }
}

function addFileInfo($fileId, $name, $link){
    $requete = 'UPDATE document SET `name`=:docName,`link`=:docLink WHERE `documentId`=:docId;';
    
    $preparation = SGBDConnect()->prepare($requete);

    $preparation->bindParam(':docId', $fileId,PDO::PARAM_INT);
    $preparation->bindParam(':docName', $name);
    $preparation->bindParam(':docLink', $link, PDO::PARAM_LOB);

    var_dump($requete);
    var_dump($name);
    var_dump($link);

    return $preparation->execute();

function updateCagnotte($Cagnotte)
{
    $requete = "update investissement set Cagnotte=:cagnotte";
    $stmt = SGBDConnect()->prepare($requete);
    $stmt->bindParam(':cagnotte', $Cagnotte);
    return $stmt->execute();
}

function selectCagnotte()
{
    $requete = "SELECT Cagnotte FROM investissement";
    $preparation = SGBDConnect()->query($requete);
    $preparation->setFetchMode(PDO::FETCH_ASSOC);
    $ligne = $preparation->fetch();
    return $ligne;
}

function budgetTotal()
{
    $requete = "SELECT sum(budget) as 'budgetTotal' FROM investor";
    $preparation = SGBDConnect()->query($requete);
    $preparation->setFetchMode(PDO::FETCH_ASSOC);
    $ligne = $preparation->fetch();
    return $ligne;
}

function updateStatus($bol, $id)
{
    $requete = "update investor set confirmBudget=:bol where investorId=:id";
    $stmt = SGBDConnect()->prepare($requete);
    $stmt->bindParam(':bol', $bol);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}