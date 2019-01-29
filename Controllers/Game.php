<?php

class Game
{
    public function __construct($post){
        define('HAUT',7);
        define('LARG',7);

        session_start();

        // On recupere le nom des joueurs si on commence
        // et on en profite pour envoyer un cookie pour se souvenir des noms
        if (isset($post['nomj1'])) {
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

        include 'Services/InitialisationPlateau.php';
        $initialisationPlateau = new InitialisationPlateau();
        if ((!isset($GLOBALS['board'])) || (isset($_POST['clear']) && $_POST['clear'] == "Recommencer")) {
            $initialisationPlateau->init();
            $GLOBALS['turn'] = 1;

        }

        require_once 'Services/AffichagePlateau.php';
        $affichagePlateau = new AffichagePlateau();

        require_once 'Services/Choix.php';
        $choix = new Choix();

        require_once 'Services/CoupGagnant.php';
        $coupGagnant = new CoupGagnant();

        require_once 'Services/JouerCoup.php';
        $jouerCoup = new JouerCoup();

        require_once("Views/GameView.php");

        $_SESSION['board'] = $GLOBALS['board'];
        $_SESSION['turn'] = $GLOBALS['turn'];
    }

}