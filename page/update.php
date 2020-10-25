<?php
// Require Member
require '../class/Member.php';

// Instansiasi class
$member = new Member();

// Set data Member
$member->set_id($_POST['id']);
$member->set_nama($_POST['nama']);
$member->set_alamat($_POST['alamat']);
$member->set_jenis_kelamin($_POST['jenis_kelamin']);
$member->set_telepon($_POST['telepon']);

// Eksekusi
if ($member->update()) {
    $_SESSION['pesan'] = "Berhasil mengubah data member";
} else {
    $_SESSION['pesan'] = "Gagal mengubah data member";
}

header('Location: ../');
