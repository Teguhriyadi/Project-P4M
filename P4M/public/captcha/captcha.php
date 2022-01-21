<?php

function acakCaptcha() {
    $kode = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

    $pass = array();

    $panjangkode = strlen($kode) - 2;
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $panjangkode);
        $pass[] = $kode[$n];
    }

    return implode($pass);
}

//hasil kode acak disimpan di $code
$code = acakCaptcha();

//kode acak disimpan di dalam session agar data dapat dipassing ke halaman lain
$_SESSION["code"] = $code;

//membuat background
$wh = imagecreatetruecolor(173, 50);

$bgc = imagecolorallocate($wh, 22, 86, 165);

//membuat text warna
$fc = imagecolorallocate($wh, 223, 230, 233);
imagefill($wh, 0, 0, $bgc);

imagestring($wh, 10, 50, 15,  $code, $fc);


//membuat gambar
header('content-type: image/jpg');

imagejpeg($wh);

imagedestroy($wh);
?>
