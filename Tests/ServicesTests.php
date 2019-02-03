<?php
/**
 * Created by PhpStorm.
 * User: Meed
 * Date: 2/3/2019
 * Time: 9:20 PM
 */


class ServicesTests extends PHPUnit_Framework_TestCase
{


    public function testAffichagePlateau(){
        require_once 'Services/AffichagePlateau.php';
        $affichagePlateau = new AffichagePlateau();
        $this->assertTrue($affichagePlateau->print_board() );

    }
    public function testInitialisationPlateau(){
        require_once 'Services/InitialisationPlateau.php';
        $initPlateau = new InitialisationPlateau();
        $expected="initDone";
        $this->assertEquals($expected,$initPlateau->init());

    }
    public function testChoix(){
        require_once 'Services/Choix.php';
        $choix = new Choix();
        $expected="choiceSelected";
        $this->assertEquals($expected,$choix->affiche_choix());

    }
    public function testAIAffichagePlateau(){
        require_once 'Services/AIAffichagePlateau.php';
        $affichagePlateau = new AIAffichagePlateau();
        $this->assertTrue($affichagePlateau->print_board() );

    } public function testJouerCoup(){
    require_once 'Services/JouerCoup.php';
    $coup = new JouerCoup();
    $this->assertTrue($coup->play(1,1) );

}



}