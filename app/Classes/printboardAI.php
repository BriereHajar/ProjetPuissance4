<?php

class PrintboardAI
{
    function print_board_AI() {
        require_once("app/Classes/printline.php");
        $printline = new printline();

        echo '<form name="board" class="intable" action="index.php?url=contreordinateur" method="post">'."\n";
        echo '<table>'."\n";
        for ($i=(HAUT - 1); $i>=0; $i--) 
        $printline->print_line($i);
        $printline->print_line_form();
        echo "</table>\n</form>\n";
    }
}