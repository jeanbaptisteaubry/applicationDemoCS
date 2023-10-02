<?php
function  SousVue_Menu($typeCompte)
{
echo "<table>
        <tr>
            <td><a href='./index.php?situation=accueilPublic'>Accueil</a> </td>";

            switch( $typeCompte)
            {
                case 1:
                    echo "<td><a href='./index.php?situation=accueilPublic&action=seConnecter'>Se connecter</a> </td>";
                    break;
                case 2:
                    echo "<td><a href='./index.php?situation=accueilPublic&action=seDeconnecter'>Se déconnecter</a> </td>";
                    echo "<td><a href='./index.php?situation=trucUserBase&action=voir'>Truc Base</a> </td>";
                    break;
                case 3:
                    echo "<td><a href='./index.php?situation=accueilPublic&action=seDeconnecter'>Se déconnecter</a> </td>";
                    echo "<td><a href='./index.php?situation=trucUserRoot&action=voir'>Truc Root</a> </td>";
                    echo "<td><a href='./index.php?situation=trucUserRoot&action=rediger'>Rediger page d'accueil</a> </td>";
                    break;
            }

echo "        </tr>
    <table>";
}