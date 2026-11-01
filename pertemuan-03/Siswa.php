<?php

/**
 * Class Siswa
 * Mengimplementasikan enkapsulasi dengan validasi pada setter nama dan nilai.
 */
class Siswa
{
    private string $nama;
    private float $nilai;

    public function __construct(string $nama, float $nilai)
    {
        $this->setNama($nama);
        $this->setNilai($nilai);
    }

    // Setter Nama dengan validasi (tidak kosong)
    public function setNama(string $nama): void
    {
        $namaTrim = trim($nama);
        if (empty($namaTrim)) {
            throw new Exception("Nama siswa tidak boleh kosong!");
        }
        $this->nama = $namaTrim;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    // Setter Nilai dengan validasi (rentang 0 - 100)
    public function setNilai(float $nilai): void
    {
        if ($nilai < 0 || $nilai > 100) {
            throw new Exception("Nilai harus berada di antara 0 sampai 100!");
        }
        $this->nilai = $nilai;
    }

    public function getNilai(): float
    {
        return $this->nilai;
    }
}

