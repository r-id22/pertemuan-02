<?php
declare(strict_types=1);

// ==========================================
// LAB SHEET PERTEMUAN 4: Static, Konstanta, dan Fitur OOP PHP 8
// Nama: Rahmansyah
// ==========================================

// 4. Enum Semester dan Predikat dengan method label()
enum Semester: string {
    case Ganjil = 'ganjil';
    case Genap = 'genap';
}

enum Predikat: string {
    case SangatMemuaskan = 'Sangat Memuaskan';
    case Memuaskan = 'Memuaskan';
    case Cukup = 'Cukup';

    public function label(): string {
        return match($this) {
            self::SangatMemuaskan => 'Sangat Memuaskan',
            self::Memuaskan => 'Memuaskan',
            self::Cukup => 'Cukup',
        };
    }
}

// 1, 2, 3. Refaktor Class Mahasiswa dengan constructor promotion, strict_types, readonly, static, dan konstanta
class Mahasiswa {
    public const int BATAS_SKS = 24; // Konstanta SKS
    private static int $jumlahObjek = 0; // Counter static

    public function __construct(
        public readonly string $nim, // Readonly property (tidak bisa diubah setelah instansiasi)
        public string $nama,
        public string $prodi,
        public float $ipk
    ) {
        self::$jumlahObjek++;
    }

    public static function getJumlah(): int {
        return self::$jumlahObjek;
    }
}

// 1. Refaktor Class Produk dengan constructor promotion
class Produk {
    public function __construct(
        public string $namaProduk,
        public float $harga,
        public int $stok
    ) {}

    public function getTotalNilai(): float {
        return $this->harga * $this->stok;
    }
}

// Inisialisasi Objek Mahasiswa & Produk
$mhs1 = new Mahasiswa('24.24.032255', 'Rahmansyah', 'Pendidikan Teknologi Informasi', 3.50);
$mhs2 = new Mahasiswa('24.24.1635', 'M. Fitriannur Akbar', 'Pendidikan Teknologi Informasi', 3.15);
$mhs3 = new Mahasiswa('24.24.032095', 'Okta Ramadhani', 'Pendidikan Teknologi Informasi', 3.60);

echo "<h3>Hasil Pengujian Lab 4:</h3>";
echo "Total Objek Mahasiswa (Static): " . Mahasiswa::getJumlah() . "<br>";
echo "Konstanta BATAS_SKS: " . Mahasiswa::BATAS_SKS . "<br>";
echo "Semester Aktif: " . Semester::Ganjil->value . "<br>";
echo "Predikat Mhs 1: " . Predikat::SangatMemuaskan->label() . "<br>";

/*
  ==================================================
  CATATAN PERBEDAAN JUMLAH BARIS SEBELUM & SESUDAH:
  ==================================================
  - Sebelum Refaktor (Pertemuan 2): Menggunakan constructor standar dan properti publik manual, membuat deklarasi properti dan pengisian constructor terpisah sehingga baris kode lebih panjang.
  - Sesudah Refaktor (Pertemuan 4): Menggunakan fitur constructor promotion PHP 8, readonly, dan enum, sehingga kode jauh lebih ringkas, padat, dan efisien (mengurangi beberapa baris boilerplate code).
  
  Bukti Error Readonly NIM (Sesuai instruksi nomor 3):
  // try {
  //     $mhs1->nim = '99.99.9999'; // Memicu Fatal Error: Cannot modify readonly property Mahasiswa::$nim
  // } catch (\Throwable $e) {
  //     echo $e->getMessage();
  // }
*/
