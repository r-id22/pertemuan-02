<?php

namespace App;

class Mahasiswa
{
    private string $nim;
    private string $nama;
    private string $prodi;
    private float $ipk;

    public function __construct(string $nim, string $nama, string $prodi, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->ipk = $ipk;
    }

    public function getNim(): string
    {
        return $this->nim;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getProdi(): string
    {
        return $this->prodi;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function predikat(): string
    {
        if ($this->ipk >= 3.51) {
            return 'Cumlaude';
        } elseif ($this->ipk >= 3.00) {
            return 'Sangat Memuaskan';
        } else {
            return 'Memuaskan';
        }
    }

    public function info(): array
    {
        return [
            'nim' => $this->nim,
            'nama' => $this->nama,
            'prodi' => $this->prodi,
            'ipk' => number_format($this->ipk, 2),
            'predikat' => $this->predikat(),
        ];
    }
}
