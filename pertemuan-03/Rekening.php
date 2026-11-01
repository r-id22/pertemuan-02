<?php

/**
 * Class Rekening
 * Mengimplementasikan enkapsulasi dengan properti private serta method getter, setter, dan transfer.
 */
class Rekening
{
    private string $nomor;
    private string $pemilik;
    private float $saldo;
    private array $riwayatTransaksi = [];

    public function __construct(string $nomor, string $pemilik, float $saldoAwal = 0.0)
    {
        $this->nomor = $nomor;
        $this->pemilik = $pemilik;
        $this->saldo = $saldoAwal;
        $this->riwayatTransaksi[] = "Rekening dibuka dengan saldo awal: Rp " . number_format($saldoAwal, 0, ',', '.');
    }

    // Getter untuk nomor
    public function getNomor(): string
    {
        return $this->nomor;
    }

    // Getter untuk pemilik
    public function getPemilik(): string
    {
        return $this->pemilik;
    }

    // Getter untuk saldo
    public function getSaldo(): float
    {
        return $this->saldo;
    }

    // Getter untuk riwayat transaksi
    public function getRiwayatTransaksi(): array
    {
        return $this->riwayatTransaksi;
    }

    // Method Setoran
    public function setor(float $jumlah): void
    {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            $this->riwayatTransaksi[] = "Setor tunai: +Rp " . number_format($jumlah, 0, ',', '.');
        }
    }

    // Method Transfer (Sesuai instruksi nomor 2)
    public function transfer(Rekening $tujuan, float $jumlah): void
    {
        if ($jumlah > 0 && $this->saldo >= $jumlah) {
            $this->saldo -= $jumlah;
            $this->riwayatTransaksi[] = "Transfer ke " . $tujuan->getPemilik() . " (" . $tujuan->getNomor() . "): -Rp " . number_format($jumlah, 0, ',', '.');
            
            // Catat ke rekening tujuan
            $tujuan->terimaTransfer($this, $jumlah);
        } else {
            $this->riwayatTransaksi[] = "Gagal transfer ke " . $tujuan->getPemilik() . ": Saldo tidak mencukupi atau jumlah tidak valid.";
        }
    }

    // Helper untuk menerima transfer
    public function terimaTransfer(Rekening $sumber, float $jumlah): void
    {
        $this->saldo += $jumlah;
        $this->riwayatTransaksi[] = "Menerima transfer dari " . $sumber->getPemilik() . ": +Rp " . number_format($jumlah, 0, ',', '.');
    }
}
