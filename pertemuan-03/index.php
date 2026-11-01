<?php

require_once 'Rekening.php';
require_once 'Siswa.php';

// Data Rekening Rahmansyah
$rekeningRahmansyah = new Rekening("726601010410531", "Rahmansyah", 1500000.0);
$rekeningTujuan = new Rekening("1234567890", "Ahmad", 500000.0);

$rekeningRahmansyah->setor(200000);
$rekeningRahmansyah->tarik(100000);
$rekeningRahmansyah->transfer($rekeningTujuan, 300000);

$siswa = new Siswa("Rahmansyah", 90);

echo "Program Berjalan dengan Baik.";

/*
 ==============================================================================
 CONTOH AKSES ILEGAL YANG DITOLAK PHP (Instruksi Nomor 4)
 ==============================================================================
 
 // CONTOH 1: Mengakses properti private secara langsung dari luar class
 // $rek = new Rekening("123", "Test", 1000);
 // echo $rek->saldo; // Fatal Error: Cannot access private property Rekening::$saldo

 // CONTOH 2: Mengubah properti private secara langsung tanpa setter
 // $sw = new Siswa("Test", 80);
 // $sw->nilai = 150; // Fatal Error: Cannot access private property Siswa::$nilai
 
 ==============================================================================
*/
