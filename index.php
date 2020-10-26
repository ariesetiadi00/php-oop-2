<?php
// Require class Member
require 'class/Member.php';

// Instansiasi Class
$member = new Member();
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

    <title>Member - Main Page</title>
</head>

<body id="main">
    <h1 class="text-center m-4">Member Club Olahraga</h1>
    <!-- Alert Box -->
    <div class="row">
        <div class="col-11 mx-auto">
            <!-- Jika ada session['pesan'], tampilkan alert -->
            <?php if (isset($_SESSION['pesan'])) : ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <?= $_SESSION['pesan'] ?>
                </div>
            <?php
                // Unset session jika sudah digunakan
                unset($_SESSION['pesan']);
            endif;
            ?>

        </div>
    </div>

    <div class="row m-4 d-flex justify-content-around">
        <div class="col-9">
            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Telepon</th>
                    <th>Option</th>
                </tr>

                <!-- Looping data member dari database -->
                <?php foreach ($member->get_all() as $i => $m) : ?>
                    <tr class="member-list" data-id="<?= $m['id'] ?>" data-base="<?= $_SERVER['DOCUMENT_ROOT'] ?>">
                        <td><?= ++$i ?></td>
                        <td><img width="35" src="img/<?= $m['foto'] ?>" alt="Profile"></td>
                        <td><?= $m['nama'] ?></td>
                        <td><?= $m['alamat'] ?></td>
                        <td><?= ($m['jenis_kelamin'] == "l") ? "Laki-laki" : "Perempuan" ?></td>
                        <td><?= $m['telepon'] ?></td>
                        <td>
                            <a href="page/delete.php?id=<?= $m['id'] ?>" onclick="return confirm('Member akan dihapus')" class="btn btn-sm">
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
                    <th class="form-title">Tambah Member</th>
                </tr>
                <tr>
                    <td>
                        <form id="form-main" method="POST" action="page/create.php">
                            <!-- Hidden ID untuk Update data -->
                            <input id="id" type="hidden" name="id" value="">

                            <!-- Nama -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama lengkap" required>
                            </div>

                            <!-- Alamat -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" placeholder="Alamat" required>
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="telepon" name="telepon" placeholder="Nomor telepon" required>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="l" id="l" checked>
                                <label class="form-check-label" for="l">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="p" id="p">
                                <label class="form-check-label" for="p">Perempuan</label>
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