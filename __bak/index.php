<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://ghbtns.com/github-btn.html?user=kekscom&repo=osmbuildings&type=watch&count=true" style="width:110px;height:20px;"></iframe>
<iframe allowtransparency="true" frameborder="0" scrolling="no" src="https://platform.twitter.com/widgets/tweet_button.html?id=twitter-widget-0&lang=en&count=none&original_referer=http://osmbuildings.org&related=kekscom&size=m&text=<?=rawurlencode("OSM Buildings - A leightweight JavaScript library for visualizing building data on interactive maps")?>&url=http://osmbuildings.org&via=osmbuildings" class="twitter-share-button twitter-count-horizontal" style="width:80px; height:20px;"></iframe>
<iframe allowtransparency="true" frameborder="0" scrolling="no" src="https://platform.twitter.com/widgets/follow_button.html?id=twitter-widget-2&lang=en&screen_name=osmbuildings&show_count=true&show_screen_name=true&size=m" class="twitter-follow-button" style="width:250px;height:20px;"></iframe>
<iframe allowtransparency="true" frameborder="0" scrolling="no" src="https://api.flattr.com/button/view/?popout=0&button=compact&category=software&uid=osmbuildings&url=http://osmbuildings.org&title=OSM%20Buildings&description=Visualizing%203D%20building%20geometry%20on%20interactive%20maps" style="width:55px;height:20px;"></iframe>

&copy; <?=date('Y')?> OSM Buildings &bull; <a href="<?=ROOT?>/about.php">Jan Marsch</a>
&bull; <a href="javascript:UserVoice.showPopupWidget();">Feedback</a>


<form id="search" style="position:absolute;left:0;top:25px;">
	<input type="search" style="width:300px;" autocomplete="off">
</form>

<p>Click one of the locations above for some taller buildings. Pan the map to see the perspective effect.</p>

<p>Map engine base is <a href="http://leafletjs.com">Leaflet</a>, map tiles are provided by <a href="http://mapbox.com">MapBox</a>.</p>

<p>Building geometry is extracted from <a href="http://openstreetmap.org">OpenStreetMap</a> files. The examples here contain about 250k building footprints
from Berlin and about 50k footprints from Frankfurt, Germany.</p>

<p>OSM Buildings is using Canvas 2D operations only - <strong>this is not WebGL</strong>.<br>
Overall size of the minified library is <?php printf('%.1Fk', $config["osmb"]["size_minified"])?> (<?php printf('%.1Fk', $config["osmb"]["size_gzipped"])?> gzipped).</p>

email
call
skype
xing