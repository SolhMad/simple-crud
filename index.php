<?php

require 'functions.php';

$students = tampil("SELECT * FROM eskul ORDER BY nama ASC");

// jika tombol cari di tekan
if (isset($_POST["cari"])) {
    $students = cari($_POST["keyword"]);
}


if (isset($_POST["daftar"])) {

    if (tambah($_POST) > 0) {

        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href='index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href='index.php';
            </script>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar | CRUD</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="header">
        <img src="<?= $gambar; ?>" alt="Logo Panyingkiran">
        <p><?= $alamat; ?><br>website : <?= $website; ?> | <i>email : <?= $email; ?></i> | telp : <?= $telp; ?></p>
    </div>
    <hr>
    <div class="container">
        <div class="sapa">
            <div class="kiri"><b><?= $pesan; ?>Calon Anggota Ekskul PPLG</b></div>
            <div class="kanan"><b><?= $waktu; ?></b></div>
            <div class="clear"></div>
            <br>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-3 bg-danger bg-opacity-25">
            <div class="h3 text-center mt-2">DAFTAR</div>
            <form class="card p-2 ms-2 " action="" method="POST">
                <div class="card-header text-center ">
                    Form Pendaftaran <?= $eskul; ?>
                </div>
                <div class="card-body mb-3">
                    <label for="nis" class="form-label">Nis :</label>
                    <input type="number" class="form-control" name="nis" id="nis" value="<?= $nis; ?>" readonly autocomplete="off">

                    <label for="nama" class="form-label">Nama :</label>
                    <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off">

                    <select class="form-select mt-3" aria-label="Default select example" name="kelas" required>
                        <option name="kelas">-- Pilih Kelas --</option>
                        <option name="kelas" value="12 PPLG 1" required>12 PPLG 1</option>
                        <option name="kelas" value="12 PPLG 2" required>12 PPLG 2</option>
                        <option name="kelas" value="12 PPLG 3" required>12 PPLG 3</option>
                    </select>

                    <label for="jk" class="mt-3">Jenis Kelamin :</label>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2 mb-3">
                        <input type="radio" name="jk" id="lk" value="laki-laki" class="custom-control-input" required>
                        <label for="lk" class="custom-control-label me-5"> Laki-laki </label>
                        <input type="radio" name="jk" id="prp" value="perempuan" class="custom-control-input" required>
                        <label for="prp" class="custom-control-label"> Perempuan </label>
                    </div>

                    <label for="tanggal" class="form-label">Tanggal Daftar :</label>
                    <input type="date" class="form-control" name="tanggal_daftar" id="tanggal" required>
                </div>
                <button type="submit" class="btn btn-primary" name="daftar">Submit</button>
            </form>
        </div> <!-- END COL-4 -->

        <div class="col-9 bg-success bg-gradient bg-opacity-50">
            <div class="h3 text-center mt-2">Data Anggota <?= $eskul; ?></div>
            <div class="row">
                <div class="col-8 custom-control my-3">
                    <form action="" method="POST" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="keyword" placeholder="Masukan Pencarian" aria-label="Search" autofocus autocomplete="off">
                        <button class="btn btn-outline-light" type="submit" name="cari">Cari</button>
                    </form>
                </div>
            </div>
            <table border="1" cellpadding="5" cellspacing="0" width="100%" class="table table-striped-columns table-hover table-info">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($students as $student) : ?>
                        <tr>
                            <td width="5px"><?= $i; ?></td>
                            <td><?= $student["nis"]; ?></td>
                            <td><?= $student["nama"]; ?></td>
                            <td><?= $student["kelas"]; ?></td>
                            <td><?= $student["jk"]; ?></td>
                            <td><?= $student["tanggal_daftar"]; ?></td>
                            <th class="text-center">
                                <a href="edit.php?id=<?= $student["id"]; ?>" class="btn btn-success">Edit</a> |
                                <a href="hapus.php?id=<?= $student["id"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin Dihapus?');">Hapus</a>
                            </th>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!-- END COL-8 -->
    </div> <!-- END ROW -->
    <hr>
    <footer>
        <img src="<?= $gambar ?>" alt="Logo Panyingkira" width="200px">
        <p><b>Copyright &copy; 2023 | Ahmad Soleh | 12 RPL 3</b></p>
    </footer>

    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>