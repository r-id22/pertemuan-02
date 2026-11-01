<?php
declare(strict_types=1);

class Sekolah
{
    /** @var Pegawai[] */
    private array $daftarPegawai = [];

    public function __construct(public string $namaSekolah) {}

    public function tambahPegawai(Pegawai $pegawai): void
    {
        $this->daftarPegawai[] = $pegawai;
    }

    /** @return Pegawai[] */
    public function getDaftarPegawai(): array
    {
        return $this->daftarPegawai;
    }

    // Instruksi No. 4: Menghitung total keseluruhan gaji semua pegawai di sekolah
    public function hitungTotalGajiSemuaPegawai(): int
    {
        $total = 0;
        foreach ($this->daftarPegawai as $pegawai) {
            $total += $pegawai->hitungGaji();
        }
        return $total;
    }
}
