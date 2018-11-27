<?php

function romawi($nomor){ 
    $n = intval($nomor); 
    $hasil = ''; 
 
    $nomor_romawi = array( 
        'M'  => 1000, 
        'CM' => 900, 
        'D'  => 500, 
        'CD' => 400, 
        'C'  => 100, 
        'XC' => 90, 
        'L'  => 50, 
        'XL' => 40, 
        'X'  => 10, 
        'IX' => 9, 
        'V'  => 5, 
        'IV' => 4, 
        'I'  => 1); 

    foreach ($nomor_romawi as $romawi => $nom){ 
        $cocok = intval($n / $nom); 
        $hasil .= str_repeat($romawi, $cocok); 
        $n = $n % $nom; 
    } 
 
    return $hasil; 
} 

?>