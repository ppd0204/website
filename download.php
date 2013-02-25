<?php
$root = '.';
require_once($root.'/base.php');

pageHeader('Download OSM Buildings');
?>

<p>I assume, <a href="http://leafletjs.com">Leaflet map engine</a> should be already integrated in your html page.<br>
Make sure you are running the latest version <?php echo LEAFLET_VERSION_LATEST?></p>

<p>Download <a href="https://github.com/kekscom/osmbuildings/zipball/v<?php echo OSMB_VERSION_LATEST?>">OSM Buildings <?php echo OSMB_VERSION_LATEST?></a>, including sample data, compatible with Leaflet <?php echo LEAFLET_VERSION_LATEST?><br>
The download contains source code, data samples and a build system. The library files are located in the dist folder.</p>

<p>Alternatively <a href="https://github.com/kekscom/osmbuildings">head over to GitHub</a> directly and pull the source.<br>
Make sure you read the <a href="https://github.com/kekscom/osmbuildings/blob/v<?php echo OSMB_VERSION_LATEST?>/CHANGELOG.md">Changelog</a> carefully.</p>

<?php pageFooter()?>