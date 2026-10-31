# Lab Pertemuan 6: Abstraction dan Polymorphism

## Analisis: Kapan Memilih Abstract Class dan Kapan Interface?

Dalam Pemrograman Berorientasi Objek (OOP) PHP, pemilihan antara `abstract class` dan `interface` bergantung pada desain hubungan antar objek:

### 1. Gunakan **Abstract Class** ketika:
* **Berbagi Kode & Hierarki (Is-A Relationship):** Ada keterkaitan erat secara hierarki antar kelas. Contohnya `Lingkaran`, `Persegi`, dan `Segitiga` adalah sama-sama sebuah `BangunDatar`.
* **Implementasi Sebagian (Default Behavior):** Abstract class memungkinkan kita menulis metode dengan isi (concrete method) yang bisa diturunkan dan digunakan langsung oleh anak kelasnya, selain metode abstrak yang wajib didefinisikan ulang.
* **Modifikator Akses:** Memungkinkan penggunaan modifier seperti `protected` atau `private` serta properti/variabel instans terstruktur.

### 2. Gunakan **Interface** ketika:
* **Kontrak Perilaku (Can-Do Relationship):** Kelas-kelas yang tidak harus berada dalam satu hierarki turunan yang sama, tetapi memiliki kesamaan *kemampuan* atau perilaku. Contohnya `Email`, `WhatsApp`, dan `SMS` sama-sama memiliki kemampuan `Notifikasi` (`kirim()`).
* **Multiple Inheritance (Pewarisan Berganda):** PHP tidak mendukung *multiple class inheritance*, tetapi sebuah kelas dapat mengimplementasikan (`implements`) banyak `interface` sekaligus.
* **Standarisasi API:** Memastikan kelas yang berbeda mematuhi tanda tangan metode (*method signature*) yang sama tanpa memaksakan struktur internal kelas tersebut.
  
