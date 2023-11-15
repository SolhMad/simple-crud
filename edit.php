<?php

require 'functions.php';

$id = $_GET["id"];

$datas =tampil("SELECT * FROM eskul WHERE id = $id")[0];


if(isset($_POST["edit"]) > 0){

    if (edit($_POST) > 0) {

        echo "
            <script>
                alert('Data Berhasil Di Edit');
                document.location.href='index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Di Edit');
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
    <title>Edit | CRUD</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 position-absolute top-50 start-50 translate-middle">
                    <form class="card p-2" action="" method="POST">
                        <div class="card-header text-center ">
                            <h3>Form Edit Pendaftaran </h3>
                        </div>
                        <div class="card-body mb-3">
                            <input type="hidden" name="id" id="id" value="<?= $datas["id"]; ?>" required>

                            <label for="nis" class="form-label">Nis</label>
                            <input type="text" class="form-control" name="nis" id="nis" value="<?= $datas["nis"]; ?>" required>

                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $datas["nama"]; ?>" required>

                            <select class=" form-select mt-3" aria-label="Default select example" name="kelas" id="kelas" required>
                                <option selected>-- Pilih Kelas --</option>
                                <option value="12 PPLG 1" <?= ($datas["kelas"] === "12 PPLG 1") ? 'selected' : ''; ?>>12 PPLG 1</option>
                                <option value="12 PPLG 2" <?= ($datas["kelas"] === "12 PPLG 2") ? 'selected' : ''; ?>>12 PPLG 2</option>
                                <option value="12 PPLG 3" <?= ($datas["kelas"] === "12 PPLG 3") ? 'selected' : ''; ?>>12 PPLG 3</option>
                            </select>

                            <label for="jk" class="mt-3">Jenis Kelamin :</label>
                            <div class="custom-control custom-checkbox my-1 mr-sm-2 mb-3">
                                <input type="radio" name="jk" id="lk" value="laki-laki" class="custom-control-input" <?= ($datas["jk"] == "laki-laki") ? 'checked' : ''; ?> required>
                                <label for="lk" class="custom-control-label me-5">Laki-laki</label>

                                <input type="radio" name="jk" id="prp" value="perempuan" class="custom-control-input" <?= ($datas["jk"] == "perempuan") ? 'checked' : ''; ?> required>
                                <label for="prp" class="custom-control-label">Perempuan</label>
                            </div>


                            <label for="tanggal" class="form-label">Tanggal_Daftar</label>
                            <input type="date" class="form-control" name="tanggal_daftar" id="tanggal" value="<?= $datas["tanggal_daftar"]; ?>" required>
                        </div>
                        <button type=" submit" class="btn btn-primary" name="edit" onclick="return confirm('yakin mau diubah?');">Edit</button>
                        <div class="card-footer">
                            <a href="index.php">
                                <div class="btn btn-danger">Gak Jadi ah</div>
                            </a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>