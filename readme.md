Studi Kasus => Website Sekolah (SMK)

Frontend	: HTML dan CSS
Backend		: PHP
Text Editor	: Sublime Text / Notepad++ / Visual Studio Code / Dreamweaver atau yang lainnya
Web Server	: XAMPP 7.3

Pengguna	: 1 User
		  2 Super Admin
		  3 Admin


STRUKTUR DATABASE
-------------------------------------------
# Database => db_sekolah

# pengguna
===========================================
1 id			| int (11) primary key auto increment
2 nama			| varchar (30)
3 username		| varchar (30)
4 password		| varchar (50)
5 level			| enum ('Super Admin', 'Admin)
6 created_at		| timestamp
7 updated_at		| datetime null

# pengaturan
===========================================
1 id			| int (11) primary key auto increment
2 nama			| varchar (50)
3 email			| varchar (50)
4 telepon		| varchar (20)
5 alamat		| text
6 logo			| varchar (50)
7 favicon		| varchar (50)
8 tentang		| text
9 foto_sekolah		| varchar (50)
10 google_maps		| text
11 nama_kepsek		| varchar (50)
12 foto_kepsek		| varchar 50
13 sambutan_kepsek	| text
14 created_at		| timestamp
15 updated_at		| datetime null

# jurusan
===========================================
1 id			| int (11) primary key auto increment
2 nama			| varchar (100)
3 keterangan		| text
4 created_at		| timestamp
5 updated_at		| datetime null

# informasi
===========================================
1 id			| int (11) primary key auto increment
2 judul			| varchar (100)
3 keterangan		| text
4 created_at		| timestamp
5 updated_at		| datetime null
6 created_by		| int (11) foreign key

# galeri
===========================================
1 id			| int (11) primary key auto increment
2 foto			| varchar (50)
3 keterangan		| varchar (50)
4 created_at		| timestamp
5 updated_at		| datetime null


MENU
--------------------------------------------
1 User			: - Beranda
			  - Tentang Sekolah
			  - Jurusan
			  - Galeri
			  - Informasi
			  - Kontak

2 Super Admin		: - Login
			  - Dashboard
			  - Data Pengguna (create, read, update, delete)
			  - Ubah Password
			  - Keluar

2 Admin			: - Login
			  - Dashboard
			  - Data Jurusan (create, read, update, delete)
			  - Data Galeri (create, read, update, delete)
			  - Data Informasi (create, read, update, delete)
			  - Identitas Sekolah (update)
			  - Tentang Sekolah (update)
			  - Kepala Sekolah (update)
			  - Ubah Password
			  - Keluar


<<================== Selamat Mengerjakan ===================>