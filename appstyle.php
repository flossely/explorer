<style>
@font-face {
    font-family: "segoeui";
    src: url("segoeui.ttf");
}
@font-face {
    font-family: "userdefine";
    src: url("<?=$name;?>");
}
body {
    background-color: #363636;
    color: #fff;
    font-family: "segoeui";
    font-size: 14pt;
}
a, p, b, i {
    color: #fff;
    font-family: "segoeui";
    font-size: 14pt;
}
table, tr, td, th {
    text-align: center;
    font-family: "segoeui";
    font-size: 14pt;
}
input {
    background-color: #fff;
    color: #000;
    border: none;
    font-family: "segoeui";
    font-size: 14pt;
}
.bigText {
    font-family: "segoeui";
    font-size: 20pt;
}
.topPanel {
    background-color: #363636;
    position: absolute;
    width: 100%;
    height: 15%;
    top: 0%;
    left: 0%;
}
.workspace {
    background-color: <?=$backColor;?>;
    position: absolute;
    width: 100%;
    height: 75%;
    bottom: 15%;
    left: 0%;
    overflow-y: scroll;
}
.bottomPanel {
    background-color: #363636;
    position: absolute;
    width: 100%;
    height: 15%;
    bottom: 0%;
    left: 0%;
}
.imgLogo {
    background-color: #363636;
    src: url('avatar.png');
    position: relative;
    left: 0%;
}
.imgLogo:hover {
    background-color: <?=$backColor;?>;
}
.digitalClockDiv {
    position: relative;
    width: 60%;
    left: 20%;
    top: -75%;
}
.colouredButton {
    position: relative;
    width: 7%;
    height: 100%;
}
.userDefine {
    font-family: "userdefine";
    font-size: 20pt;
}
</style>