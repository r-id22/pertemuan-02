<?php
declare(strict_types=1);

abstract class Pegawai
{
    public function __construct(
        public string $nama,
        public float $gajiPokok
    ) {}

    abstract public function hitungGaji(): float;

    final public function info(): string
    {
        return "Nama Pegawai: {$this->nama}";
    }
}
