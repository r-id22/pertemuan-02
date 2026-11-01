<?php

class Siswa {
    private string $nama;
    private float $nilai;

    public function __construct(string $nama, float $nilai) {
        $this->setNama($nama);
        $this->setNilai($nilai);
    }

    public function setNama(string $nama): void {
        if (trim($nama) === "") {
            throw new InvalidArgumentException("Nama tidak boleh kosong");
        }
        $this->nama = $nama;
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function setNilai(float $nilai): void {
        if ($nilai < 0 || $nilai > 100) {
            throw new InvalidArgumentException("Nilai harus antara 0 sampai 100");
        }
        $this->nilai = $nilai;
    }

    public function getNilai(): float {
        return $this->nilai;
    }
}
