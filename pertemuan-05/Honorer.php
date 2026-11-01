<?php
declare(strict_types=1);

require_once 'Pegawai.php';

class Honorer extends Pegawai
{
    public function __construct(
        string $nama,
        public float $gajiPerJam,
        public int $jamKerja
    ) {
        parent::__construct($nama, 0);
    }

    public function hitungGaji(): float
    {
        return $this->gajiPerJam * $this->jamKerja;
    }
}
