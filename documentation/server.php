<?php
$root = "..";
require_once("$root/base.php");

pageHeader("Server setup", "docs");
?>

<p>In case you like to run OSM Buildings with real building geometry, you need to set up a server environment with PHP and MySQL or PostGIS.<br>
<em>Notice</em>: one of the next releases will simplify the whole process.</p>

<p>As it is very popular for web hosting, I'm going with MySQL. Version 5.0.16 or better has the required <a href="http://dev.mysql.com/doc/refman/5.0/en/spatial-extensions.html">spatial extensions</a> enabled.
For those who have trouble importing the data into MySQL or running a different server, <a href="https://twitter.com/D_Guidi">Diego Guidi</a> did a great job creating a Shapefile.</p>

<p>Next you will need to create your database table using the dump file /server/data/mysql-CREATE_TABLE.sql
Then import building data, i.e. from /server/data/mysql-berlin.zip. I.e. upload the file directly in PhpMyAdmin or unpack and import as you like.</p>

<p>Make sure PHP is running and create a /server/config.php file for your settings and database credentials.
Or just adapt and rename /server/config.sample.php for your needs.</p>

<h2>Data Conversion</h2>

<p>As PostGIS is much more capable of handling geometry, there is now a data conversion script in using Node.js.
Requirements are a working Node.js installation and the node-postgres module (install the module with <code>npm install pg</code>).
Then have a look into /server/data/convert.js and change database, table, output settings.<br>
Run the conversion with <code>node convert.js</code></p>

<p>What the script does:</p>

<ul>
    <li>reads height and footprint polygons from PostGIS</li>
    <li>turns height into a number if needed</li>
    <li>swaps lat/lon of polygons if needed</li>
    <li>creates a mysql dump file</li>
</ul>

<?php pageFooter()?>