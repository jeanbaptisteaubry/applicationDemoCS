<?php
function Vue_Accueil_UserRoot($msgVue= "", $titleApplication = "")
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


    SousVue_Menu(3);

    echo "
<H1>Accueil Utilisateur de type root</H1>
";

    if (isset($msgVue)) {
        echo "<H3>$msgVue</H3>";
    }

    echo "
</body>
</HTML>";
    }