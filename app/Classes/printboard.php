<?php

class Printboard
{
    function print_board() {
        require_once("app/Classes/printline.php");
        $Printline = new Printline();

        echo '<form class="intable" action="index.php?url=player" method="post">'."\n";
        echo '<table>'."\n";
        for ($i=(HAUT - 1); $i>=0; $i--)
         $Printline->print_line($i);
        $Printline->print_line_form();
        echo "</table>\n</form>\n";
    }
}