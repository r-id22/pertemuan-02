<?php
declare(strict_types=1);

class Produk
{
    private static int $counter = 0;

    // Constructor Promotion
    public function __construct(
        public string $nama,
        public int $harga,
        public int $stok
    ) {
        self::$counter++;
    }

    public function totalNilai(): int
    {
        return $this->harga * $this->stok;
    }

    public static function getJumlahObject(): int
    {
        return self::$counter;
    }
}
