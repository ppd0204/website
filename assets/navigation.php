<?php
$navigation = array(
    "home"    =>array("url"=>ROOT,                   "name"=>"Map"),
    "examples"=>array("url"=>ROOT."/examples/",      "name"=>"Examples"),
    "docs"    =>array("url"=>ROOT."/documentation/", "name"=>"Documentation"),
    "faq"     =>array("url"=>ROOT."/questions.php",  "name"=>"Questions"),
    "about"   =>array("url"=>ROOT."/about.php",      "name"=>"About"),
    "feedback"=>array("url"=>"https://osmbuildings.uservoice.com/", "name"=>"Feedback")
);
?>

<ul class="navigation">
    <?php
    foreach($navigation AS $k=>$v) {
        echo '<li '.($nav === $k ? ' class="selected"' : '').'><a href="'.$v["url"].'">'.$v["name"].'</a></li>';
    }
    ?>
</ul>