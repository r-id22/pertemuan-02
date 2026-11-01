<?php
declare(strict_types=1);

require_once 'Pegawai.php';

class Sekolah
{
    /** @var Pegawai[] */
    private array $pegawaiList = [];

    public function tambahPegawai(Pegawai $p): void
    {
        $this->pegawaiList[] =$p;
    }

    public function totalGaji(): float
    {
        $total = 0;
        foreach ($this->pegawaiList as$p) {
            $total +=$p->hitungGaji();
        }
        return $total;
    }

    public function getPegawaiList(): array
    {
        return $this->pegawaiList;
    }
}
