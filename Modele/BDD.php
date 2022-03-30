<?php

function Creer_Connexion()
{
    $myFile = "paramBDD.txt";
    $lines = file($myFile);//file in to an array
    foreach($lines as $line)
    {
        $var = explode(' ', $line, 2);
        if(!isset($var[1]))
            $var[1] = "";
        $arr[$var[0]] = trim($var[1]);
    }

    $instancePdo = new PDO('mysql:host='.$arr["IPBDD"].';dbname='.$arr["BDD"].';charset=UTF8',
        $arr["USERBDD"],
        $arr["MDPBDD"],
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
    return $instancePdo;
}


function Utilisateur_Selection_ParPseudo($pseudo)
{
    $connexion = Creer_Connexion();

    $requetePreparee = $connexion->prepare('select * from `utilisateur` where pseudo = :paramPseudo');
    $requetePreparee->bindParam('paramPseudo', $pseudo);
    $reponse = $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
    $utilisateur = $requetePreparee->fetch(PDO::FETCH_ASSOC);
    return $utilisateur;

}

function Utilisateur_Creer($pseudo, $motDePasseClair, $typeCompte)
{
    $connexionPDO = Creer_Connexion();
    $requetePreparee = $connexionPDO->prepare(
        'INSERT INTO `utilisateur` ( `pseudo`, `motDePasse`, `typeCompte`)
        VALUES (:parampseudo, :parammotDePasse, :paramtypeCompte);');

    $requetePreparee->bindParam('parampseudo', $pseudo);
    $motDePasseHache = password_hash($motDePasseClair, PASSWORD_DEFAULT);
    $requetePreparee->bindParam('parammotDePasse', $motDePasseHache);
    $requetePreparee->bindParam('paramtypeCompte', $typeCompte);
    $reponse = $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
    $idUtilisateur = $connexionPDO->lastInsertId();
    return $idUtilisateur;
}

function Page_Maj($idPage, $titre, $texte)
{
    $connexionPDO = Creer_Connexion();
    $requetePreparee = $connexionPDO->prepare(
        'UPDATE `page` 
                SET `titre` = :paramTitre, 
                    `texte` = :paramTexte 
                    WHERE `page`.`idPage` = :paramIdPage;');

    $requetePreparee->bindParam('paramTitre', $titre);
    $requetePreparee->bindParam('paramTexte', $texte);
    $requetePreparee->bindParam('paramIdPage', $idPage);
    $reponse = $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
    return $reponse;
}

function Page_SelectById($idPage)
{
    $connexionPDO = Creer_Connexion();
    $requetePreparee = $connexionPDO->prepare(
        'Select * from `page`  
                    WHERE `page`.`idPage` = :paramIdPage;');

    $requetePreparee->bindParam('paramIdPage', $idPage);
    $reponse = $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
    $page = $requetePreparee->fetch(PDO::FETCH_ASSOC);
    return $page;
}