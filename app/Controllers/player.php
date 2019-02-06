<?php

class Player
{
    public function __construct($post){
        define('HAUT',7);
        define('LARG',7);

        session_start();

        // On recupere le nom des joueurs si on commence
        // et on en profite pour envoyer un cookie pour se souvenir des noms
        if (isset($post['nomj1'])) {
            $_POST['init'] = true;
            $_SESSION['nomj1'] = $post['nomj1'];
            $_SESSION['nomj2'] = $post['nomj2'];
            setcookie("nomj1", $post['nomj1'], time()+12*24*3600); // expire dans 12 jours
            setcookie("nomj2", $post['nomj2'], time()+12*24*3600);
        }

        // Dans le cas ou la session a expire, on reprend aussi les noms dans les cookies
        if (!isset($_SESSION['nomj1'])) {
            $_SESSION['nomj1'] = $_COOKIE['nomj1'];
            $_SESSION['nomj2'] = $_COOKIE['nomj2'];
        }

        // on definie des noms de variables plus courts pour simplifier le code
        // mais il ne faut pas oublier de remettre a jour le tableau $_SESSION tout
        // a la fin car c'est le seul conserve
        if (isset($_SESSION['board'])) {
            $GLOBALS['board'] = $_SESSION['board'];
            $GLOBALS['turn'] = $_SESSION['turn'];
        }
        $GLOBALS['j1'] = $_SESSION['nomj1'];
        $GLOBALS['j2'] = $_SESSION['nomj2'];

        include 'app/Classes/initboard.php';
        $Initboard = new Initboard;
        if ((!isset($GLOBALS['board'])) || (isset($_POST['clear']) && $_POST['clear'] == "Recommencer") || (isset($_POST['init']) && $_POST['init'])) {
            $Initboard->init();
            $GLOBALS['turn'] = 1;
            $_POST['init'] = false;
        }

        require_once 'app/Model/dao.php';
        $DAO=new DAO;

        $j1= $DAO->getJoueur($GLOBALS['j1']);
        if(empty($j1))
            $DAO->addJoueur($GLOBALS['j1']);
        $j2=$DAO->getJoueur($GLOBALS['j2']);
        if (empty($j2))
            $DAO->addJoueur($GLOBALS['j2']);

        require_once 'app/Classes/printboard.php';
        $Printboard = new Printboard;

        require_once 'app/Classes/choise.php';
        $Choise = new Choise;

        require_once 'app/Classes/winner.php';
        $coupGagnant = new Winner;

        require_once 'app/Classes/play.php';
        $jouerCoup = new Play;

        require_once("app/Views/againstplayer.php");

        $_SESSION['board'] = $GLOBALS['board'];
        $_SESSION['turn'] = $GLOBALS['turn'];
    }

}