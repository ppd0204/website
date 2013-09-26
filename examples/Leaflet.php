<?php
$root = "..";
require_once("$root/_base.php");
?>

<?pageHeader("Examples")?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<h1>Leaflet integration</h1>

<p>Adding OSM Buildings to Leaflet as an extra layer. Also using layer switch and dynamic attribution.</p>

<code><?=htmlentities("<script src=\"OSMBuildings-Leaflet.js\"></script>
<script>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map).loadData();
L.control.layers({}, { Buildings:osmb }).addTo(map); // add to layer switcher (optional)
</script>
")?></code>

<script>
document.addEventListener('DOMContentLoaded', function() {
  L.control.layers({}, { Buildings:osmb }).setPosition('bottomright').addTo(map);
  hljs.highlightBlock(getElement('CODE'));
});
</script>

<?pageFooter()?>