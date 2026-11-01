<?php
declare(strict_types=1);

require_once 'Pegawai.php';
require_once 'Guru.php';
require_once 'Staf.php';
require_once 'Honorer.php';
require_once 'Sekolah.php';

// Inisialisasi Komposisi Objek Sekolah
$sekolah = new Sekolah("SDN 2 Ketapang");

// Menambahkan berbagai objek pegawai (Guru, Staf, Honorer)
$sekolah->tambahPegawai(new Guru("198510052010", "Rahmansyah, S.Pd.", 3500000, 1500000));
$sekolah->tambahPegawai(new Guru("199001122015", "M. Fitriannur Akbar, S.Pd.", 3500000, 1200000));
$sekolah->tambahPegawai(new Staf("199203202018", "Okta Ramadhani, A.Md.", 2800000, 750000));
$sekolah->tambahPegawai(new Honorer("2024001", "Ahmad Zaki", 60, 50000)); // 60 jam x Rp 50.000
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Sheet PBO - Pertemuan 5</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-blue-50 text-slate-800 min-h-screen py-10 px-4">
    <div class="max-w-5xl mx-auto space-y-8">
        
        <!-- Header -->
        <header class="bg-white shadow-md rounded-2xl p-6 border-t-4 border-blue-600 flex justify-between items-center">
            <div>
                <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Lab Sheet Pertemuan 5</span>
                <h1 class="text-2xl font-bold text-blue-900 mt-2">Inheritance, Method Overriding, & Komposisi</h1>
                <p class="text-sm text-slate-500 mt-1">Institusi: <b><?= $sekolah->namaSekolah ?></b></p>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-slate-600">Total Pegawai: <b><?= count($sekolah->getDaftarPegawai()) ?> Orang</b></p>
                <p class="text-xs text-blue-600 font-semibold">Total Alokasi Gaji: Rp <?= number_format($sekolah->hitungTotalGajiSemuaPegawai(), 0, ',', '.') ?></p>
            </div>
        </header>

        <!-- Tabel Daftar Pegawai -->
        <section class="bg-white shadow-md rounded-2xl p-6 border border-blue-100">
            <h2 class="text-xl font-bold text-blue-800 mb-4">Daftar Pegawai & Rincian Gaji (Polimorfisme & Overriding)</h2>
            <div class="overflow-x-auto rounded-xl border border-blue-100">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-blue-600 text-white text-xs uppercase">
                            <th class="py-3 px-4 text-center w-16">No</th>
                            <th class="py-3 px-4">Informasi Pegawai (Method info)</th>
                            <th class="py-3 px-4 text-center">Jabatan / Role</th>
                            <th class="py-3 px-4 text-right">Total Gaji (hitungGaji)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-50 text-sm">
                        <?php 
                        $no = 1;
                        foreach ($sekolah->getDaftarPegawai() as $pegawai):
                            $jabatan = (new ReflectionClass($pegawai))->getShortName();
                        ?>
                        <tr class="hover:bg-blue-50/60">
                            <td class="py-3 px-4 text-center text-slate-500"><?= $no++ ?></td>
                            <td class="py-3 px-4 font-medium text-slate-800"><?= $pegawai->info() ?></td>
                            <td class="py-3 px-4 text-center">
                                <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full"><?= $jabatan ?></span>
                            </td>
                            <td class="py-3 px-4 text-right font-mono font-semibold text-blue-700">Rp <?= number_format($pegawai->hitungGaji(), 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-blue-100 font-bold text-blue-900">
                            <td colspan="3" class="py-3 px-4 text-right">Total Keseluruhan Gaji Pegawai:</td>
                            <td class="py-3 px-4 text-right font-mono text-blue-700">Rp <?= number_format($sekolah->hitungTotalGajiSemuaPegawai(), 0, ',', '.') ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

    </div>
</body>
</html>
