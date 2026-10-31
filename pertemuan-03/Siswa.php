<?php
class Siswa {
    private string $nama = '';
    private int $nilai = 0;

    public function setNama(string $nama): void {
        if (trim($nama) !== '') {
            $this->nama = $nama;
        }
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function setNilai(int $nilai): void {
        if ($nilai >= 0 && $nilai <= 100) {
            $this->nilai = $nilai;
        }
    }

    public function getNilai(): int {
        return $this->nilai;
    }
}
