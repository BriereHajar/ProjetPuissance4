<?php

// Fonction Connexion

function Connexion ($pNom, $pMotPasse, $pBase, $pServeur)
{
    $dsn = 'mysql:host=' . $pServeur . ';dbname=' . $pBase;

    // Connexion au serveur
    try{

        $connexion = new PDO($dsn, $pNom, $pMotPasse);
        $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        // $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo $e->getMessage();

    }

    //$connexion = mysql_pconnect ($pServeur, $pNom, $pMotPasse);

    if (!$connexion) {
        echo "Désolé, connexion au serveur $pServeur impossible\n";
        exit;
    }

    // On renvoie la variable de connexion
    return $connexion;
} // Fin de la fonction







?>