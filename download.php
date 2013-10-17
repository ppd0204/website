<?php
$root = ".";
require_once("$root/_base.php");
?>

<?pageHeader("Download")?>

<div class="content">
    <h1>Download</h1>

    OSM Buildings is an additional layer to existing web maps.
    It is currently works with LeafletJS and OpenLayers, so have one of these running in your website.

    <p>I assume, <a href="http://leafletjs.com">Leaflet map engine</a> should be already integrated in your html page.<br>
    Make sure you are running at least version <?=$config["osmb"]["leaflet_version"]?></p>

    <p>Download <a href="https://github.com/kekscom/osmbuildings/archive/<?=$config["osmb"]["version"]?>.zip">OSM Buildings <?=$config["osmb"]["version"]?></a>,
    including sample data, compatible with Leaflet <?=$config["osmb"]["leaflet_version"]?><br>
    The download contains source code, data samples and a build system. The library files are located in the dist folder.</p>

    <p>Alternatively <a href="https://github.com/kekscom/osmbuildings">head over to GitHub</a> directly and pull the source.<br>
    Make sure you read the <a href="https://github.com/kekscom/osmbuildings/blob/<?=$config["osmb"]["version"]?>/README.md">Readme</a> and
    <a href="https://github.com/kekscom/osmbuildings/blob/<?=$config["osmb"]["version"]?>/CHANGELOG.md">Changelog</a>.</p>
</div>

<?pageFooter()?>