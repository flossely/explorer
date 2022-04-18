<script>
window.onload = function() {
    playAudio('snd<?=$colorName;?>.flac?rev=<?=time();?>');
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