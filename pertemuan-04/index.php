<?php
declare(strict_types=1);

require_once 'Semester.php';
require_once 'Predikat.php';
require_once 'Mahasiswa.php';
require_once 'Produk.php';

// Data Mahasiswa Sesuai Pertemuan 2[span_4](start_span)[span_4](end_span)
$daftarMahasiswa = [
    new Mahasiswa("24.24.032255", "Rahmansyah", "Pendidikan Teknologi Informasi", 3.50, Semester::GANJIL),
    new Mahasiswa("24.24.1635", "M. Fitriannur Akbar", "Pendidikan Teknologi Informasi", 3.15, Semester::GANJIL),
    new Mahasiswa("24.24.032095", "Okta Ramadhani", "Pendidikan Teknologi Informasi", 3.60, Semester::GENAP),
];

// 20 Data Produk Spreadsheet Sesuai Pertemuan 2[span_5](start_span)[span_5](end_span)
$daftarProduk = [
    new Produk("Laptop ASUS Vivobook", 8500000, 12),
    new Produk("Mouse Wireless Logitech", 150000, 45),
    new Produk("Keyboard Mekanikal Redragon", 450000, 25),
    new Produk("Monitor LG 24 Inch IPS", 1850000, 15),
    new Produk("Flashdisk SanDisk 64GB", 85000, 60),
    new Produk("Harddisk Eksternal WD 1TB", 750000, 20),
    new Produk("SSD NVMe Samsung 500GB", 950000, 18),
    new Produk("Webcam HD 1080p", 320000, 30),
    new Produk("Headset Gaming Rexus", 275000, 40),
    new Produk("Printer Epson L3210", 2300000, 8),
    new Produk("Router TP-Link AC1200", 410000, 22),
    new Produk("Kabel HDMI 3 Meter", 45000, 75),
    new Produk("Cooling Pad Laptop", 110000, 35),
    new Produk("USB Hub 4 Port", 65000, 50),
    new Produk("MicroSD SanDisk 128GB", 165000, 40),
    new Produk("Proyektor BenQ Full HD", 5400000, 5),
    new Produk("UPS ICA 1200VA", 1250000, 10),
    new Produk("Speaker Bluetooth JBL", 600000, 28),
    new Produk("Drawing Tablet Huion", 890000, 14),
    new Produk("Stand Laptop Aluminium", 135000, 32),
];

$grandTotalNilai = 0;
foreach ($daftarProduk as $prod) {
    $grandTotalNilai += $prod->hitungTotalNilai();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Sheet PBO - Pertemuan 4</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen py-6 px-4">
    <div class="max-w-5xl mx-auto space-y-6">
        
        <!-- Header -->
        <header class="bg-white shadow-sm rounded-xl p-5 border border-blue-100 flex justify-between items-center">
            <div>
                <h1 class="text-lg font-bold text-blue-700">Lab Sheet Pertemuan 4: Static, Konstanta, dan Fitur OOP PHP 8</h1>
                <p class="text-xs text-slate-500 mt-0.5">Praktikum Pemrograman Berorientasi Objek (PBO)</p>
            </div>
            <div class="text-right">
                <p class="text-xs font-semibold text-slate-700">Rahmansyah</p>
                <p class="text-[11px] text-blue-600 font-mono">24.24.032255</p>
            </div>
        </header>

        <!-- Data Mahasiswa -->
        <section class="bg-white shadow-sm rounded-xl overflow-hidden border border-blue-200">
            <div class="bg-blue-600 px-5 py-3 text-white flex justify-between items-center">
                <h2 class="font-bold text-sm tracking-wide">Data Mahasiswa</h2>
                <span class="bg-blue-700 text-white text-xs px-2.5 py-0.5 rounded-full font-medium"><?= Mahasiswa::$jumlahMahasiswa ?> Objek</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-blue-50/80 text-blue-900 font-semibold text-xs border-b border-blue-100 uppercase">
                            <th class="py-3 px-4 text-center w-12">No</th>
                            <th class="py-3 px-4">NIM</th>
                            <th class="py-3 px-4">Nama Mahasiswa</th>
                            <th class="py-3 px-4">Program Studi</th>
                            <th class="py-3 px-4 text-center">IPK</th>
                            <th class="py-3 px-4 text-center">Predikat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-50">
                        <?php 
                        $noMhs = 1;
                        foreach ($daftarMahasiswa as $mhs): 
                        ?>
                        <tr class="hover:bg-blue-50/40">
                            <td class="py-3 px-4 text-center text-slate-500 font-mono"><?= $noMhs++ ?></td>
                            <td class="py-3 px-4 font-mono text-blue-700 font-medium"><?= $mhs->nim ?></td>
                            <td class="py-3 px-4 font-medium text-slate-800"><?= $mhs->nama ?></td>
                            <td class="py-3 px-4 text-slate-600"><?= $mhs->prodi ?></td>
                            <td class="py-3 px-4 text-center font-bold text-slate-700"><?= number_format($mhs->ipk, 2) ?></td>
                            <td class="py-3 px-4 text-center">
                                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-medium shadow-2xs"><?= $mhs->getPredikat()->label() ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Spreadsheet Stok & Total Nilai Produk -->
        <section class="bg-white shadow-sm rounded-xl overflow-hidden border border-blue-200">
            <div class="bg-blue-600 px-5 py-3 text-white flex justify-between items-center">
                <h2 class="font-bold text-sm tracking-wide">Spreadsheet Stok & Total Nilai Produk</h2>
                <span class="bg-blue-700 text-white text-xs px-2.5 py-0.5 rounded-full font-medium"><?= Produk::$jumlahProduk ?> Data Produk</span>
            </div>
            <div class="overflow-x-auto max-h-[420px]">
                <table class="w-full text-left border-collapse text-sm">
                    <thead class="sticky top-0 bg-blue-50/90 text-blue-900 font-semibold text-xs border-b border-blue-100 uppercase backdrop-blur-xs">
                        <tr>
                            <th class="py-3 px-4 text-center w-12">No</th>
                            <th class="py-3 px-4">Nama Produk</th>
                            <th class="py-3 px-4 text-right">Harga (Rp)</th>
                            <th class="py-3 px-4 text-center">Stok</th>
                            <th class="py-3 px-4 text-right">Total Nilai (Rp)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-50">
                        <?php 
                        $noProd = 1;
                        foreach ($daftarProduk as $prod): 
                        ?>
                        <tr class="hover:bg-blue-50/40">
                            <td class="py-2.5 px-4 text-center text-slate-500 font-mono"><?= $noProd++ ?></td>
                            <td class="py-2.5 px-4 text-slate-800 font-medium"><?= $prod->namaProduk ?></td>
                            <td class="py-2.5 px-4 text-right font-mono text-slate-600"><?= number_format($prod->harga, 0, ',', '.') ?></td>
                            <td class="py-2.5 px-4 text-center font-mono text-slate-700"><?= $prod->stok ?></td>
                            <td class="py-2.5 px-4 text-right font-mono font-semibold text-blue-700"><?= number_format($prod->hitungTotalNilai(), 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-blue-50 font-bold text-blue-900 border-t border-blue-200">
                            <td colspan="4" class="py-3 px-4 text-right uppercase text-xs tracking-wider">Grand Total Nilai Stok:</td>
                            <td class="py-3 px-4 text-right font-mono text-blue-800 text-sm">Rp <?= number_format($grandTotalNilai, 0, ',', '.') ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

    </div>
</body>
</html>
