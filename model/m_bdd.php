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
        if ($Table = 'admin') {
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
    if ($table !== 'admin') {
        $_SESSION['NOM'] = $ligne[1];
        $_SESSION['PRENOM'] = $ligne[2];
    }
}

<<<<<<< Updated upstream
=======
function getInvestor($email)
{
    if(isset($email)){
        $requete = "SELECT * FROM investor WHERE email=:email";
        $preparation = SGBDConnect()->prepare($requete);
        $preparation->bindParam(':email', $email);
        return $preparation->execute();
    } else {
        $requete = "SELECT * FROM investor";
        $preparation = SGBDConnect()->prepare($requete);
    }
    return $preparation->execute();
}

function updateInvestor($prenom, $nom, $email, $societe, $adresse, $ville, $codePostal, $budget, $id)
{
    $requete = "update investor set firstName='" . $prenom . "', lastName='" . $nom . "', email='" . $email . "', societe='" . $societe . "' , adresse='" . $adresse . "' , ville='" . $ville . "', codePostal='" . $codePostal . "' , budget='" . $budget . "' where investorId='" . $id . "'";
    $preparation = SGBDConnect()->prepare($requete);
    return $preparation->execute();
}
>>>>>>> Stashed changes
function addInvestor($MDP, $prenom, $nom, $email)
{
    $requete = "insert into investor ( passwordHash, firstName, lastName, email ) VALUES ('" . $MDP . "','" . $prenom . "','" . $nom . "','" . $email . "')";
    $preparation = SGBDConnect()->prepare($requete);
    return $preparation->execute();
}

function addFile($file, $type, $investorId){
    $requete = "insert into document ( file, type, investorId) VALUES ('" . $file . "','" . $type . "','" . $investorId . "')";
    $preparation = SGBDConnect()->prepare($requete);
    return $preparation->execute();
}

