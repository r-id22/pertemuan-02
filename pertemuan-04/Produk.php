<?php
declare(strict_types=1);

class Produk
{
    public static int $jumlahProduk = 0;

    public function __construct(
        public readonly string $namaProduk,
        public int $harga,
        public int $stok
    ) {
        self::$jumlahProduk++;
    }

    public function hitungTotalNilai(): int
    {
        return $this->harga * $this->stok;
    }
}
