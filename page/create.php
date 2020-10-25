<?php
// Import Class Member
require "../class/Member.php";

// Instansiasi Class Member
$member = new Member();

if ($_POST) {
    // Set property
    $member->set_nama($_POST['nama']);
    $member->set_alamat($_POST['alamat']);
    $member->set_jenis_kelamin($_POST['jenis_kelamin']);
    $member->set_telepon($_POST['telepon']);

    // Eksekusi
    if ($member->create()) {
        $_SESSION['pesan'] = "Berhasil menambah member baru";
    } else {
        $_SESSION['pesan'] = "Gagal menambah member baru";
    }

    header('Location: ../');
}
