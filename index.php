<?php

require_once __DIR__ . '/Mahasiswa.php';
require_once __DIR__ . '/Produk.php';

use App\Mahasiswa;
use App\Produk;

// 1. Inisialisasi 3 Objek Mahasiswa
$daftarMahasiswa = [
    new Mahasiswa('24.24.032255', 'Rahmansyah', 'Pendidikan Teknologi Informasi', 3.50),
    new Mahasiswa('24.24.1635', 'M. Fitriannur Akbar', 'Pendidikan Teknologi Informasi', 3.15),
    new Mahasiswa('24.24.032095', 'Okta Ramadhani', 'Pendidikan Teknologi Informasi', 3.60),
];

// 2. Inisialisasi 20 Objek Produk (Format Spreadsheet/Inventaris)
$daftarProduk = [
    new Produk('Laptop ASUS Vivobook', 8500000, 12),
    new Produk('Mouse Wireless Logitech', 150000, 45),
    new Produk('Keyboard Mekanikal Redragon', 450000, 25),
    new Produk('Monitor LG 24 Inch IPS', 1850000, 15),
    new Produk('Flashdisk SanDisk 64GB', 85000, 60),
    new Produk('Harddisk Eksternal WD 1TB', 750000, 20),
    new Produk('SSD NVMe Samsung 500GB', 950000, 18),
    new Produk('Webcam HD 1080p', 320000, 30),
    new Produk('Headset Gaming Rexus', 275000, 40),
    new Produk('Printer Epson L3210', 2300000, 8),
    new Produk('Router TP-Link AC1200', 410000, 22),
    new Produk('Kabel HDMI 3 Meter', 45000, 75),
    new Produk('Cooling Pad Laptop', 110000, 35),
    new Produk('USB Hub 4 Port', 65000, 50),
    new Produk('MicroSD SanDisk 128GB', 165000, 40),
    new Produk('Proyektor BenQ Full HD', 5400000, 5),
    new Produk('UPS ICA 1200VA', 1250000, 10),
    new Produk('Speaker Bluetooth JBL', 600000, 28),
    new Produk('Drawing Tablet Huion', 890000, 14),
    new Produk('Stand Laptop Aluminium', 135000, 32),
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBO Pertemuan 2 - Class, Object & Constructor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 text-slate-800 min-h-screen p-6">
    <div class="max-w-7xl mx-auto space-y-8">
        
        <!-- Header -->
        <header class="bg-white p-6 rounded-xl shadow-md border-b-4 border-blue-600">
            <h1 class="text-2xl font-bold text-blue-900">Lab Sheet Pertemuan 2: Class, Object, dan Constructor di PHP</h1>
            <p class="text-sm text-blue-600 font-medium">Praktikum Pemrograman Berorientasi Objek (PBO)</p>
        </header>

        <!-- Bagian 1: Data Mahasiswa -->
        <section class="bg-white rounded-xl shadow-md overflow-hidden border border-blue-100">
            <div class="bg-blue-600 px-6 py-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-white">Data Mahasiswa</h2>
                <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">3 Objek</span>
            </div>
            <div class="overflow-x-auto p-6">
                <table class="w-full text-left border-collapse border border-blue-200">
                    <thead>
                        <tr class="bg-blue-100 text-blue-900 text-sm font-semibold uppercase">
                            <th class="p-3 border border-blue-200">No</th>
                            <th class="p-3 border border-blue-200">NIM</th>
                            <th class="p-3 border border-blue-200">Nama Mahasiswa</th>
                            <th class="p-3 border border-blue-200">Program Studi</th>
                            <th class="p-3 border border-blue-200 text-center">IPK</th>
                            <th class="p-3 border border-blue-200 text-center">Predikat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-sm">
                        <?php foreach ($daftarMahasiswa as $index => $mhs): ?>
                            <?php $info = $mhs->info(); ?>
                            <tr class="hover:bg-blue-50 transition">
                                <td class="p-3 border border-blue-200 text-center font-medium"><?= $index + 1 ?></td>
                                <td class="p-3 border border-blue-200 font-mono text-blue-700"><?= $info['nim'] ?></td>
                                <td class="p-3 border border-blue-200 font-semibold text-slate-900"><?= $info['nama'] ?></td>
                                <td class="p-3 border border-blue-200"><?= $info['prodi'] ?></td>
                                <td class="p-3 border border-blue-200 text-center font-bold text-blue-800"><?= $info['ipk'] ?></td>
                                <td class="p-3 border border-blue-200 text-center">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 border border-blue-300">
                                        <?= $info['predikat'] ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Bagian 2: Spreadsheet Data Produk -->
        <section class="bg-white rounded-xl shadow-md overflow-hidden border border-blue-100">
            <div class="bg-blue-600 px-6 py-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-white">Spreadsheet Stok & Total Nilai Produk</h2>
                <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">20 Data Produk</span>
            </div>
            <div class="overflow-x-auto p-6">
                <table class="w-full text-left border-collapse border border-blue-200 font-mono text-xs md:text-sm">
                    <thead>
                        <tr class="bg-blue-100 text-blue-900 font-bold uppercase">
                            <th class="p-2 border border-blue-200 text-center">No</th>
                            <th class="p-2 border border-blue-200">Nama Produk</th>
                            <th class="p-2 border border-blue-200 text-right">Harga (Rp)</th>
                            <th class="p-2 border border-blue-200 text-center">Stok</th>
                            <th class="p-2 border border-blue-200 text-right">Total Nilai (Rp)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100">
                        <?php 
                        $grandTotal = 0;
                        foreach ($daftarProduk as $idx => $produk): 
                            $total = $produk->totalNilai();
                            $grandTotal += $total;
                        ?>
                            <tr class="<?= $idx % 2 === 0 ? 'bg-white' : 'bg-blue-50/50' ?> hover:bg-blue-100/50 transition">
                                <td class="p-2 border border-blue-200 text-center font-sans"><?= $idx + 1 ?></td>
                                <td class="p-2 border border-blue-200 font-sans font-medium text-slate-800"><?= $produk->getNama() ?></td>
                                <td class="p-2 border border-blue-200 text-right"><?= number_format($produk->getHarga(), 0, ',', '.') ?></td>
                                <td class="p-2 border border-blue-200 text-center"><?= $produk->getStok() ?></td>
                                <td class="p-2 border border-blue-200 text-right font-semibold text-blue-900"><?= number_format($total, 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-blue-200 font-bold text-blue-950">
                            <td colspan="4" class="p-3 border border-blue-300 text-right uppercase font-sans">Grand Total Nilai Stok:</td>
                            <td class="p-3 border border-blue-300 text-right text-base text-blue-900">
                                Rp <?= number_format($grandTotal, 0, ',', '.') ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

    </div>
</body>
</html>

