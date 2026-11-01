<?php
declare(strict_types=1);

require_once 'Pegawai.php';

class Staf extends Pegawai
{
    public function __construct(
        string $nip,
        string $nama,
        public int $gajiPokok,
        public int $tunjanganBagian
    ) {
        parent::__construct($nip, $nama);
    }

    // Instruksi No. 2: Override hitungGaji() dengan tunjangan bagian
    public function hitungGaji(): int
    {
        return $this->gajiPokok + $this->tunjanganBagian;
    }
}
