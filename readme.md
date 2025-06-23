<body>
  <a href="https://osissmkalmasturiyah.42web.io/?i=1">
  <img src="https://opengraph.b-cdn.net/production/images/16aac734-a876-4e5d-88ea-dc128b43689b.png?token=fMBLQv3-4Ie0mty4Qn7bAXaqhedm4HrtuV1V50ECfxk&height=579&width=1200&expires=33286528007" />
  <h1>Template Website Sekolah (SMK)</h1>
  </a>
  <h2>📦 Teknologi yang Digunakan</h2>
  <ul>
    <li><strong>Frontend:</strong> HTML, CSS, JavaScript, TailwindCSS</li>
    <li><strong>Backend:</strong> PHP</li>
    <li><strong>DBMS:</strong> MySQL</li>
  </ul>

  <h2>🛠 Tools</h2>
  <ul>
    <li><strong>Text Editor:</strong> VS Code, Sublime Text, Notepad++, Dreamweaver, dll</li>
    <li><strong>Web Server:</strong>
      <ul>
        <li>Windows: Laragon, XAMPP, WAMP</li>
        <li>Mac: XAMPP, MAMP</li>
        <li>Linux: XAMPP, LAMP</li>
      </ul>
    </li>
  </ul>

  <h2>👤 Pengguna</h2>
  <ul>
    <li>1. User</li>
    <li>2. Super Admin</li>
    <li>3. Admin</li>
  </ul>

  <h2>🗃 Struktur Database: <code>db_sekolah</code></h2>

  <h3>📁 Tabel: pengguna</h3>
  <table>
    <thead><tr><th>Kolom</th><th>Tipe</th></tr></thead>
    <tbody>
      <tr><td>id</td><td>int(11) PRIMARY KEY AUTO_INCREMENT</td></tr>
      <tr><td>nama</td><td>varchar(30)</td></tr>
      <tr><td>username</td><td>varchar(30)</td></tr>
      <tr><td>password</td><td>varchar(50)</td></tr>
      <tr><td>level</td><td>enum('Super Admin','Admin')</td></tr>
      <tr><td>created_at</td><td>timestamp</td></tr>
      <tr><td>updated_at</td><td>datetime NULL</td></tr>
    </tbody>
  </table>

  <h3>📁 Tabel: pengaturan</h3>
  <table>
    <thead><tr><th>Kolom</th><th>Tipe</th></tr></thead>
    <tbody>
      <tr><td>id</td><td>int(11) PRIMARY KEY AUTO_INCREMENT</td></tr>
      <tr><td>nama</td><td>varchar(50)</td></tr>
      <tr><td>email</td><td>varchar(50)</td></tr>
      <tr><td>telepon</td><td>varchar(20)</td></tr>
      <tr><td>alamat</td><td>text</td></tr>
      <tr><td>logo</td><td>varchar(50)</td></tr>
      <tr><td>favicon</td><td>varchar(50)</td></tr>
      <tr><td>tentang</td><td>text</td></tr>
      <tr><td>foto_sekolah</td><td>varchar(50)</td></tr>
      <tr><td>google_maps</td><td>text</td></tr>
      <tr><td>nama_kepsek</td><td>varchar(50)</td></tr>
      <tr><td>foto_kepsek</td><td>varchar(50)</td></tr>
      <tr><td>sambutan_kepsek</td><td>text</td></tr>
      <tr><td>created_at</td><td>timestamp</td></tr>
      <tr><td>updated_at</td><td>datetime NULL</td></tr>
      <tr><td>visi</td><td>varchar(1000)</td></tr>
      <tr><td>misi</td><td>varchar(1000)</td></tr>
    </tbody>
  </table>

  <h3>📁 Tabel: jurusan</h3>
  <table>
    <thead><tr><th>Kolom</th><th>Tipe</th></tr></thead>
    <tbody>
      <tr><td>id</td><td>int(11) PRIMARY KEY AUTO_INCREMENT</td></tr>
      <tr><td>nama</td><td>varchar(100)</td></tr>
      <tr><td>keterangan</td><td>text</td></tr>
      <tr><td>created_at</td><td>timestamp</td></tr>
      <tr><td>updated_at</td><td>datetime NULL</td></tr>
    </tbody>
  </table>

  <h3>📁 Tabel: informasi</h3>
  <table>
    <thead><tr><th>Kolom</th><th>Tipe</th></tr></thead>
    <tbody>
      <tr><td>id</td><td>int(11) PRIMARY KEY AUTO_INCREMENT</td></tr>
      <tr><td>judul</td><td>varchar(100)</td></tr>
      <tr><td>keterangan</td><td>text</td></tr>
      <tr><td>created_at</td><td>timestamp</td></tr>
      <tr><td>updated_at</td><td>datetime NULL</td></tr>
      <tr><td>created_by</td><td>int(11) FOREIGN KEY</td></tr>
    </tbody>
  </table>

  <h3>📁 Tabel: galeri</h3>
  <table>
    <thead><tr><th>Kolom</th><th>Tipe</th></tr></thead>
    <tbody>
      <tr><td>id</td><td>int(11) PRIMARY KEY AUTO_INCREMENT</td></tr>
      <tr><td>foto</td><td>varchar(50)</td></tr>
      <tr><td>keterangan</td><td>varchar(50)</td></tr>
      <tr><td>created_at</td><td>timestamp</td></tr>
      <tr><td>updated_at</td><td>datetime NULL</td></tr>
    </tbody>
  </table>

  <h3>📁 Tabel: sliders</h3>
  <table>
    <thead><tr><th>Kolom</th><th>Tipe</th></tr></thead>
    <tbody>
      <tr><td>id</td><td>int(11) PRIMARY KEY AUTO_INCREMENT</td></tr>
      <tr><td>title</td><td>varchar(255)</td></tr>
      <tr><td>image</td><td>varchar(255)</td></tr>
      <tr><td>created_at</td><td>timestamp</td></tr>
    </tbody>
  </table>

  <h2>📋 Menu Akses</h2>

  <h3>User</h3>
  <ul>
    <li>Beranda</li>
    <li>Tentang Sekolah</li>
    <li>Jurusan</li>
    <li>Galeri</li>
    <li>Informasi</li>
    <li>Kontak</li>
  </ul>

  <h3>Super Admin</h3>
  <ul>
    <li>Login</li>
    <li>Dashboard</li>
    <li>Data Pengguna (CRUD)</li>
    <li>Data Jurusan (CRUD)</li>
    <li>Data Galeri (CRUD)</li>
    <li>Data Slider (CRUD)</li>
    <li>Data Informasi (CRUD)</li>
    <li>Identitas Sekolah</li>
    <li>Tentang Sekolah</li>
    <li>Kepala Sekolah</li>
    <li>Ubah Password</li>
    <li>Keluar</li>
  </ul>

  <h3>Admin</h3>
  <ul>
    <li>Login</li>
    <li>Dashboard</li>
    <li>Data Jurusan (CRUD)</li>
    <li>Data Galeri (CRUD)</li>
    <li>Data Slider (CRUD)</li>
    <li>Data Informasi (CRUD)</li>
    <li>Identitas Sekolah</li>
    <li>Tentang Sekolah</li>
    <li>Kepala Sekolah</li>
    <li>Ubah Password</li>
    <li>Keluar</li>
  </ul>

</body>
</html>
