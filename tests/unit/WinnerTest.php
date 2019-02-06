 <?php
 define("HAUT","7");
 define("LARG","7");
 $board=array();
 $turn=1;
require_once("app/Classes/winner.php");
//require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
class Coup_gagnant_Test extends TestCase
{
    public function test_nb_align()
    {

        $GLOBALS["turn"]=1;
        $GLOBALS["board"][0][1]=0;
        $GLOBALS["board"][1][1]=$GLOBALS["turn"];
        $GLOBALS["board"][2][1]=0;
     
       $Coup=new Winner;

       $this->assertEquals(
        0,
        $Coup->nb_align(-1,1,0,0),
         "it should return 0 if posx<0 ou posx>=LARG ou posy<0 ou posy>=HAUT !"
       );
 
       $this->assertEquals(
        1,
        $Coup->nb_align(1,1,1,0),
        "it should return 1 if board[posx][posy]==turns!"
       );

       
       
    }

      public function test_total_line()
      {

           $GLOBALS["turn"]=1;
           $GLOBALS["board"][0][1]=0;
           $GLOBALS["board"][1][1]=$GLOBALS["turn"];
           $GLOBALS["board"][2][1]=0;

         $Coup=new Winner;
         $this->assertEquals(
             1,
             $Coup->total_line(1,1,1,0),
             "it should return 1 "
            );
     }

  /*  public function test_is_win()
    {

        for ($col=0; $col<LARG; $col++) {
            for ($row=0; $row<HAUT; $row++) {
                $GLOBALS["board"][$col][$row]=0;
            }
        }
          $GLOBALS["turn"]=1;
           $GLOBALS["board"][0][1]=0;
           $GLOBALS["board"][1][1]=$GLOBALS["turn"];
           $GLOBALS["board"][2][1]=0;
           $donnees["column"]=2;

        $Coup=new Winner;
        $this->assertEquals(
            false,
            $Coup->is_win($donnees),
            "it should return false  "
           );
    }*/

} 