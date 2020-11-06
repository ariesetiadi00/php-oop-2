<?php
if ($_GET['type'] == 'sekolah') {
    // Import Class Sekolah
    require '../class/Sekolah.php';
    $sekolah = new Sekolah();

    // Set ID untuk menghapu data
    $sekolah->set_id($_GET['id']);

    // Eksekusi
    $sekolah->delete();

    // Redirect ke index sekolah
    header('Location: ../indexs.php');
} else if ($_GET['type'] == 'member') {
    // Import Class Member
    require '../class/Member.php';
    $member = new Member();

    // Set ID untuk menghapu data
    $member->set_id($_GET['id']);

    // Eksekusi
    $member->delete();

    // Redirect ke index sekolah
    header('Location: ../index.php');
}
