<?php
    error_reporting(0);
?>

<html>
    <head>
        <title>Cari Mahasiswa</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body style="background-color: #54BAB9">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark pb-3 pt-3">
  <div class="container-fluid">
    <a class="navbar-brand">Cari Mahasiswa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mahasiswa.php">Input Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cari_mahasiswa.php">Cari Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daftar_ukm.php">Daftar UKM</a>
        </li>
      </ul>
    </div>
</nav>
<!-- Akhir Navbar -->
<h2>Data Mahasiswa</h2>
        <form action="" method="POST">
        <label>Cari Nama:</label><br>
        <input type="text" name=nama><br>
        <input type="submit" value="Cari">
    </form>
        <table class="table">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama MHS</th>
                <th>Jurusan</th>
                <th>Gender</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Foto</th>
                <th>Email</th>
                <th>Dosen Wali</th>
                <th>Action</th>
            </tr>
            <?php
                include "class_mhs.php";
                $crmhs = new mahasiswa();
                $no =1;
                $nama = $_POST['nama'];
                if($nama != ''){
                  $datas = $crmhs->cari_data($nama);
                }else{
                  $datas = $crmhs->tampil_data();
                }
                foreach($datas as $data){
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['nim'] ?></td>
                <td><?php echo $data['nama_mhs'] ?></td>
                <td><?php echo $data['nama_jurusan'] ?></td>
                <td><?php echo $data['gender'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['no_hp'] ?></td>
                <td><img src="foto/<?php echo $data['foto'] ?>" width="25px"> </img></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['dosen_wali'] ?></td>
                <td>
                    <a href="edit.php?nim=<?php echo $data['nim'] ?>"><button>Edit</button></a>
                    <a href="delete.php?nim=<?php echo $data['nim'] ?>"><button>Delete</button></a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>