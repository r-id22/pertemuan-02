<?php
declare(strict_types=1);

require_once 'Pegawai.php';

class Guru extends Pegawai
{
    public function __construct(
        string $nama,
        float $gajiPokok,
        public int $jamMengajar
    ) {
        parent::__construct($nama,$gajiPokok);
    }

    public function hitungGaji(): float
    {
        return $this->gajiPokok + ($this->jamMengajar * 50000);
    }
}
