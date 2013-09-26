<?php
$root = "..";
require_once("$root/_base.php");

pageHeader("Examples");
?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<h1>Styles</h1>

<p>Change building styles and check the source code how setStyle() got affected.</p>

<p>
<div class="colorset">Wall color:
<button style="background:rgb(250,220,100);"      onclick="setStyle(this, 'wallColor')"></button>
<button style="background:rgba(100,100,250,0.7);" onclick="setStyle(this, 'wallColor')"></button>
<button style="background:rgb(250,100,100);"      onclick="setStyle(this, 'wallColor')"></button>
</div>

<div class="colorset">Roof color:
<button style="background:rgb(220,220,50);"  onclick="setStyle(this, 'roofColor')"></button>
<button style="background:rgb(150,100,150);" onclick="setStyle(this, 'roofColor')"></button>
<button style="background:rgb(200,150,100);" onclick="setStyle(this, 'roofColor')"></button>
</div>

<label><input type="checkbox" onclick="setStyle(this, 'shadows')" checked>Shadows</label>
</p>

<legend>Example</legend>
<code><?=htmlentities("<script src=\"OSMBuildings-Leaflet.js\"></script>
<script>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map).loadData();
osmb.setStyle({ {style} });
</script>
")?></code>

<script>
var wallColor, roofColor, shadows = true;

function setStyle(el, type) {
  if (type === 'wallColor') {
    wallColor = el.style.backgroundColor;
  }
  if (type === 'roofColor') {
    roofColor = el.style.backgroundColor;
  }
  if (type === 'shadows') {
    shadows = el.checked;
  }

  osmb.setStyle({ wallColor:wallColor, roofColor:roofColor, shadows:shadows });

  var style = [];
  if (wallColor) {
    style.push('wallColor:\''+ wallColor +'\'');
  }
  if (roofColor) {
    style.push('roofColor:\''+ roofColor +'\'');
  }
  style.push('shadows:'+ (shadows ? 'true' : 'false'));

  Code.update({ style:style.join(', ') });
}

document.addEventListener('DOMContentLoaded', function() {
  Code.update({ style:'shadows:'+ (shadows ? 'true' : 'false') });
});
</script>

<?pageFooter()?>