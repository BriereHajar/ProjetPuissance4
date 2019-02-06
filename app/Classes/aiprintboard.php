<?php

class AIprintboard
{
    function print_board() {
        require_once("app/Classes/printline.php");
        $Printline = new Printline();

        echo '<form name="board" class="intable" action="index.php?url=machine" method="post">'."\n";
        echo '<table>'."\n";
        for ($i=(HAUT - 1); $i>=0; $i--) 
        $Printline->print_line($i);
        $Printline->print_line_form();
        echo "</table>\n</form>\n";
    }
}