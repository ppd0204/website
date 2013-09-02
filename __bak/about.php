<?php
$root = ".";
require_once("$root/_base.php");

pageHeader("About me");
?>

<p>Hi,</p>

<img src="http://www.gravatar.com/avatar/<?=md5(strtolower(trim("jama@keks.com")))?>" style="width:80px;height:80px;float:right;">

<p>I'm Jan Marsch, living in Berlin, Germany.</p>

<p>Since 1998 I work freelance in Software development under the company label of <a href="http://keks.com">keks.com</a>.<br>
I'd describe myself as Senior Software Engineer for web and mobile web applications.</p>

<p>My primary focus is on JavaScript, HTML5, Canvas, PHP, REST and Databases.<br>
Additional strenghts are entrepreneural thinking, affinity to mobile, maps and UX.</p>

<p>I've been working in  several long term projects for
Nokia Maps, Nokia Places for web and mobile,
data center administration for Daimler AG,
web development for Bayer AG,
intranet development for Deutsche Lufthansa AG and for a subsidiary of TNT Post.</p>

<p>I'm fluent in German and English.</p>

<p>Get in touch: <a href="mailto:jama@keks.com">jama@keks.com</a>

<?php pageFooter() ?>



    <iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://ghbtns.com/github-btn.html?user=kekscom&repo=osmbuildings&type=watch&count=true" style="width:110px;height:20px;"></iframe>
<iframe allowtransparency="true" frameborder="0" scrolling="no" src="https://platform.twitter.com/widgets/tweet_button.html?id=twitter-widget-0&lang=en&count=none&original_referer=http://osmbuildings.org&related=kekscom&size=m&text=<?=rawurlencode("OSM Buildings - A leightweight JavaScript library for visualizing building data on interactive maps")?>&url=http://osmbuildings.org&via=osmbuildings" class="twitter-share-button twitter-count-horizontal" style="width:80px; height:20px;"></iframe>
<iframe allowtransparency="true" frameborder="0" scrolling="no" src="https://platform.twitter.com/widgets/follow_button.html?id=twitter-widget-2&lang=en&screen_name=osmbuildings&show_count=true&show_screen_name=true&size=m" class="twitter-follow-button" style="width:250px;height:20px;"></iframe>
<iframe allowtransparency="true" frameborder="0" scrolling="no" src="https://api.flattr.com/button/view/?popout=0&button=compact&category=software&uid=osmbuildings&url=http://osmbuildings.org&title=OSM%20Buildings&description=Visualizing%203D%20building%20geometry%20on%20interactive%20maps" style="width:55px;height:20px;"></iframe>
&copy; <?=date('Y')?> OSM Buildings &bull; <a href="<?=ROOT?>/about.php">Jan Marsch</a>
&bull; <a href="javascript:UserVoice.showPopupWidget();">Feedback</a>
