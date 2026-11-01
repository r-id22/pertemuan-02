<?php
declare(strict_types=1);

require_once 'Pegawai.php';

class Guru extends Pegawai
{
    public function __construct(
        string $nip,
        string $nama,
        public int $gajiPokok,
        public int $tunjanganSertifikasi
    ) {
        parent::__construct($nip, $nama);
    }

    // Instruksi No. 2: Override hitungGaji()
    public function hitungGaji(): int
    {
        return $this->gajiPokok + $this->tunjanganSertifikasi;
    }
}
