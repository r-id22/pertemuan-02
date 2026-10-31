# Catatan Hierarki dan Pewarisan (Inheritance) - Pertemuan 5

- **Hierarki Kelas**: 
  - `Pegawai` (Parent Class utama)
  - `Guru` (Turunan `Pegawai` dengan tambahan jam mengajar)
  - `Staf` (Turunan `Pegawai` dengan tunjangan bagian)
  - `Honorer` (Turunan `Pegawai` dengan perhitungan gaji berdasarkan jam kerja)
- **Method Overriding**: Setiap class anak meng-override method `hitungGaji()` milik class induk menggunakan `parent::` untuk kalkulasi spesifik.
- **Final Method**: Method `info()` di class `Pegawai` dideklarasikan sebagai `final`, sehingga jika dicoba override pada class turunan akan memicu *Fatal Error*.
- **Komposisi**: Class `Sekolah` menampung daftar objek `Pegawai` dan menghitung total keseluruhan gaji melalui method `totalGaji()`.
