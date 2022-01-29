<script src="jquery.js"></script>
<script src="base.js"></script>
<script src="sort.js"></script>
<script src="http://www.midijs.net/lib/midi.js"></script>
<script>
window.onload = function() {
    playAudio('snd<?=$colorName;?>.flac?rev=<?=time();?>');
}
function playAudio(name) {
    audioPlayer.src = name;
    audioPlayer.play();
}
function pauseAudio() {
    audioPlayer.pause();
}
function playMIDI(id) {
    MIDIjs.play(id);
}
function pauseMIDI(id) {
    MIDIjs.pause(id);
}
function initConfig(color) {
    var dataString = 'color=' + color;
    $.ajax({
        type: "POST",
        url: "confini.php",
        data: dataString,
        cache: false,
        success: function(html) {
            window.location.reload();
        }
    });
    return false;
}
</script>