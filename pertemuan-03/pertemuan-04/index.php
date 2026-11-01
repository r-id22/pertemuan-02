<?php
declare(strict_types=1);

require_once 'Mahasiswa.php';
require_once 'Produk.php';
require_once 'Semester.php';
require_once 'Predikat.php';

// Inisialisasi Object Mahasiswa
$mahasiswaList = [
    new Mahasiswa("24.24.032255", "Rahmansyah", "Pendidikan Teknologi Informasi", 3.50),
    new Mahasiswa("24.24.1635", "M. Fitriannur Akbar", "Pendidikan Teknologi Informasi", 3.15),
    new Mahasiswa("24.24.032095", "Okta Ramadhani", "Pendidikan Teknologi Informasi", 3.60),
];

// Inisialisasi 20 Data Produk
$produkList = [
    new Produk("Buku Tulis Sinar Dunia", 5000, 100),
    new Produk("Pulpen Standard AE7", 3000, 150),
    new Produk("Penghapus Faber Castell", 2500, 80),
    new Produk("Penggaris Besi 30cm", 4000, 60),
    new Produk("Tipe-X Kertas Joyko", 6000, 50),
    new Produk("Buku Gambar A4", 7500, 40),
    new Produk("Pensil 2B Faber Castell", 4500, 90),
    new Produk("Spidol Hitam Snowman", 8000, 70),
    new Produk("Kertas HVS A4 70gsm", 45000, 30),
    new Produk("Amplop Putih Polos", 15000, 25),
    new Produk("Gunting Kertas Joyko", 10000, 35),
    new Produk("Cutter Kertas Besar", 12000, 20),
    new Produk("Lem Kertas Fox", 7000, 45),
    new Produk("Stabilo Boss Original", 12500, 55),
    new Produk("Lakban Hitam Besar", 18000, 40),
    new Produk("Buku Kotak-Kotak", 6000, 65),
    new Produk("Paper Clip", 5000, 120),
    new Produk("Sticky Notes", 9000, 85),
    new Produk("Correction Tape", 11000, 45),
    new Produk("Binder Clips", 6500, 95),
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Sheet PBO - Pertemuan 4</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-blue-50 text-slate-800 min-h-screen py-10 px-4">
    <div class="max-w-5xl mx-auto space-y-8">
        
        <!-- Header -->
        <header class="bg-white shadow-md rounded-2xl p-6 border-t-4 border-blue-600 flex justify-between items-center">
            <div>
                <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Lab Sheet Pertemuan 4</span>
                <h1 class="text-2xl font-bold text-blue-900 mt-2">PHP 8: Static, Konstanta, Readonly, & Enum</h1>
                <p class="text-sm text-slate-500 mt-1">Batas Maksimal SKS: <b><?= Mahasiswa::BATAS_SKS ?> SKS</b> | Semester: <b><?= Semester::GANJIL->value ?></b></p>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-slate-600">Rahmansyah (24.24.032255)</p>
                <p class="text-xs text-blue-600 font-semibold">Total Object Mhs: <?= Mahasiswa::getJumlahObject() ?> | Produk: <?= Produk::getJumlahObject() ?></p>
            </div>
        </header>

        <!-- Mahasiswa Section -->
        <section class="bg-white shadow-md rounded-2xl p-6 border border-blue-100">
            <h2 class="text-xl font-bold text-blue-800 mb-4">Daftar Objek Mahasiswa (Refactored)</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <?php foreach ($mahasiswaList as $mhs): ?>
                <div class="bg-blue-600 text-white p-5 rounded-xl shadow-sm">
                    <p class="text-xs bg-blue-500 px-2 py-1 rounded inline-block mb-2 font-mono">NIM (Readonly): <?= $mhs->nim ?></p>
                    <h3 class="font-bold text-lg"><?= $mhs->nama ?></h3>
                    <p class="text-blue-100 text-xs mb-3"><?= $mhs->prodi ?></p>
                    <div class="border-t border-blue-500 pt-2 flex justify-between items-center text-xs">
                        <span>IPK: <b><?= number_format($mhs->ipk, 2) ?></b></span>
                        <span class="bg-white text-blue-700 font-semibold px-2 py-1 rounded"><?= $mhs->getPredikat()->label() ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Produk Section -->
        <section class="bg-white shadow-md rounded-2xl p-6 border border-blue-100">
            <h2 class="text-xl font-bold text-blue-800 mb-4">Tabel Spreadsheet Produk (Constructor Promotion)</h2>
            <div class="overflow-x-auto rounded-xl border border-blue-100">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-blue-600 text-white text-xs uppercase">
                            <th class="py-3 px-4 text-center w-16">No</th>
                            <th class="py-3 px-4">Nama Produk</th>
                            <th class="py-3 px-4 text-right">Harga Satuan</th>
                            <th class="py-3 px-4 text-center">Stok</th>
                            <th class="py-3 px-4 text-right">Total Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-50 text-sm">
                        <?php 
                        $no = 1;
                        $grandTotal = 0;
                        foreach ($produkList as $prod):
                            $total = $prod->totalNilai();
                            $grandTotal += $total;
                        ?>
                        <tr class="hover:bg-blue-50/60">
                            <td class="py-3 px-4 text-center text-slate-500"><?= $no++ ?></td>
                            <td class="py-3 px-4 font-medium text-slate-800"><?= $prod->nama ?></td>
                            <td class="py-3 px-4 text-right font-mono text-slate-600">Rp <?= number_format($prod->harga, 0, ',', '.') ?></td>
                            <td class="py-3 px-4 text-center font-mono text-slate-600"><?= $prod->stok ?></td>
                            <td class="py-3 px-4 text-right font-mono font-semibold text-blue-700">Rp <?= number_format($total, 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-blue-100 font-bold text-blue-900">
                            <td colspan="4" class="py-3 px-4 text-right">Grand Total:</td>
                            <td class="py-3 px-4 text-right font-mono text-blue-700">Rp <?= number_format($grandTotal, 0, ',', '.') ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

    </div>
</body>
</html>
