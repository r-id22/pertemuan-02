<?php
require_once 'Rekening.php';
require_once 'Siswa.php';

// Pengujian Rekening Bank BRI
echo "=== UJI COBA REKENING BANK ===\n";
$rekeningRahmansyah = new Rekening("726601010410531", "Rahmansyah");
$rekeningRahmansyah->setor(500000);
$rekeningRahmansyah->tarik(100000);

echo "No. Rekening : " . $rekeningRahmansyah->getNomor() . "\n";
echo "Pemilik      : " . $rekeningRahmansyah->getPemilik() . "\n";
echo "Sisa Saldo   : Rp " . number_format($rekeningRahmansyah->getSaldo(), 0, ',', '.') . "\n\n";

// Pengujian Data Siswa (Rahmansyah, M.Fitriannur Akbar, Okta Ramadhani)
echo "=== UJI COBA DATA SISWA ===\n";
$dataSiswa = [
    ["nama" => "Rahmansyah", "nilai" => 92],
    ["nama" => "M.Fitriannur Akbar", "nilai" => 88],
    ["nama" => "Okta Ramadhani", "nilai" => 95]
];

foreach ($dataSiswa as $data) {
    $siswa = new Siswa();
    $siswa->setNama($data["nama"]);
    $siswa->setNilai($data["nilai"]);
    echo "Siswa: " . $siswa->getNama() . " | Nilai: " . $siswa->getNilai() . "\n";
}

/*
  =================================================================
  TUGAS NO. 4: 2 Contoh Akses Ilegal yang Ditolak PHP (Enkapsulasi)
  =================================================================
  
  1. Mengakses properti private secara langsung dari luar class Rekening:
     // echo $rekeningRahmansyah->saldo;
     // PHP Error: Cannot access private property Rekening::$saldo

  2. Mengisi nilai properti private secara langsung tanpa melalui setter Siswa:
     // $siswa->nilai = 150;
     // PHP Error: Cannot access private property Siswa::$nilai
*/
