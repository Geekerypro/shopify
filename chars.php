<?php

function charsIguales($string)
{
    $valores = array_count_values(str_split($string));
    $resultado = count(array_unique($valores));
    $retVal = ($resultado == 1) ? 'true' : 'false';
    return $retVal;
}
$chars = [
    'aaabbbzzz',
    'xvccvxxvccvx',
    'uuuiiii',
    'abcde',
    'quac',
    'www',
    'x',
    'abb',
    'AAACCC',
    '000111',
    'abcdefghijklmnñopqrstuvwz'
];
for ($i = 0; $i < count($chars); $i++) {
    echo $chars[$i] . " -- " . charsIguales($chars[$i]) . "<br>";
}
