Klick. Lighweight CMS
======================

CMS untuk membuat sistem pemilihan di server anda.

:warning: **WARNING**

Masih dalam tahap pengembangan. Belum semua fitur dapat dijalankan dengan baik

Fitur
------

- Unlimited Candidate 
- Unlimited Voters 
- Quick Count 
- Export data to CSV 
- Print Result (In Development)
- Daily Backup (In Development)
- Statistics (In Development)

Persyaratan System
-------------------

- Apache yang mod_rewrite nya diaktifkan
- PHP versi 5.2
- MySQL versi 5.0

Installasi
-----------

- Pastikan anda sudah membuat sebuah database kosong (Berisi juga ndak papa) di server database anda
- Lalu arahkan browser favorit anda ke url tempat dimana anda menaruh CMS "Klick." ini (ex: example.com)
- Anda akan diarahkan ke program untuk menginstall "Klick."
- Klik "Lets Go!" lalu di halaman berikutnya anda isikan informasi database yang anda pakai
- Jika database anda sudah berisi, "Klick." masih bisa berjalan asalkan table prefix yang anda isikan tidak bentrok   dengan table anda yang lain
- Setelah semua informasi yang anda berikan ke "Klick." benar, anda akan dibawa ke halaman berikutnya untuk memasukkan informasi tentang pemilihan yang sedang anda jalankan
- Setelah selesai mengisi informasi pemilihan dan submit, "Klick." akan memberitahukan bahwa anda telah selesai menginstall pemilihan di server anda dan akan tampil beberapa informasi penting tentang diri anda dan pemilihan anda


Version History
----------

### 0.1 ([browse](https://github.com/bahrunnur/Klick.Lightweight/tree/0.1), [zip](https://github.com/bahrunnur/Klick.Lightweight/zipball/0.1), [tar](https://github.com/bahrunnur/Klick.Lightweight/tarball/0.1))

Beta release. :metal:

mempunyai fungsionalitas:

- CRUD Voters
- CRD Candidate (update on development)
- CRUD Admin
- Export to CSV
- Quick Count