<?php

class Choise
{
    function print_choise(){
        //global $j1, $j2, $turn;
        echo "C'est à ".(($GLOBALS['turn'] == 1)? $GLOBALS['j1'] : $GLOBALS['j2']).' (<img id="img" value='.$GLOBALS['turn'].' src="'.(($GLOBALS['turn'] == 1)? "public/img/joueur1.png" : "public/img/joueur2.png" ).'" alt="pionJoueur" height="15">) de jouer.'."\n";
    }
}