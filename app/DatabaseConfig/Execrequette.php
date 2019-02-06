<?php
// Ex�cution d'une requ�te avec PDO

function ExecRequete ($requete, $connexion)
{

    $resultat=$connexion->query($requete);

    if ($resultat)
        return $resultat;
    else {
        echo "<b>Erreur dans l'execution de la requete '$requete'.</b><br/>";

        exit;
    }



}

function ObjetSuivant ($resultat)
{

    return  $resultat->fetch();
}

// Recherche de la ligne suivante (retourne un tableau)
function LigneSuivante ($resultat)
{

    return $resultat->fetch(PDO::FETCH_ASSOC);
}


?>
