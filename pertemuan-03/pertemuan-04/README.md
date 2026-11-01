# Catatan Lab Sheet Pertemuan 4: Refactor OOP PHP 8

Berikut adalah catatan perbandingan jumlah baris kode sebelum refactor (Pertemuan 2) dan sesudah refactor (Pertemuan 4) menggunakan fitur modern PHP 8 (Constructor Promotion, Readonly, Static, dan Enum):

## Tabel Perbandingan Baris Kode

| File Kelas | Sebelum (Pertemuan 2) | Sesudah (Pertemuan 4) | Penjelasan & Keunggulan Refactor |
| :--- | :---: | :---: | :--- |
| **`Mahasiswa.php`** | ± 45 Baris | ± 32 Baris | **Lebih ringkas**. Deklarasi properti dan parameter constructor digabung menggunakan *Constructor Promotion* (`public readonly string $nim`, dll.), sehingga menghilangkan pengulangan `$this->nim = $nim;`. |
| **`Produk.php`** | ± 28 Baris | ± 18 Baris | **Lebih efisien**. Baris kode penugasan properti manual di dalam method `__construct` ditiadakan. |

## Penerapan Fitur PHP 8
- **Constructor Promotion**: Mengurangi duplikasi penulisan properti di awal class dan parameter constructor.
- **Readonly Property**: Properti `$nim` pada class `Mahasiswa` dibuat `readonly` untuk memastikan datanya tidak dapat diubah setelah diinisialisasi (immutable).
- **Static & Konstanta**: Menambahkan `BATAS_SKS` dan *counter* objek (`getJumlahObject()`) untuk memantau instansiasi class.
- **Enum (`Semester` & `Predikat`)**: Mengganti string bebas dengan tipe data enumerasi yang aman, lengkap dengan method `label()`.
