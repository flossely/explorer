<?php
function getColorByCode($code)
{
    if ($code == '01011111 01100111 01111010') {
        return 'dark';
    } elseif ($code == '10010011 10010011 10010011') {
        return 'light';
    } elseif ($code == '00100010 01100100 11001000') {
        return 'blue';
    } elseif ($code == '00000000 10011111 01001011') {
        return 'green';
    } elseif ($code == '11011000 00111101 01001000') {
        return 'red';
    } elseif ($code == '11011101 10101011 00000000') {
        return 'yellow';
    } elseif ($code == '00000000 10011111 10001100') {
        return 'aqua';
    } elseif ($code == '10000000 10000000 11000000') {
        return 'lavender';
    } elseif ($code == '10001010 10110011 00000000') {
        return 'lime';
    } elseif ($code == '10111011 01011110 10011010') {
        return 'magenta';
    } elseif ($code == '11101110 01111101 00110011') {
        return 'orange';
    } elseif ($code == '11011101 01001101 01110110') {
        return 'pink';
    }
}

function getCodeByColor($color)
{
    if ($color == 'dark') {
        return '01011111 01100111 01111010';
    } elseif ($color == 'light') {
        return '10010011 10010011 10010011';
    } elseif ($color == 'blue') {
        return '00100010 01100100 11001000';
    } elseif ($color == 'green') {
        return '00000000 10011111 01001011';
    } elseif ($color == 'red') {
        return '11011000 00111101 01001000';
    } elseif ($color == 'yellow') {
        return '11011101 10101011 00000000';
    } elseif ($color == 'aqua') {
        return '00000000 10011111 10001100';
    } elseif ($color == 'lavender') {
        return '10000000 10000000 11000000';
    } elseif ($color == 'lime') {
        return '10001010 10110011 00000000';
    } elseif ($color == 'magenta') {
        return '10111011 01011110 10011010';
    } elseif ($color == 'orange') {
        return '11101110 01111101 00110011';
    } elseif ($color == 'pink') {
        return '11011101 01001101 01110110';
    }
}