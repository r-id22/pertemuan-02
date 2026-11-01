<?php

class Rekening {
    private string $nomor;
    private string $pemilik;
    private float $saldo;
    private array $riwayatTransaksi = [];

    public function __construct(string $nomor, string $pemilik, float $saldoAwal = 0.0) {
        $this->nomor = $nomor;
        $this->pemilik = $pemilik;
        $this->saldo = $saldoAwal;
    }

    public function getNomor(): string {
        return $this->nomor;
    }

    public function getPemilik(): string {
        return $this->pemilik;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    public function getRiwayatTransaksi(): array {
        return $this->riwayatTransaksi;
    }

    public function setor(float $jumlah): void {
        if ($jumlah <= 0) {
            throw new InvalidArgumentException("Jumlah setor harus lebih besar dari 0");
        }
        $this->saldo += $jumlah;
        $this->riwayatTransaksi[] = "Setor: " . $jumlah;
    }

    public function tarik(float $jumlah): void {
        if ($jumlah <= 0) {
            throw new InvalidArgumentException("Jumlah tarik harus lebih besar dari 0");
        }
        if ($jumlah > $this->saldo) {
            throw new InvalidArgumentException("Saldo tidak mencukupi");
        }
        $this->saldo -= $jumlah;
        $this->riwayatTransaksi[] = "Tarik: " . $jumlah;
    }

    public function transfer(Rekening $tujuan, float $jumlah): void {
        if ($jumlah <= 0) {
            throw new InvalidArgumentException("Jumlah transfer harus lebih besar dari 0");
        }
        if ($jumlah > $this->saldo) {
            throw new InvalidArgumentException("Saldo tidak mencukupi");
        }
        $this->tarik($jumlah);
        $tujuan->terimaTransfer($jumlah);
        $this->riwayatTransaksi[] = "Transfer ke " . $tujuan->getPemilik() . ": " . $jumlah;
    }

    public function terimaTransfer(float $jumlah): void {
        $this->saldo += $jumlah;
        $this->riwayatTransaksi[] = "Terima transfer: " . $jumlah;
    }
}
