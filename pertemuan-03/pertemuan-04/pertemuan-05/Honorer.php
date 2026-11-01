<?php
declare(strict_types=1);

require_once 'Pegawai.php';

class Honorer extends Pegawai
{
    public function __construct(
        string $nip,
        string $nama,
        public int $jumlahJamHadir,
        public int $honorPerJam
    ) {
        parent::__construct($nip, $nama);
    }

    // Instruksi No. 2: Override hitungGaji() berdasarkan jam kerja
    public function hitungGaji(): int
    {
        return $this->jumlahJamHadir * $this->honorPerJam;
    }
}
