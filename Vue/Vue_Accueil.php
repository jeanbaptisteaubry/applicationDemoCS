<?php
function Vue_Accueil($titre, $texte, $msgVue = "", $titleApplication = "")
{
    echo "
<HTML>
    <head>
        <title>$titleApplication</title>
        <meta charset='UTF-8'>
    </head>

    <body>
        <H1>$titleApplication</H1>
        ";
            SousVue_Menu(1);
        echo "

        <H1>$titre</H1>
        <div>$texte</div>
        <div>$msgVue</div>
    </body>
</HTML>";
}
