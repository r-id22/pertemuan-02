<?php
declare(strict_types=1);

require_once 'Segitiga.php';
require_once 'PersegiPanjang.php';
require_once 'Email.php';
require_once 'WhatsApp.php';
require_once 'SMS.php';

// Inisialisasi Bangun Datar
$bangunDatarList = [
    new Segitiga(6.0, 8.0, 10.0),
    new PersegiPanjang(12.0, 5.0)
];

// Inisialisasi Channel Notifikasi
$channelNotif = [
    new Email(),
    new WhatsApp(),
    new SMS()
];

$pesanBroadcast = "Halo Rahmansyah, Jadwal Praktikum PBO Pertemuan 6 telah dimulai!";
$hasilKirim = kirimSemua($channelNotif, $pesanBroadcast);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Sheet PBO - Pertemuan 6</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-blue-50 text-slate-800 min-h-screen py-10 px-4">
    <div class="max-w-5xl mx-auto space-y-8">
        
        <!-- Header -->
        <header class="bg-white shadow-md rounded-2xl p-6 border-t-4 border-blue-600 flex justify-between items-center">
            <div>
                <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Lab Sheet Pertemuan 6</span>
                <h1 class="text-2xl font-bold text-blue-900 mt-2">Abstraction dan Polymorphism</h1>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-slate-600">Rahmansyah</p>
                <p class="text-xs text-blue-600 font-semibold">24.24.032255</p>
            </div>
        </header>

        <!-- Bagian Bangun Datar -->
        <section class="bg-white shadow-md rounded-2xl p-6 border border-blue-100">
            <h2 class="text-xl font-bold text-blue-800 mb-4">1. Hierarki Abstract Class Bangun Datar</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?php foreach ($bangunDatarList as $bangun): 
                    $namaKelas = (new ReflectionClass($bangun))->getShortName();
                ?>
                <div class="bg-blue-600 text-white p-5 rounded-xl shadow-sm">
                    <span class="bg-blue-500 text-xs px-2.5 py-1 rounded font-mono mb-2 inline-block"><?= $namaKelas ?></span>
                    <div class="mt-2 space-y-1 text-sm">
                        <p>Luas: <b><?= $bangun->luas() ?></b></p>
                        <p>Keliling: <b><?= $bangun->keliling() ?></b></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Bagian Polimorfisme Notifikasi -->
        <section class="bg-white shadow-md rounded-2xl p-6 border border-blue-100">
            <h2 class="text-xl font-bold text-blue-800 mb-4">2. Polimorfisme Interface Notifikasi (`kirimSemua`)</h2>
            <p class="text-sm text-slate-600 mb-4">Pesan Broadcast: <i class="text-blue-700 font-medium">"<?= $pesanBroadcast ?>"</i></p>
            <div class="space-y-2">
                <?php foreach ($hasilKirim as $log): ?>
                <div class="bg-blue-50 border border-blue-200 p-3 rounded-lg text-sm font-mono text-blue-900">
                    ✓ <?= $log ?>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>
</body>
</html>
