<?php
$board=array();
require_once("app/Classes/play.php");
//require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
class Jeu_coup_Test extends TestCase
{
    
    public function test_play()
    {
        for ($col=0; $col<LARG; $col++) {
            for ($row=0; $row<HAUT; $row++) {
                $GLOBALS["board"][$col][$row]=0;
            }
        }
        
            $coup=new Play;
            $this->assertEquals(
                true,
                $coup->play(1,1),
                "it should return true "
               );
        
    }
}