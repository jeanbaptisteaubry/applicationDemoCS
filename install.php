<?php

$test = false;
while(!$test) {
    echo "Quelle est l'ip ou le nom FQDN du serveur de base de données ?\n";
    $IPBDD = readline();

    echo "Quelle sera la base de données ?\n";
    $BDD = readline();

    echo "Quel est l'utilisateur ayant les droits sur cette base de données ?\n";
    $USERBDD = readline();

    echo "Quel est son mot de passe ?\n";
    $MDPBDD = readline();


    try {
        $instancePdo = new PDO('mysql:host=' . $IPBDD . ';dbname=' . $BDD . ';charset=UTF8', $USERBDD, $MDPBDD,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $test = true;
    } catch (PDOException $e) {
        echo $e->getMessage();
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

echo "Entrer le mot de passe de l'administrateur 'root' du logiciel :\n" ;
$mdp = readline();
Utilisateur_Creer("root",$mdp,3);
echo "Base de données OK\n";

echo "Quel sera le nom de cette application ? (Rep, Pro, Extra, ...)\n";
$nomAppli = readline();
$rqt = "UPDATE `parametre` SET `valeur` = '$nomAppli' WHERE `parametre`.`id` = 1;";
$instancePdo->query($rqt);

echo "installation finie. \nVous devriez supprimer ce fichier et le fichier bdd.sql (si tout fonctionne !).";
die();
?>
SI LE PHP N'Est PAS ACTIF SUR VOTRE SERVEUR WEB.
POUR L'ACTIVER :
sudo apt-get install php
sudo apt-get install php-mysql libapache2-mod-php
sudo service apache2 restart

puis relancer ce script.
