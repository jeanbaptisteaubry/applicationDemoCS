<?php
function Vue_SeConnecter($msgVue= "")
{
    echo "
<HTML>

<body>

";

    SousVue_Menu(1);

    echo "
<H1>Se connecter</H1>";


    if (isset($msgVue)) {
        echo "<H3>$msgVue</H3>";
    }

    echo '
<table>
    <form>
        <input type="hidden" name="situation" value="accueilPublic">
        <input type="hidden" name="action" value="connexion">
        <tr>
            <td>
                Pseudo
            </td>
            <td>
                <input type="text" name="pseudo">
            </td>
        </tr>
        <tr>
            <td>Mot de passe</td>
            <td>
                <input type="password" name="motDePasse">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Se Connecter">
            </td>
        </tr>
    </form>
        <tr>
            <td colspan="2">
                <form>
                    <input type="hidden" name="situation" value="accueilPublic">
                    <input type="hidden" name="action" value="mdpPerdu">
                    <input type="submit" value="Mot de passe perdu ?">
                </form>
            </td>
        </tr>
</table>

</body>
</HTML>
';
}

