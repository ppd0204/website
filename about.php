<?php
$root = ".";
require_once("$root/base.php");

pageHeader("About me");
?>

<p>Hi,</p>

<img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim("jama@keks.com")))?>" style="width:80px;height:80px;float:right;">

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