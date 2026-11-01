<?php
declare(strict_types=1);

require_once 'BangunDatar.php';

class Segitiga extends BangunDatar
{
    public function __construct(
        public float $alas,
        public float $tinggi,
        public float $sisiMiring
    ) {}

    public function luas(): float
    {
        return 0.5 * $this->alas * $this->tinggi;
    }

    public function keliling(): float
    {
        return $this->alas + $this->tinggi + $this->sisiMiring;
    }
}
