<html>
<head>
  <title>Ubah Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: linear-gradient(to bottom right, #8eb4e6, #bdd9ff);
      background-repeat: no-repeat;
      background-size: cover;
      height: 900px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
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
    <div class="container rounded-3 p-5 my-2 border bg-light">
      <h1 class="text-center">Ubah Data Mahasiswa</h1>
      <?php
        // Load file koneksi.php
        include "koneksi.php";
        // Ambil data NIS yang dikirim oleh index.php melalui URL
        $id = $_GET['id'];
        // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
        $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
        $sql->bindParam(':id', $id);
        $sql->execute(); // Eksekusi query insert
        $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
        ?>
        <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">

          <div class="mb-3 mt-3">
            <label for="nis" class="form-label">NRP</label>
            <input type="text" name="nis" class="form-control" id="nis" placeholder="0511xxxxxx" value="<?php echo $data['nis']; ?>">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $data['nama']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki" class="form-check-input"> Laki-laki
            <br>
            <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-check-input"> Perempuan

          </div>
          <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="text" name="telp" class="form-control" value="<?php echo $data['telp']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
          </div>
          <div>
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
          </div>
          
          <hr>
          <input type="submit" value="Ubah" class="btn btn-dark">
          <a href="index.php"><input type="button" value="Batal" class="btn btn-secondary"></a>

      </form>
    </div>
  </div>
</body>
</html>