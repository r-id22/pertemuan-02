<?php

require_once 'Rekening.php';
require_once 'Siswa.php';

echo "<h2>Tugas PBO - Pertemuan 3: Enkapsulasi, Visibility, Getter, dan Setter</h2>";
echo "<p><strong>Nama:</strong> Rahmansyah<br><strong>NIM:</strong> 24.24.032255</p>";
echo "<hr>";

// 1. Demonstrasi Class Rekening menggunakan data Anda
// Rekening utama milik Rahmansyah (BRI)
$rekeningRahmansyah = new Rekening("726601010410531", "Rahmansyah", 1500000.0);
// Rekening tujuan simulasi
$rekeningTujuan = new Rekening("1234567890", "Ahmad", 500000.0);

echo "<h3>Simulasi Transaksi Rekening</h3>";
echo "Saldo awal " . $rekeningRahmansyah->getPemilik() . " (" . $rekeningRahmansyah->getNomor() . "): Rp " . number_format($rekeningRahmansyah->getSaldo(), 0, ',', '.') . "<br>";

// Melakukan transfer
$rekeningRahmansyah->transfer($rekeningTujuan, 300000.0);

echo "Saldo akhir setelah transfer: Rp " . number_format($rekeningRahmansyah->getSaldo(), 0, ',', '.') . "<br>";

echo "<h4>Riwayat Transaksi Rekening Rahmansyah:</h4>";
echo "<ul>";
foreach ($rekeningRahmansyah->getRiwayatTransaksi() as $transaksi) {
    echo "<li>" . $transaksi . "</li>";
}
echo "</ul>";

echo "<hr>";

// 2. Demonstrasi Class Siswa dengan Validasi Setter
echo "<h3>Simulasi Objek Siswa</h3>";
try {
    $siswa1 = new Siswa("Budi Santoso", 85.5);
    echo "Nama Siswa: " . $siswa1->getNama() . "<br>";
    echo "Nilai Siswa: " . $siswa1->getNilai() . "<br>";

    // Contoh mengubah nilai valid
    $siswa1->setNilai(90);
    echo "Nilai baru Siswa: " . $siswa1->getNilai() . "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

echo "<hr>";

/*
 ==============================================================================
 3. CONTOH AKSES ILEGAL YANG DITOLAK PHP (Instruksi Nomor 4)
 ==============================================================================
 
 // CONTOH 1: Mengakses properti private secara langsung dari luar class
 // Kode di bawah ini akan menghasilkan Fatal Error: 
 // "Fatal error: Uncaught Error: Cannot access private property Rekening::$saldo"
 
 // $rekeningRahmansyah = new Rekening("726601010410531", "Rahmansyah", 1000000);
 // echo $rekeningRahmansyah->saldo; 


 // CONTOH 2: Mengubah properti private secara langsung tanpa melalui Setter
 // Kode di bawah ini juga akan menghasilkan Fatal Error:
 // "Fatal error: Uncaught Error: Cannot access private property Siswa::$nilai"
 
 // $siswa = new Siswa("Ani", 80);
 // $siswa->nilai = 150; // Langsung akses/ubah tanpa method setNilai()
 
 ==============================================================================
*/

echo "<p><em>Catatan: Contoh akses ilegal telah dituliskan di dalam komentar kode program di atas sesuai instruksi nomor 4.</em></p>";

