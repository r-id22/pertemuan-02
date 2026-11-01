<?php
declare(strict_types=1);

require_once 'Guru.php';
require_once 'Staf.php';
require_once 'Honorer.php';
require_once 'Sekolah.php';

$sekolah = new Sekolah();$sekolah->tambahPegawai(new Guru("Rahmansyah", 4000000, 24));
$sekolah->tambahPegawai(new Staf("Ahmad Zaki", 3500000, 500000));
$sekolah->tambahPegawai(new Honorer("Budi Santoso", 75000, 60));
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
    <div class="max-w-4xl mx-auto space-y-6">
        
        <!-- Header -->
        <header class="bg-white shadow-md rounded-2xl p-6 border-t-4 border-blue-600 flex justify-between items-center">
            <div>
                <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Lab Sheet Pertemuan 5</span>
                <h1 class="text-2xl font-bold text-blue-900 mt-2">Inheritance dan Method Overriding</h1>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-slate-700">Rahmansyah</p>
                <p class="text-xs text-blue-600 font-semibold">24.24.032255</p>
            </div>
        </header>

        <!-- Daftar Pegawai -->
        <section class="bg-white shadow-md rounded-2xl p-6 border border-blue-100 space-y-4">
            <h2 class="text-xl font-bold text-blue-800">Manajemen Gaji Pegawai Sekolah</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-blue-600 text-white uppercase text-xs">
                            <th class="py-3 px-4">Nama</th>
                            <th class="py-3 px-4">Jabatan / Kelas</th>
                            <th class="py-3 px-4 text-right">Total Gaji (Rp)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-50">
                        <?php foreach ($sekolah->getPegawaiList() as$pegawai): 
                            $jabatan = (new ReflectionClass($pegawai))->getShortName();
                        ?>
                        <tr class="hover:bg-blue-50/50">
                            <td class="py-3 px-4 font-medium text-slate-800"><?= $pegawai->info() ?></td>
                            <td class="py-3 px-4"><span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-1 rounded font-mono"><?= $jabatan ?></span></td>
                            <td class="py-3 px-4 text-right font-mono font-bold text-blue-700">Rp <?= number_format($pegawai->hitungGaji(), 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-blue-50 font-bold text-blue-900 border-t border-blue-200">
                            <td colspan="2" class="py-3 px-4 text-right uppercase text-xs">Total Keseluruhan Alokasi Gaji:</td>
                            <td class="py-3 px-4 text-right font-mono text-blue-800">Rp <?= number_format($sekolah->totalGaji(), 0, ',', '.') ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

    </div>
</body>
</html>
