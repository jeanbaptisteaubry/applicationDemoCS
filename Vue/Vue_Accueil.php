<?php
function Vue_Accueil($titre, $texte, $msgVue = "")
{
    echo "
<HTML>

    <body>

        ";
            SousVue_Menu(1);
        echo "

        <H1>$titre</H1>
        <div>$texte</div>
        <div>$msgVue</div>
    </body>
</HTML>";
}
