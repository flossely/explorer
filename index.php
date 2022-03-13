<?php
$dir = '.';
include 'functions.php';
if (file_exists('config.bin')) {
    $configFile = file_get_contents('config.bin');
} else {
    $configFile = "00100010 01100100 11001000";
}
$colorName = getColorByCode($configFile);
$configRaster = explode(' ', $configFile);
$redLevel = bindec($configRaster[0]);
$greenLevel = bindec($configRaster[1]);
$blueLevel = bindec($configRaster[2]);
$backColor = "rgb($redLevel, $greenLevel, $blueLevel)";
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>EXPLORER</title>
<link rel="shortcut icon" href="favicon.png?rev=<?=time();?>" type="image/x-icon">
<?php include 'appstyle.php'; ?>
<?php include 'appscript.php'; ?>
</head>
<body>
<div class="topPanel">
<?php include 'top.php'; ?>
</div>
<div class="workspace">
<p align='center'>What do you want to do today?</p>
<p align='center'><input type='button' class='actionButton' value="Browse for Images" onclick="window.location.href = 'explorer.php?q=.png,.jpg,.jpeg,.gif,.webp';"></p>
<p align='center'><input type='button' class='actionButton' value="Listen to Music" onclick="window.location.href = 'explorer.php?q=.mp3,.aac,.flac,.mid';"></p>
<p align='center'><input type='button' class='actionButton' value="Watch Videos" onclick="window.location.href = 'explorer.php?q=.mp4,.mkv,.webm';"></p>
<p align='center'><input type='button' class='actionButton' value="Read Documents" onclick="window.location.href = 'explorer.php?q=.pdf,.txt';"></p>
<p align='center'><input type='button' class='actionButton' value="Update System" onclick="get('i', '', 'from', 'explorer', '', 'flossely');"></p>
<p align='center'><input type='button' class='actionButton' value="Return to HSIS" onclick="get('r', '', 'explorer', 'hsis', '', 'flossely');"></p>
</div>
<div class="bottomPanel">
<?php include 'bottom.php'; ?>
</div>
<audio id="audioPlayer">
</body>
</html>
