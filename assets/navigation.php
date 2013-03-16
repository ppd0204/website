<?php
$navigation = array(
    "home"    =>array("url"=>ROOT,                   "name"=>"Map"),
    "examples"=>array("url"=>ROOT."/examples/",      "name"=>"Examples"),
    "download"=>array("url"=>ROOT."/download.php",   "name"=>"Download"),
    "docs"    =>array("url"=>ROOT."/documentation/", "name"=>"Documentation"),
    "faq"     =>array("url"=>ROOT."/questions.php",  "name"=>"Questions"),
    "about"   =>array("url"=>ROOT."/about.php",      "name"=>"About"),
    "feedback"=>array("url"=>"javascript:UserVoice.showPopupWidget();", "name"=>"Feedback")
);
?>

<ul class="navigation">
    <?php
    foreach($navigation AS $key=>$nav) {
        echo '<li '.($navKey === $key ? ' class="selected"' : '').'><a href="'.$nav["url"].'">'.$nav["name"].'</a></li>';
    }
    ?>
</ul>