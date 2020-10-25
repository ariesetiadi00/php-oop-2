<?php
// Require Member
require '../class/Member.php';

// Instansiasi
$member = new Member();

// Set ID sebagai penentu data mana yang akan dihapus
$member->set_id($_GET['id']);

// Eksekusi Delete
if ($member->delete()) {
    $_SESSION['pesan'] = "Berhasil menghapus data member";
} else {
    $_SESSION['pesan'] = "Gagal menghapus data member";
}

header('Location: ../');
