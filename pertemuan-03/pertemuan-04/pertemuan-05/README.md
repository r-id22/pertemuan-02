# Catatan Lab Sheet Pertemuan 5: Inheritance dan Method Overriding

Berikut adalah dokumentasi dan catatan pelaksanaan praktikum Pemrograman Berorientasi Objek untuk Pertemuan 5.

## 1. Diagram Hierarki Kelas (Inheritance)
Struktur hierarki objek `Pegawai` dalam sistem manajemen sekolah:

```text
          [ Pegawai (Abstract Base Class) ]
           - final public function info()
           - abstract public function hitungGaji()
                     /        |        \
                    /         |         \
         [ Guru ]        [ Staf ]     [ Honorer ]
          (Override)      (Override)   (Override)
