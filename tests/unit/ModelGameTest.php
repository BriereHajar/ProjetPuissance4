<?php
require_once("app/Model/DAO.php");
//require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
class ModelGameTest extends TestCase
{
    
   /* public function test_getPlayer()
    {
       $model=new DAO;
       $this->assertEquals(
        464,
        $model->getJoueur("khadija"),
        "it should return 464 if the name was kk"
       );
       
    }*/

    public function test_createPlayer()
    {
       $model=new DAO;
       $this->assertEquals(
        true,
        $model->addJoueur("test"),
        "it should return true if the insert is ok !"
       );
       
    }
   /*
    public function test_updateScore()
    {
       $model=new DAO;
       $this->assertEquals(
        true,
        $model->incScore(2),
        "it should return the true if the Update  is ok !"
       );

    }
*/
    

}
