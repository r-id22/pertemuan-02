<?php
declare(strict_types=1);

require_once 'Semester.php';
require_once 'Predikat.php';

class Mahasiswa
{
    // Instruksi No. 2: Konstanta BATAS_SKS = 24
    public const int BATAS_SKS = 24;

    // Instruksi No. 2: Counter static jumlah objek
    public static int $jumlahMahasiswa = 0;

    // Instruksi No. 1 & 3: Constructor promotion & readonly pada $nim
    public function __construct(
        public readonly string $nim,
        public string $nama,
        public string $prodi,
        public float $ipk,
        public Semester $semester
    ) {
        self::$jumlahMahasiswa++;
    }

    public function getPredikat(): Predikat
    {
        if ($this->ipk >= 3.60) {
            return Predikat::CUMLAUDE;
        } elseif ($this->ipk >= 3.00) {
            return Predikat::SANGAT_MEMUASKAN;
        } else {
            return Predikat::MEMUASKAN;
        }
    }

    public function getInfo(): string
    {
        return "NIM: {$this->nim} | Nama: {$this->nama} | Prodi: {$this->prodi} | IPK: {$this->ipk}";
    }

    /*
     * =========================================================================
     * BUKTI ERROR READONLY PROPERTY (Instruksi No. 3):
     * try {
     *     $mhs = new Mahasiswa("24.24.032255", "Rahmansyah", "Pendidikan Teknologi Informasi", 3.50, Semester::GANJIL);
     *     $mhs->nim = "000000"; // Akan memicu Fatal Error:
     *     // "Fatal error: Cannot modify readonly property Mahasiswa::$nim"
     * } catch (\Throwable $e) {
     *     echo "Error: " . $e->getMessage();
     * }
     * =========================================================================
     */
}
