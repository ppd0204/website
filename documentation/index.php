<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Documentation", "docs");
?>

<p>Most examples and refer to <a href="http://leafletjs.com">LeafletJS</a> as preferred Map Engine.<br>
Make sure you are running the latest version <?php echo LEAFLET_VERSION_LATEST?></p>

<h2>Download</h2>

<p><a href="https://github.com/kekscom/osmbuildings/zipball/v<?php echo OSMB_VERSION_LATEST?>">Download OSM Buildings <?php echo OSMB_VERSION_LATEST?></a>.
The package contains source code, sample data and a build system.<br>
The library files are located in the <code>dist</code> folder.</p>

<p>Alternatively <a href="https://github.com/kekscom/osmbuildings">head over to GitHub</a> and pull the source code.
Make sure you also read the <a href="https://github.com/kekscom/osmbuildings/blob/v<?php echo OSMB_VERSION_LATEST?>/CHANGELOG.md">Changelog</a> carefully.</p>

<h2>Integration</h2>

<ul>
    <li><a href="integration-leaflet.php">Integration with Leaflet</a></li>
    <li><a href="integration-openlayers.php">Integration with OpenLayers</a></li>
    <li><a href="api.php">API</a></li>
    <li><a href="server.php">Server</a></li>
</ul>

<?php pageFooter()?>