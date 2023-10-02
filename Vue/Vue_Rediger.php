<?php
function Vue_Rediger($titre, $texte, $msgVue= "", $titleApplication = "")
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
<H1>Rédiger la page d'accueil</H1>";


    if (isset($msgVue)) {
        echo "<H3>$msgVue</H3>";
    }

    echo '
<table>
    <form>
        <input type="hidden" name="situation" value="trucUserRoot">
        <input type="hidden" name="action" value="redigerSave">
        <tr>
            <td>
                Titre
            </td>
            <td>
                <input type="text" name="titre" value="'.$titre.'">
            </td>
        </tr>
        <tr>
            <td>Texte de la page en HTML (possible ou pas !)</td>
            <td>
                <textarea name ="texte">
                    '.$texte.'
                </textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Modifier" name="button">
            </td>
        </tr>
    </form>
</table>

</body>
</HTML>
';
}

