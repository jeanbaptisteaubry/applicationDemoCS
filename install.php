<?php

$test = false;
$first = true;
while(!$test) {
    if(!$first) {
        echo "Erreur de connexion à la base de données. Veuillez réessayer.\n";
        echo "Quel paramètre voulez-vous modifier ?\n";
        echo "1. IPBDD\n";
        echo "2. BDD\n";
        echo "3. USERBDD\n";
        echo "4. MDPBDD\n";
        echo "5. Tout\n";
        echo "6. Quitter\n";
        echo "7. Aide\n";
        $choix = readline();
        switch ($choix) {
            case 1:
                echo "Quelle est l'ip ou le nom FQDN du serveur de base de données ?\n";
                $IPBDD = readline();
                break;
            case 2:
                echo "Quelle sera la base de données ?\n";
                $BDD = readline();
                break;
            case 3:
                echo "Quel est l'utilisateur ayant les droits sur cette base de données ?\n";
                $USERBDD = readline();
                break;
            case 4:
                echo "Quel est son mot de passe ?\n";
                $MDPBDD = readline();
                break;
            case 5:
                echo "Quelle est l'ip ou le nom FQDN du serveur de base de données ?\n";
                $IPBDD = readline();

                echo "Quelle sera la base de données ?\n";
                $BDD = readline();

                echo "Quel est l'utilisateur ayant les droits sur cette base de données ?\n";
                $USERBDD = readline();

                echo "Quel est son mot de passe ?\n";
                $MDPBDD = readline();
                break;
            case 6:
                die();
                break;
            case 7:
                echo "Si le serveur de base de données est sur la même machine que le serveur web, vous pouvez mettre 'localhost' pour l'ip.\n";
                echo "Si le serveur est distant, vous pouvez mettre l'ip ou le nom FQDN du serveur.\n";
                echo "Vous pouvez tester la connectivité de niveau 4 avec la commande nmap en testant le port par défaut de MySQL (3306).\n";
                echo "Pour installer nmap : [sudo] apt-get install nmap \n";
                break;
            default:
                echo "Erreur de saisie\n";
                break;
        }
    }
    else {
        echo "Quelle est l'ip ou le nom FQDN du serveur de base de données ?\n";
        $IPBDD = readline();

        echo "Quelle sera la base de données ?\n";
        $BDD = readline();

        echo "Quel est l'utilisateur ayant les droits sur cette base de données ?\n";
        $USERBDD = readline();

        echo "Quel est son mot de passe ?\n";
        $MDPBDD = readline();
    }

    if(!$first && $choix <= 5) {
        try {
            $instancePdo = new PDO('mysql:host=' . $IPBDD . ';dbname=' . $BDD . ';charset=UTF8', $USERBDD, $MDPBDD,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $test = true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "\n";
            $first = false;
        }
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
