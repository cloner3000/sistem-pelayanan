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

function hari($hari){
    if ($hari == 'Sunday') {
        return 'Minggu';
    }elseif ($hari == 'Monday') {
        return 'Senin';
    }elseif ($hari == 'Tuesday') {
        return 'Selasa';
    }elseif ($hari == 'Wednesday') {
        return 'Rabu';
    }elseif ($hari == 'Thursday') {
        return 'Kamis';
    }elseif ($hari == 'Friday') {
        return 'Jumat';
    }elseif ($hari == 'Saturday') {
        return 'Sabtu';
    }
}

function bulan($bulan){
    if ($bulan == '01') {
        return 'Januari';
    }elseif ($bulan == '02') {
        return 'Februari';
    }elseif ($bulan == '03') {
        return 'Maret';
    }elseif ($bulan == '04') {
        return 'April';
    }elseif ($bulan == '05') {
        return 'Mei';
    }elseif ($bulan == '06') {
        return 'Juni';
    }elseif ($bulan == '07') {
        return 'Juli';
    }elseif ($bulan == '08') {
        return 'Agustus';
    }elseif ($bulan == '09') {
        return 'September';
    }elseif ($bulan == '10') {
        return 'Oktober';
    }elseif ($bulan == '11') {
        return 'Nopember';
    }elseif ($bulan == '12') {
        return 'Desember';
    }
}
 
?>