<?php
switch($action)
{
    case "" :
        $page = Page_SelectById(1);
        Vue_Accueil($page["titre"], $page["texte"], "", $titre);
        break;
    case "seConnecter":
        Vue_SeConnecter("", $titre);
        break;
    case "connexion":
        if (isset($_REQUEST["pseudo"]) && isset($_REQUEST["motDePasse"]))
        {
            $utilisateur = Utilisateur_Selection_ParPseudo($_REQUEST["pseudo"]);
            if(is_null($utilisateur) )
            {
                Vue_SeConnecter("Mail inconnue", $titre);
            }
            else
            {
                if(password_verify($_REQUEST["motDePasse"], $utilisateur["motDePasse"]))
                {
                    $_SESSION["idUser"]=$utilisateur["id"];
                    $_SESSION["typeCompte"]=$utilisateur["typeCompte"];
                    $idUser =$utilisateur["id"];
                    $typeCompte=$utilisateur["typeCompte"];
                    switch($typeCompte)
                    {
                        case 2 :
                            Vue_Accueil_Public();
                            break;
                        case 3:
                            Vue_Accueil_root("",$titre);
                            break;
                    }
                }
                else
                {

                    Vue_SeConnecter("mdp erroné inconnue",$titre);
                }
            }
        }
        else{
            Vue_SeConnecter("Il faut renseigner TOUS les champs",$titre);
        }
        break;
    case "mdpPerdu":
        break;
    case "seDeconnecter":
        session_destroy();
        unset($_SESSION);
        $page = Page_SelectById(1);
        Vue_Accueil($page["titre"], $page["texte"],'', $titre);
        break;

}