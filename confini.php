<?php
$color = $_POST['color'];
if ($color == 'dark') {
    $content = '01011111 01100111 01111010';
} elseif ($color == 'light') {
    $content = '10010011 10010011 10010011';
} elseif ($color == 'blue') {
    $content = '00100010 01100100 11001000';
} elseif ($color == 'green') {
    $content = '00000000 10011111 01001011';
} elseif ($color == 'red') {
    $content = '11011000 00111101 01001000';
} elseif ($color == 'yellow') {
    $content = '11011101 10101011 00000000';
} elseif ($color == 'aqua') {
    $content = '00000000 10011111 10001100';
} elseif ($color == 'lavender') {
    $content = '10000000 10000000 11000000';
} elseif ($color == 'lime') {
    $content = '10001010 10110011 00000000';
} elseif ($color == 'magenta') {
    $content = '10111011 01011110 10011010';
} elseif ($color == 'orange') {
    $content = '11101110 01111101 00110011';
} elseif ($color == 'pink') {
    $content = '11011101 01001101 01110110';
}
file_put_contents('config.bin', $content);
chmod('config.bin', 0777);
