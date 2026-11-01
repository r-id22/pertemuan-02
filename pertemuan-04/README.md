# Catatan Lab Sheet Pertemuan 4: Static, Konstanta, dan Fitur OOP PHP 8

## Perbandingan Jumlah Baris Kode (Sebelum vs Sesudah Refactor)
Berikut adalah analisis perbandingan jumlah baris kode pada class `Mahasiswa` dan `Produk` setelah menerapkan fitur PHP 8 (*Constructor Promotion*):

| Nama Class | Baris (Sebelum / Pertemuan 2) | Baris (Sesudah / Refactor PHP 8) | Keterangan & Efisiensi |
| :--- | :---: | :---: | :--- |
| **Mahasiswa.php** | ~35 Baris | ~22 Baris | Lebih ringkas karena deklarasi properti digabung langsung ke dalam konstruktor. |
| **Produk.php** | ~25 Baris | ~14 Baris | Mengurangi duplikasi kode (*boilerplate code*) secara signifikan. |

## Rangkuman Fitur OOP PHP 8 yang Diterapkan:
1. **Constructor Promotion**: Mempercepat penulisan properti dan parameter konstruktor dalam satu baris.
2. **`readonly` Property**: Diterapkan pada properti `$nim` untuk mengunci data agar tidak dapat dimodifikasi setelah objek diinisialisasi.
3. **Static Counter & Konstanta**: Menggunakan `static::$jumlahMahasiswa` dan `static::$jumlahProduk` serta konstanta `BATAS_SKS = 24`.
4. **Enum dengan Method `label()`**: Menggunakan Enum `Semester` (`Ganjil`, `Genap`) dan `Predikat` (`Cumlaude`, `Sangat Memuaskan`, `Memuaskan`).
   
