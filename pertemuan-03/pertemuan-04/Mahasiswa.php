<?php
declare(strict_types=1);

require_once 'Predikat.php';

class Mahasiswa
{
    public const int BATAS_SKS = 24;
    private static int $counter = 0;

    // Constructor Promotion & Readonly Property pada nim
    public function __construct(
        public readonly string $nim,
        public string $nama,
        public string $prodi,
        public float $ipk
    ) {
        self::$counter++;
    }

    public function info(): string
    {
        return "NIM: {$this->nim} | Nama: {$this->nama} | Prodi: {$this->prodi} | IPK: {$this->ipk}";
    }

    public function getPredikat(): Predikat
    {
        if ($this->ipk >= 3.51) {
            return Predikat::CUMLAUDE;
        } elseif ($this->ipk >= 3.01) {
            return Predikat::SANGAT_MEMUASKAN;
        } else {
            return Predikat::MEMUASKAN;
        }
    }

    public static function getJumlahObject(): int
    {
        return self::$counter;
    }

    /* 
     * BUKTI ERROR READONLY PROPERTY (Tugas No. 3):
     * Jika baris di bawah ini dijalankan, PHP akan melempar Error: 
     * "Cannot modify readonly property Mahasiswa::$nim"
     * 
     * public function ubahNim(string $nimBaru): void {
     *     try {
     *         $this->nim = $nimBaru;
     *     } catch (\Error $e) {
     *         echo "Error tertangkap: " . $e->getMessage();
     *     }
     * }
     */
}
