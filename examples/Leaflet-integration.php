<?php
$root = "..";
require_once("$root/_base.php");
?>

<?pageHeader("Examples")?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<h1>Leaflet integration</h1>

<p>Adding OSM Buildings to Leaflet as an extra layer. Also using layer switch and dynamic attribution.</p>

<code>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map).load();
L.control.layers({}, { Buildings:osmb }).addTo(map);
</code>

<script>
// L.control.layers({}, { Buildings:osmb }).addTo(map);
var code = document.getElementsByTagName('CODE')[0];
code.innerText = hljs.highlightBlock(code.innerText);
</script>

<?pageFooter()?>