<?php

namespace App;

class Produk
{
    private string $nama;
    private float $harga;
    private int $stok;

    public function __construct(string $nama, float $harga, int $stok)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getHarga(): float
    {
        return $this->harga;
    }

    public function getStok(): int
    {
        return $this->stok;
    }

    public function totalNilai(): float
    {
        return $this->harga * $this->stok;
    }
}
