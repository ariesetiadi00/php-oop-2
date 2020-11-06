<?php
// Cek tipe formulir
if ($_POST['type'] == 'sekolah') {
    // Import Class Sekolah
    require '../class/Sekolah.php';
    $sekolah = new Sekolah();

    // Set Propoerty
    $sekolah->set_id($_POST['id']);
    $sekolah->set_nama_sekolah($_POST['nama_sekolah']);
    $sekolah->set_nama_kepala_sekolah($_POST['nama_kepala_sekolah']);
    $sekolah->set_alamat($_POST['alamat_sekolah']);
    $sekolah->set_jumlah_murid($_POST['jumlah_murid']);
    $sekolah->set_jumlah_guru($_POST['jumlah_guru']);
    $sekolah->set_tanggal_berdiri($_POST['tanggal_berdiri']);

    // Eksekusi
    $sekolah->update();

    // Redirect ke index sekolah
    header('Location: ../indexs.php');
} else if ($_POST['type'] == 'member') {
    // Import Class Member
    require "../class/Member.php";
    $member = new Member();

    // Set property
    $member->set_id($_POST['id']);
    $member->set_nama($_POST['nama']);
    $member->set_alamat($_POST['alamat']);
    $member->set_jenis_kelamin($_POST['jenis_kelamin']);
    $member->set_telepon($_POST['telepon']);

    // Eksekusi
    $member->update();

    // Redirect ke index member
    header('Location: ../');
}
