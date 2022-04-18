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
<p align='center'><img style="height:12%;position:relative;" src="https://github.com/wholemarket/rawd/blob/general/rawd.dead.png?raw=true"></p>
<p align='center'>The project support was officially ended.</p>
<p align='center'><input type='button' class='actionButton' value="Switch to Eurohouse" onclick="get('r','','explorer','eurohouse','','eurohouse');"></p>
</div>
<div class="bottomPanel">
<?php include 'bottom.php'; ?>
</div>
<audio id="audioPlayer">
<audio id="soundPlayer" <?php if (!$sounds) { ?>muted="muted"<?php } ?>>
</body>
</html>
