<?php
$dir = ($_REQUEST['dir']) ? $_REQUEST['dir'] : '.';
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
if ($_REQUEST) {
    $q = $_REQUEST['q'];
    if ($q != '') {
        if ($q == '/') {
            $glob = glob($dir.'/*', GLOB_ONLYDIR);
        } elseif ($q == '*') {
            $glob = glob($dir.'/*');
        } else {
            $glob = glob($dir.'/*{'.$q.'}*', GLOB_BRACE);
        }
    } else {
        $glob = glob($dir.'/*');
    }
} else {
    $glob = glob($dir.'/*');
}
$list = str_replace($dir.'/','',($glob));
usort($list, function ($a, $b) {
    $aDirMod = $GLOBALS['dir'].'/'.$a;
    $bDirMod = $GLOBALS['dir'].'/'.$b;
    $aIsDir = is_dir($aDirMod);
    $bIsDir = is_dir($bDirMod);
    if ($aIsDir === $bIsDir)
        return strnatcasecmp($aDirMod, $bDirMod);
    elseif ($aIsDir && !$bIsDir)
        return -1;
    elseif (!$aIsDir && $bIsDir)
        return 1;
});
function cutString($value, $piece) {
    return (strlen($value) > $piece) ? mb_strimwidth($value, 0, $piece, '...', 'UTF-8') : $value;
}
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
<table id="table" width="100%">
<thead>
<tr>
<th width="8%">Icon</th>
<th width="30%">
<a href="javascript:SortTable(1,'T');">Name</a></th>
<th width="20%">
<a href="javascript:SortTable(2,'T');">Type</a></th>
<th width="10%">
<a href="javascript:SortTable(3,'N');">Size</a></th>
</tr>
</thead>
<tbody>
<?php
foreach ($list as $key=>$value) {
    $extension = pathinfo($value, PATHINFO_EXTENSION);
    $basename = basename($value, '.'.$extension);
    $size = filesize($dir.'/'.$value);
    $dispName = cutString($value, 15);
    if (is_dir($dir.'/'.$value)) {
        $icon = 'sys.dir.png';
        $link = 'explorer.php?dir='.$dir.'/'.$value;
        $type = 'File Folder';
    } else {
        if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'webp') {
            $icon = $dir.'/'.$value;
            $link = $dir.'/'.$value;
            $type = 'Picture';
        } elseif ($extension == 'pkg') {
            $icon = 'sys.pkg.png';
            $link = "javascript:get('d', '".$basename."', 'from', 'here');";
            $type = 'Uninstaller';
        } elseif ($extension == 'app') {
            $appOpen = file_get_contents($value);
            $appDel = explode('|[1]|', $appOpen);
            $appTitle = $appDel[0];
            $appIcon = $appDel[1];
            $appLink = $appDel[2];
            $icon = (file_exists($appIcon)) ? $appIcon : 'sys.app.png';
            $link = "javascript:".$appLink.";";
            $type = 'App Shortcut';
        } elseif ($extension == 'mid' || $extension == 'midi' || $extension == 'rmi') {
            $icon = 'sys.mid.png';
            $link = "javascript:playMIDI('".$dir.'/'.$value."');";
            $type = 'MIDI Sequence';
        } elseif ($extension == 'mp3' || $extension == 'aac' || $extension == 'flac' || $extension == 'mka' || $extension == 'ogg' || $extension == 'wav' || $extension == 'm4a' || $extension == 'wma') {
            $icon = 'sys.aud.png';
            $link = "javascript:playAudio('".$dir.'/'.$value."');";
            $type = 'Sound File';
        } elseif ($extension == 'mp4' || $extension == 'mkv' || $extension == 'webm' || $extension == 'mpg' || $extension == 'mpeg' || $extension == 'avi' || $extension == 'wmv') {
            $icon = 'sys.vid.png';
            $link = "media.php?name=".$dir.'/'.$value;
            $type = 'Video File';
        } elseif ($extension == 'ttf' || $extension == 'otf' || $extension == 'ttc' || $extension == 'woff2') {
            $icon = 'sys.fon.png';
            $link = "beaufont.php?name=".$dir.'/'.$value;
            $type = 'System Font';
        } elseif ($extension == 'txt' || $extension == 'csv' || $extension == 'md') {
            $icon = 'sys.txt.png';
            $link = "sysview.php?name=".$dir.'/'.$value;
            $type = 'Text';
        } else {
            $icon = 'sys.exe.png';
            $link = $dir.'/'.$value;
            $type = 'Web Application';
        }
    }
?>
<tr>
<td>
<a href="<?=$icon;?>">
<img width="80%" src="<?=$icon;?>?rev=<?=time();?>">
</a>
</td>
<td>
<a href="<?=$link;?>"><?=$dispName;?></a>
</td>
<td>
<?=$type;?>
</td>
<td>
<?=$size;?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="bottomPanel">
<?php include 'bottom.php'; ?>
</div>
<audio id="audioPlayer">
</body>
</html>
