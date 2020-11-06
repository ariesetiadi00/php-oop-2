<?php
// Require class Member
require 'class/Sekolah.php';

// Instansiasi Class
$sekolah = new Sekolah();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Custom Styling -->
    <link rel="stylesheet" href="css/style.css">

    <title>Sekolah - Main Page</title>
</head>

<body id="main">
    <h1 class="text-center m-4">Master Sekolah</h1>

    <div class="row">
        <div class="col-11 mx-auto">
            <a href="index.php" class="btn btn-primary btn-block btn-sm">Form Member</a>
        </div>
    </div>

    <div class="row m-4 d-flex justify-content-around">
        <div class="col-9">
            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama Sekolah</th>
                    <th>Kepala Sekolah</th>
                    <th>Alamat</th>
                    <th>Jumlah Murid</th>
                    <th>Jumlah Guru</th>
                    <th>Tanggal Berdiri</th>
                    <th>Option</th>
                </tr>

                <!-- Looping data member dari database -->
                <?php foreach ($sekolah->get_all() as $i => $s) : ?>
                    <tr class="member-list" data-type="sekolah" data-id="<?= $s['id'] ?>">
                        <!-- No -->
                        <td><?= ++$i ?></td>
                        <td><?= $s['nama_sekolah'] ?></td>
                        <td><?= $s['nama_kepala_sekolah'] ?></td>
                        <td><?= $s['alamat_sekolah'] ?></td>
                        <td><?= $s['jumlah_murid'] ?></td>
                        <td><?= $s['jumlah_guru'] ?></td>
                        <td><?= $s['tanggal_berdiri'] ?></td>
                        <td>
                            <a href="page/delete.php?id=<?= $s['id'] ?>&type=sekolah" onclick="return confirm('Sekolah akan dihapus')" class="btn btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
        <div class="col-3">
            <table class="table">
                <tr>
                    <th class="form-title">Tambah Sekolah</th>
                </tr>
                <tr>
                    <td>
                        <form id="form-main" method="POST" action="page/create.php">
                            <!-- Hidden ID untuk Update data -->
                            <input id="id" type="hidden" name="id" value="">

                            <!-- Hidden type untuk CRUD -->
                            <input type="hidden" id="type" name="type" value="sekolah">

                            <!-- Nama Sekolah -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah" required>
                            </div>

                            <!-- Nama Kepala Sekolah -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="nama_kepala_sekolah" name="nama_kepala_sekolah" placeholder="Nama Kepala Sekolah" required>
                            </div>

                            <!-- Alamat Sekolah -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="alamat_sekolah" name="alamat_sekolah" placeholder="Alamat Sekolah" required>
                            </div>

                            <!-- Jumlah Murid -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="jumlah_murid" name="jumlah_murid" placeholder="Jumlah Murid" required>
                            </div>

                            <!-- Jumlah Guru -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="jumlah_guru" name="jumlah_guru" placeholder="Jumlah Guru" required>
                            </div>

                            <!-- Tanggal Berdiri -->
                            <div class="form-group">
                                <input type="date" class="form-control form-control-sm" id="tanggal_berdiri" name="tanggal_berdiri" placeholder="Tanggal Berdiri" required>
                            </div>

                            <!-- Button -->
                            <button id="submit" type="submit" class="btn btn-primary btn-sm btn-block mt-3">Tambah</button>
                            <div id="form-tambah" class="d-none">
                                <hr>
                                <a id="redirect-tambah" href="" class="btn btn-sm btn-block btn-primary">Form Tambah</a>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Jquery -->
    <script src="js/jquery-3.5.1.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/52148213e3.js" crossorigin="anonymous"></script>

    <!-- Custom Javascript -->
    <script src="js/script.js"></script>
</body>

</html>