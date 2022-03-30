<?php

function Vue_Accueil_UserBase($msgVue= "")
{

    echo "<HTML>

<body>
";
    SousVue_Menu(1);
    echo "

<H1>Accueil Utilisateur de base</H1>
";

    if (isset($msgVue)) {
        echo "<H3>$msgVue</H3>";
    }
    echo "
</body>
</HTML>";
}