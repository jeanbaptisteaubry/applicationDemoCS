<?php

$test = false;
while(!$test) {
    echo "Quelle est l'ip du serveur de base de données ?";
    $IPBDD = readline();

    echo "Quel est la base de données ?";
    $BDD = readline();

    echo "Quel est l'utilisateur ayant les droits ?";
    $USERBDD = readline();

    echo "Quel est son mot de passe ?";
    $MDPBDD = readline();


    try {
        $instancePdo = new PDO('mysql:host=' . $IPBDD . ';dbname=' . $BDD . ';charset=UTF8', $USERBDD, $MDPBDD,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $test = true;
    } catch (PDOException $e) {
        echo $e->errorInfo();
        echo "\n";
    }
}

$instancePdo->query(file_get_contents('bdd.sql'));

# Chemin vers fichier texte
$file ="paramBDD.txt";
# Ouverture en mode écriture
$fileopen=(fopen("$file",'w'));
fwrite($fileopen,"IPBDD $IPBDD\n");
fwrite($fileopen,"BDD $BDD\n");
fwrite($fileopen,"USERBDD $USERBDD\n");
fwrite($fileopen,"MDPBDD $MDPBDD\n");
# On ferme le fichier proprement
fclose($fileopen);

include ".".DIRECTORY_SEPARATOR."Modele".DIRECTORY_SEPARATOR."BDD.php";

echo "Entrer le mot de passe de l'administrateur 'root' du logiciel :" ;
$mdp = readline();
Utilisateur_Creer("root",$mdp,3);
echo "installation finie. Vous devez supprimer ce fichier et le fichier bdd.sql (si tout fonctionne !).";
