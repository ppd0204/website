<!DOCTYPE html>
<html>
<head>
	<title><?php echo ($title ? "$title - " : "")?><?php echo SITE_TITLE?></title>
	<meta property="title" content="<?php echo SITE_TITLE?>">
	<meta property="description" content="<?php echo SITE_DESCRIPTION?>">
	<?php require_once(ROOT."/assets/keywords.php")?>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="<?php echo ROOT?>/favicon.png">
	<link rel="stylesheet" href="<?php echo ROOT?>/assets/styles.css">
	<link rel="stylesheet" href="<?php echo ROOT?>/js/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.css">
	<script src="<?php echo ROOT?>/js/leaflet-<?php echo LEAFLET_VERSION_LATEST?>/leaflet.js"></script>
	<script src="<?php echo ROOT?>/js/L.BuildingsLayer.js"></script>
</head>

<body>
<div class="layout">
    <div class="header"><div class="center">
        <a href="<?php echo ROOT?>/"><img src="<?php echo ROOT?>/assets/images/logo.png" alt="Home" title="<?php echo $meta["title"]?>" class="logo"></a>

        <ul class="navigation">
            <li><a href="<?php echo ROOT?>/examples.php">Examples</a></li>
            <li><a href="<?php echo ROOT?>/download.php">Download</a></li>
            <li><a href="<?php echo ROOT?>/documentation/index.html">Documentation</a></li>
            <li><a href="<?php echo ROOT?>/questions.php">Questions</a></li>
            <li><a href="javascript:UserVoice.showPopupWidget();">Feedback</a></li>
        </ul>

    </div></div>

    <div class="content"><div class="center">
        <?php if($title):?><h1><?php echo $title?></h1><?php endif?>
