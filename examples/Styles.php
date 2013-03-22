<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Styling", "examples");
?>

<link rel="stylesheet" href="<?php echo ROOT?>/assets/example.css">
<link rel="stylesheet" href="<?php echo ROOT?>/js/highlight/github.css">
<script src="<?php echo ROOT?>/js/Fly.js"></script>
<script src="<?php echo ROOT?>/js/scripts.js"></script>
<script src="<?php echo ROOT?>/js/highlight/highlight.pack.js"></script>

<div id="map"></div>

<p>Change building styles and check the source code how .setStyle() got affected.<br>
    Your server needs to be running for this example.</p>

<p>
Wall color:
<button class="color" style="background:rgb(250,220,100);" onclick="setStyle(this, 'wall')"></button>
<button class="color" style="background:rgba(100,100,250,0.7);" onclick="setStyle(this, 'wall')"></button>
<button class="color" style="background:rgb(250,100,100);" onclick="setStyle(this, 'wall')"></button><br>

Roof color:
<button class="color" style="background:rgb(220,220,50);" onclick="setStyle(this, 'roof')"></button>
<button class="color" style="background:rgb(150,100,150);" onclick="setStyle(this, 'roof')"></button>
<button class="color" style="background:rgb(200,150,100);" onclick="setStyle(this, 'roof')"></button>
</p>

<pre><code id="code"></code></pre>

<script id="src">
var map = new L.Map('map').setView([52.50440, 13.33522], 17);

new L.TileLayer(
    'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    { attribution:'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom:17 }
).addTo(map);

var osmb = new L.BuildingsLayer({ url: '<?php echo ROOT?>/server/?w={w}&n={n}&e={e}&s={s}&z={z}' }).addTo(map);
</script>

<script>
var src,
    wallColor = 'rgb(200,190,180)', roofColor = null;

function setStyle(el, type) {
    if (el) {
        if (type === 'wall') {
            wallColor = el.style.backgroundColor;
        }
        if (type === 'roof') {
            roofColor = el.style.backgroundColor;
        }
    }
    osmb.setStyle({ wallColor:wallColor, roofColor:roofColor });

    setCode('#code', src.innerText + 'osmb.setStyle({ wallColor: \'' + wallColor + '\', roofColor: \'' + roofColor + ' });');
}

Fly.on('ready', function () {
    src = Fly.wrap('#src');
    setCode('#code', src.innerText);
});
</script>

<?php pageFooter()?>