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




function addInvestor($MDP, $prenom, $nom, $email)
{
    $requete = "insert into investor ( passwordHash, firstName, lastName, email, gender, budget, company, adress, city, zipCode) VALUES ('" . $MDP . "','" . $prenom . "','" . $nom . "','" . $email . "','" . $civilite . "','" . $budget . "','" . $societe . "','" . $adresse . "','" . $ville . "','" . $codePostal . "')";
    $preparation = SGBDConnect()->prepare($requete);
    return $preparation->execute();
}