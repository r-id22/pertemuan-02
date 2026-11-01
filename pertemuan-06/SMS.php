<?php
declare(strict_types=1);

require_once 'Notifikasi.php';

class SMS implements Notifikasi
{
    public function kirim(string $pesan): string
    {
        return "Mengirim SMS: \"{$pesan}\"";
    }
}
