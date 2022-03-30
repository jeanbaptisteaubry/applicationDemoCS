<?php
function Vue_Accueil_Public($msgVue = "")
{

    echo "<HTML>

<body>

";

SousVue_Menu(2);

echo "
<H1>Accueil Public</H1>
";
if(isset($msgVue))
{
    echo " < H3>$msgVue </H3 > ";
}

echo "
</body>
</HTML>
";
}