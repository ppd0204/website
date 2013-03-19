<?php

define("ROOT", isset($root) ? $root : ".");
require_once(ROOT."/config.php");

//*****************************************************************************

function pageHeader($title = "", $nav = "") {
    header("Content-Type: text/html; charset=utf-8");
    require_once(ROOT."/assets/header.php");
}

function pageFooter() {
    require_once(ROOT."/assets/footer.php");
}

?>