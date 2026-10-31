<?php
class Rekening {
    private string $nomor;
    private string $pemilik;
    private float $saldo = 0;
    private array $riwayat = [];

    public function __construct(string $nomor, string $pemilik) {
        $this->nomor = $nomor;
        $this->pemilik = $pemilik;
    }

    public function setor(float $jumlah): bool {
        if ($jumlah <= 0) {
            return false;
        }
        $this->saldo += $jumlah;
        $this->riwayat[] = "Setor: +{$jumlah}";
        return true;
    }

    public function tarik(float $jumlah): bool {
        if ($jumlah <= 0 || $jumlah > $this->saldo) {
            return false;
        }
        $this->saldo -= $jumlah;
        $this->riwayat[] = "Tarik: -{$jumlah}";
        return true;
    }

    public function transfer(Rekening $tujuan, float $jumlah): bool {
        if ($jumlah <= 0 || $jumlah > $this->saldo) {
            return false;
        }
        $this->tarik($jumlah);
        $tujuan->setor($jumlah);
        $this->riwayat[] = "Transfer: -{$jumlah} ke {$tujuan->pemilik}";
        return true;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    public function getRiwayat(): array {
        return $this->riwayat;
    }

    public function getPemilik(): string {
        return $this->pemilik;
    }

    public function getNomor(): string {
        return $this->nomor;
    }
}
