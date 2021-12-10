<html>
<head>
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: linear-gradient(to bottom right, #8eb4e6, #bdd9ff);
      background-repeat: no-repeat;
      background-size: cover;
      height: 695px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-sm justify-content-center bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="landing-page.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Data Mahasiswa</a>
        </li>
      </ul>
    </div>
  </nav>
  <div style="margin-top:50px">
    <div class="container rounded-3 p-4 my-2 text-center border bg-light">
      <h1>Data Mahasiswa</h1>
      <a class="btn btn-dark" href="form_simpan.php">Tambah Data</a>
      <br><br>
      <table class="table table-hover" width="100%">
      <thead>
        <tr>
          <th>Foto</th>
          <th>NRP</th>
          <th>Nama Lengkap</th>
          <th>Jenis Kelamin</th>
          <th>Telepon</th>
          <th>Alamat</th>
          <th colspan="2">Aksi</th>
        </tr>
      </thead>
      <?php
      // Load file koneksi.php
      include "koneksi.php";
      // Buat query untuk menampilkan semua data siswa
      $sql = $pdo->prepare("SELECT * FROM siswa");
      $sql->execute(); // Eksekusi querynya
      while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
        echo "<tr>";
        echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
        echo "<td>".$data['nis']."</td>";
        echo "<td>".$data['nama']."</td>";
        echo "<td>".$data['jenis_kelamin']."</td>";
        echo "<td>".$data['telp']."</td>";
        echo "<td>".$data['alamat']."</td>";
        echo "<td><a href='form_ubah.php?id=".$data['id']."' class='btn btn-success'>Ubah</a></td>";
        echo "<td><a href='proses_hapus.php?id=".$data['id']."' class='btn btn-warning'>Hapus</a></td>";
        echo "</tr>";
      }
      ?>
      </table>
    </div>
  </div>
</body>
</html>