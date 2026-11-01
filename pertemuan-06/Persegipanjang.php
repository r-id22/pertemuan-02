<?php
declare(strict_types=1);

require_once 'BangunDatar.php';

class PersegiPanjang extends BangunDatar
{
    public function __construct(
        public float $panjang,
        public float $lebar
    ) {}

    public function luas(): float
    {
        return $this->panjang * $this->lebar;
    }

    public function keliling(): float
    {
        return 2 * ($this->panjang + $this->lebar);
    }
}
