<?php

$type = $_GET["js"] ? "js" : "css";
$files = explode(",", $_GET[$type]);

switch ($type) {
  case "js":
    header("Content-Type: application/javascript");
  break;
  case "css":
    header("Content-Type: text/css");
  break;
}

for ($i = 0; $i < count($files); $i++) {
	echo @file_get_contents(trim($files[$i]));
	echo "\n";
}

?>