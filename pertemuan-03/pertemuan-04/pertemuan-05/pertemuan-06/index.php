<?php

/**
 * LAB 6 - Abstraction & Polymorphism
 * Mengikuti standar PSR-12 dan Object-Oriented Programming (OOP) PHP.
 */

// ==========================================
// 1. ABSTRACT CLASS & TURUNAN (BangunDatar)
// ==========================================

abstract class BangunDatar
{
    abstract public function luas(): float;
    abstract public function keliling(): float;
}

class Lingkaran extends BangunDatar
{
    private float $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function luas(): float
    {
        return pi() * $this->r * $this->r;
    }

    public function keliling(): float
    {
        return 2 * pi() * $this->r;
    }
}

class Persegi extends BangunDatar
{
    private float $sisi;

    public function __construct(float $sisi)
    {
        $this->sisi = $sisi;
    }

    public function luas(): float
    {
        return $this->sisi * $this->sisi;
    }

    public function keliling(): float
    {
        return 4 * $this->sisi;
    }
}

class PersegiPanjang extends BangunDatar
{
    private float $panjang;
    private float $lebar;

    public function __construct(float $panjang, float $lebar)
    {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function luas(): float
    {
        return $this->panjang * $this->lebar;
    }

    public function keliling(): float
    {
        return 2 * ($this->panjang + $this->lebar);
    }
}

class Segitiga extends BangunDatar
{
    private float $alas;
    private float $tinggi;
    private float $sisiA;
    private float $sisiB;
    private float $sisiC;

    public function __construct(float $alas, float $tinggi, float $sisiA, float $sisiB, float $sisiC)
    {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
        $this->sisiA = $sisiA;
        $this->sisiB = $sisiB;
        $this->sisiC = $sisiC;
    }

    public function luas(): float
    {
        return 0.5 * $this->alas * $this->tinggi;
    }

    public function keliling(): float
    {
        return $this->sisiA + $this->sisiB + $this->sisiC;
    }
}


// ==========================================
// 2. INTERFACE & IMPLEMENTASI (Notifikasi)
// ==========================================

interface Notifikasi
{
    public function kirim(string $pesan): string;
}

class Email implements Notifikasi
{
    public function kirim(string $pesan): string
    {
        return "Email terkirim: " . $pesan;
    }
}

class WhatsApp implements Notifikasi
{
    public function kirim(string $pesan): string
    {
        return "WhatsApp terkirim: " . $pesan;
    }
}

class SMS implements Notifikasi
{
    public function kirim(string $pesan): string
    {
        return "SMS terkirim: " . $pesan;
    }
}


// ==========================================
// 3. FUNGSI POLIMORFIS (kirimSemua)
// ==========================================

/**
 * @param Notifikasi[] $notifikasi
 */
function kirimSemua(array $notifikasi, string $pesan): array
{
    $hasil = [];
    foreach ($notifikasi as $notif) {
        if ($notif instanceof Notifikasi) {
            $hasil[] = $notif->kirim($pesan);
        }
    }
    return $hasil;
}


// ==========================================
// 4. PENGUJIAN / CONTOH EKSEKUSI
// ==========================================

echo "<h3>=== PENGUJIAN BANGUN DATAR ===</h3>";
$lingkaran = new Lingkaran(7);
echo "Luas Lingkaran (r=7): " . number_format($lingkaran->luas(), 2) . "<br>";
echo "Keliling Lingkaran (r=7): " . number_format($lingkaran->keliling(), 2) . "<br>";

$persegiPanjang = new PersegiPanjang(3, 4);
echo "Luas Persegi Panjang (3x4): " . $persegiPanjang->luas() . "<br>";
echo "Keliling Persegi Panjang (3x4): " . $persegiPanjang->keliling() . "<br>";

$segitiga = new Segitiga(6, 4, 5, 5, 6);
echo "Luas Segitiga: " . $segitiga->luas() . "<br>";
echo "Keliling Segitiga: " . $segitiga->keliling() . "<br>";

echo "<h3>=== PENGUJIAN POLIMORFISME NOTIFIKASI ===</h3>";
$channels = [
    new Email(),
    new WhatsApp(),
    new SMS()
];

$hasilKirim = kirimSemua($channels, "Halo, ini pesan uji coba sistem!");
foreach ($hasilKirim as $res) {
    echo "- " . $res . "<br>";
}

