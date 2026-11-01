<?php
declare(strict_types=1);

interface Notifikasi
{
    public function kirim(string $pesan): string;
}
