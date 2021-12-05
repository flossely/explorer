<?php
$dir = '.';
$name = $_REQUEST['name'];
include 'bootstrap.php';
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
<link rel="shortcut icon" href="sys.fon.png?rev=<?=time();?>" type="image/x-icon">
<?php include 'appstyle.php'; ?>
<?php include 'appscript.php'; ?>
</head>
<body>
<div class="topPanel">
<?php include 'top.php'; ?>
</div>
<div class="workspace">
<p class='userDefine'>
0 1 2 3 4 5 6 7 8 9 A B C D E F G H I J K L M N O P Q R S T U V W X Y Z a b c d e f g h i j k l m n o p q r s t u v w x y z
</p>
</div>
<div class="bottomPanel">
<?php include 'bottom.php'; ?>
</div>
<audio id="audioPlayer">
</body>
</html>
