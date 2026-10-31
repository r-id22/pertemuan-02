# Catatan Refaktoring - Pertemuan 4

- **Sebelum Refaktor (Pertemuan 2)**: Menggunakan constructor standar dan deklarasi properti publik secara terpisah di dalam class, sehingga memerlukan baris kode yang lebih panjang (sekitar 35–40 baris).
- **Sesudah Refaktor (Pertemuan 4)**: Menerapkan fitur modern PHP 8 seperti *constructor promotion*, properti `readonly`, konstanta kelas (`BATAS_SKS`), properti `static`, serta penggunaan `enum` untuk `Semester` dan `Predikat` (sekitar 25–30 baris).
- **Ringkasan Perubahan**: 
  - Menghemat jumlah baris kode dan membuat sintaks jauh lebih bersih karena deklarasi properti dan inisialisasi pada constructor disatukan langsung pada parameter class `Mahasiswa`.
  - Memastikan integritas data NIM dengan properti `readonly` agar tidak dapat diubah setelah objek dibuat.
  
