<?php
function Vue_Accueil_Root($msgVue = "")
{

    echo "
<HTML>

<body>
";
SousVue_Menu(3);
echo "

<H1>Accueil root</H1>

";
if(isset($msgVue))
{
    echo "<H3>$msgVue</H3>";
}

echo "
</body>
</HTML>

";
}