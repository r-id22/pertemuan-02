<?php
declare(strict_types=1);

// LAB 5 - Inheritance dan Method Overriding

class Pegawai {
    public function __construct(
        public string $nama,
        public float $gajiPokok = 0
    ) {}

    public function hitungGaji(): float {
        return $this->gajiPokok;
    }

    final public function info(): string {
        return "Pegawai: {$this->nama}, Gaji: {$this->hitungGaji()}";
    }
}

class Guru extends Pegawai {
    public function __construct(
        string $nama,
        float $gajiPokok,
        public int $jamMengajar
    ) {
        parent::__construct($nama, $gajiPokok);
    }

    public function hitungGaji(): float {
        return parent::hitungGaji() + ($this->jamMengajar * 50000);
    }
}

class Staf extends Pegawai {
    public function __construct(
        string $nama,
        float $gajiPokok,
        public float $tunjangan
    ) {
        parent::__construct($nama, $gajiPokok);
    }

    public function hitungGaji(): float {
        return parent::hitungGaji() + $this->tunjangan;
    }
}

class Honorer extends Pegawai {
    public function __construct(
        string $nama,
        public float $gajiPerJam,
        public int $jamKerja
    ) {
        parent::__construct($nama, 0);
    }

    public function hitungGaji(): float {
        return $this->gajiPerJam * $this->jamKerja;
    }
}

class Sekolah {
    private array $daftarPegawai = [];

    public function tambahPegawai(Pegawai $pegawai): void {
        $this->daftarPegawai[] = $pegawai;
    }

    public function totalGaji(): float {
        $total = 0;
        foreach ($this->daftarPegawai as $pegawai) {
            $total += $pegawai->hitungGaji();
        }
        return $total;
    }
}

// Inisialisasi dan Pengujian Objek
$guru = new Guru('Budi', 4000000, 24);
$staf = new Staf('Siti', 3500000, 500000);
$honorer = new Honorer('Andi', 25000, 80);

echo "Gaji Guru: " . number_format($guru->hitungGaji(), 0, ',', '.') . "\n";
echo "Gaji Staf: " . number_format($staf->hitungGaji(), 0, ',', '.') . "\n";
echo "Gaji Honorer: " . number_format($honorer->hitungGaji(), 0, ',', '.') . "\n";

$sekolah = new Sekolah();
$sekolah->tambahPegawai($guru);
$sekolah->tambahPegawai($staf);
$sekolah->tambahPegawai($honorer);

echo "Total Gaji Sekolah: " . number_format($sekolah->totalGaji(), 0, ',', '.') . "\n";

/*
  CATATAN PEMBUKTIAN ERROR OVERRIDE METHOD FINAL:
  // class SubPegawai extends Pegawai {
  //     public function info(): string { return "Error"; } 
  //     // Fatal error: Cannot override final method Pegawai::info()
  // }
*/
