<?php
declare(strict_types=1);

abstract class Pegawai
{
    public function __construct(
        public readonly string $nip,
        public string $nama
    ) {}

    // Instruksi No. 3: Method info() dibuat final agar tidak bisa di-override oleh class anak
    final public function info(): string
    {
        return "NIP: {$this->nip} | Nama: {$this->nama}";
    }

    // Abstract method untuk polymorphism perhitungan gaji
    abstract public function hitungGaji(): int;
}
