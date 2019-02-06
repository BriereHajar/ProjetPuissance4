<?php

class contrejoueur
{
    public function __construct($post){
        define('HAUT',7);
        define('LARG',7);

        session_start();
        if (isset($post['nomj1'])) {
            $_POST['init'] = true;
            $_SESSION['nomj1'] = $post['nomj1'];
            $_SESSION['nomj2'] = $post['nomj2'];
            setcookie("nomj1", $post['nomj1'], time()+12*24*3600); 
            setcookie("nomj2", $post['nomj2'], time()+12*24*3600);
        }

        if (!isset($_SESSION['nomj1'])) {
            $_SESSION['nomj1'] = $_COOKIE['nomj1'];
            $_SESSION['nomj2'] = $_COOKIE['nomj2'];
        }


        if (isset($_SESSION['board'])) {
            $GLOBALS['board'] = $_SESSION['board'];
            $GLOBALS['turn'] = $_SESSION['turn'];
        }
        $GLOBALS['j1'] = $_SESSION['nomj1'];
        $GLOBALS['j2'] = $_SESSION['nomj2'];

        include '../app/Classes/init.php';
        $Init = new Init;
        if ((!isset($GLOBALS['board'])) || (isset($_POST['clear']) && $_POST['clear'] == "Recommencer") || (isset($_POST['init']) && $_POST['init'])) {
            $Init->init();
            $GLOBALS['turn'] = 1;
            $_POST['init'] = false;
        }

        require_once '../app/Model/DAO.php';
        $DAO=new DAO;
        $j1= $DAO->getJoueur($GLOBALS['j1']);
        if(empty($j1))
            $DAO->addJoueur($GLOBALS['j1']);
        $j2=$DAO->getJoueur($GLOBALS['j2']);
        if (empty($j2))
            $DAO->addJoueur($GLOBALS['j2']);

        require_once '../app/Classes/printboard.php';
        $Printboard = new Printboard;

        require_once '../app/Classes/choise.php';
        $Choise = new Choise;

        require_once '../app/Classes/winner.php';
        $Winner = new Winner;

        require_once '../app/Classes/play.php';
        $Play = new Play;

        require_once("../app/Views/againstplayer.php");

        $_SESSION['board'] = $GLOBALS['board'];
        $_SESSION['turn'] = $GLOBALS['turn'];
    }

}