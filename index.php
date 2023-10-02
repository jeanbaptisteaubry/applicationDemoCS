<?php
include "autoload.php";

if(isset($_SESSION["idUser"]))
{
    $idUser = $_SESSION["idUser"];
    $typeCompte = $_SESSION["typeCompte"];
}
else {
    $idUser = -1;
    $typeCompte = 1;
}




if(isset($_REQUEST["situation"]))
{
    $situation = $_REQUEST["situation"];
    if(isset($_REQUEST["action"]))
        $action  = $_REQUEST["action"];
    else
        $action  = "";
}
else {

    $situation = "accueilPublic";

    if(isset($_REQUEST["action"]))
        $action  = $_REQUEST["action"];
    else
        $action  = "";
}

$titre = Parametre_SelectTitre();
switch ($situation)
{
    case "accueilPublic":
        include "Controleur".DIRECTORY_SEPARATOR."accueilPublic.php";
        break;
    case "trucUserBase":
        include "Controleur".DIRECTORY_SEPARATOR."trucUserBase.php";
        break;
    case "trucUserRoot":
        include "Controleur".DIRECTORY_SEPARATOR."trucUserRoot.php";
        break;
}


