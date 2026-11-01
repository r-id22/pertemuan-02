# Analisis Lab Sheet Pertemuan 6: Abstraction dan Polymorphism

Berikut adalah penjelasan mengenai perbedaan serta panduan pemilihan antara **Abstract Class** dan **Interface** dalam Pemrograman Berorientasi Objek (OOP).

## 1. Kapan Memilih Abstract Class?
Abstract class dipilih ketika kita ingin mendefinisikan kerangka dasar (*base class*) untuk sekumpulan objek yang **memiliki hubungan kekerabatan yang erat (hubungan *is-a*)** serta dapat membagikan kode *default* (properti atau method dengan implementasi konkrit).
- **Ciri Khas & Kegunaan**: 
  - Memiliki properti atau method dengan isi kode bawaan.
  - Menggunakan pewarisan tunggal (`extends`).
  - Cocok digunakan pada hierarki yang jelas, contohnya hirarki `Pegawai` (`Guru`, `Staf`) atau `BangunDatar` (`Segitiga`, `PersegiPanjang`), di mana semua anak berbagi karakteristik dasar yang serupa.

## 2. Kapan Memilih Interface?
Interface dipilih ketika kita ingin menetapkan **kontrak perilaku (*behavior*)** yang wajib dipatuhi oleh class-class tanpa memedulikan apakah class tersebut memiliki hubungan kekerabatan atau berasal dari garis keturunan yang berbeda (*contract of behavior*).
- **Ciri Khas & Kegunaan**:
  - Hanya berisi deklarasi method tanpa isi implementasi (kontrak murni).
  - Mendukung pewarisan ganda (*multiple implementation* melalui `implements`).
  - Cocok digunakan untuk fitur lintas fungsionalitas, contohnya `Notifikasi` (`Email`, `WhatsApp`, `SMS`) di mana class-class yang sama sekali tidak berhubungan tetap bisa dipaksa memiliki fungsi kirim pesan yang seragam.
    
