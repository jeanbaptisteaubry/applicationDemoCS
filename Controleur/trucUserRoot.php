<?php
switch ($action) {
    case "rediger" :
        $page = Page_SelectById(1);
        Vue_Rediger($page["titre"], $page["texte"], $msgVue= "");
        break;
    case "redigerSave":
        Page_Maj(1, $_REQUEST["titre"], $_REQUEST["texte"]);
        $page = Page_SelectById(1);
        Vue_Rediger($page["titre"], $page["texte"],  "MAJ OK");
        break;
    default:
        Vue_Accueil_UserRoot();
        break;
}
//On pourrait imaginer d'autres acions dans ce contrôleur