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
    $Utilisateur = array('admin', 'inves');
    $valide = false;
    for ($i = 0; $i < 2; $i++) {
        $requete = 'select ID_PSEUDO, MDP from ' . $Utilisateur[$i] . ' where ID_PSEUDO=:identif and MDP=:mdp ';
        $preparation = SGBDConnect()->prepare($requete);
        $preparation->bindParam(':identif', $identif);
        $preparation->bindParam(':mdp', $mdp);
        $preparation->execute();
        $count = $preparation->rowCount();
        if ($count > 0) {
            $_SESSION['TABLE'] = $Utilisateur[$i]; // ca va nous servir à gérer les accessibilité dans le site et pour faire la requete pour créer les sessions
            $valide = True;
        }
    }
    return $valide;
}

function CreerLesSession($identif, $table)
{
    $requete = ' select ID_PSEUDO, NOM, PRENOM from ' . $table . ' where ID_PSEUDO="' . $identif . '" ';
    $preparation = SGBDConnect()->query($requete);
    $preparation->setFetchMode(PDO::FETCH_NUM);
    $ligne = $preparation->fetch();
    $_SESSION['IDENTIFIANT'] = $ligne[0];
    $_SESSION['NOM'] = $ligne[1];
    $_SESSION['PRENOM'] = $ligne[2];
}


function verifieSiAdmin($IDENTIF)
{
    $requete = ' select adherent.STATUT from adherent where adherent.ID_PSEUDO="' . $IDENTIF . '"';
    $preparation = SGBDConnect()->query($requete);
    $preparation->setFetchMode(PDO::FETCH_NUM);
    $ligne = $preparation->fetch();
    $value = false;
    if ($ligne[0] == "Admin") {
        $value = true;
    }
    return $value;
}

function    addInvestor($MDP, $prenom, $nom, $email)
{
    $requete = "insert into investor ( passwordHash, firstName, lastName, email) VALUES ('" . $MDP . "','" . $prenom . "','" . $nom . "','" . $email . "')";
    $preparation = SGBDConnect()->prepare($requete);
    return $preparation->execute();
}